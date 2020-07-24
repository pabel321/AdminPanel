<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use App\User;
use DB;
use Str;


class PostController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function insertPost(Request $request)
    {
    	$post = new Post;
    	$post->title=$request->title;
    	$post->author=$request->author;
    	$post->tag=$request->tag;
    	$post->description=$request->description;
    	$post->save();
    	return Redirect()->back();
    }

    public function allPost()
    {
        $post=Post::all();
        return view('allPost')->with('post',$post);
    }

    public function deletePost($id)
    {
      $post=Post::find($id);
      $post->delete();
      return Redirect()->back();
    }

    public function editPost($id)
    {
    	$post=Post::find($id);
    	return view('editPost')->with('row',$post);
    }

    public function updatePost(Request $request, $id)
    {
        $post=Post::find($id);
        $post->title=$request->title;
    	$post->author=$request->author;
    	$post->tag=$request->tag;
    	$post->description=$request->description;
        $post->save();
        return Redirect()->route('home');
    }

    public function viewPost($id)
    {
    	$post=Post::find($id);
    	return view('viewPost',compact('post'));
    }

    public function addNews()
    {
        return view('addNews');
    }

    public function insertNews(Request $request)
    {
    	$data=array();
    	$data['title']=$request->title;
    	$data['author']=$request->author;
    	$data['details']=$request->details;

    	$image=$request->image;

    	if ($image) {
    		$image_name=str::random(20);
    		$ext=strtolower($image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$ext;
    		$upload_path='public/post/';
    		$image_url=$upload_path.$image_full_name;
    		$success=$image->move($upload_path, $image_full_name);
    		$data['image']=$image_url;
    		$post=DB::table('newss')->insert($data);
    		return Redirect()->back();
    	}   	
    }	

    public function allNews()
    {
    	$news=DB::table('newss')->get();
    	return view('allNews',compact('news'));
    }
}
