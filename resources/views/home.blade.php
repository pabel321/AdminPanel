@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger btn-sm" style="float: right;" >Add New </a> </div>
                <a href="{{route('addNews')}}" class="btn btn-danger">Add News</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{route('allPost')}}">All Posts</a>
                @php

                $post=App\Post::all();
                @endphp

                <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Tag</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($post as $row)
    <tr>
      <th scope="row"> {{$row->id}} </th>
      <td> {{$row->title}} </td>
      <td> {{$row->author}} </td>
      <td> {{$row->tag}} </td>
      <td> 
        <a href="{{URL::to('viewPost/'.$row->id)}}" class="btn btn-sm btn-info"> View </a>
       <a href="{{URL::to('editPost/'.$row->id)}}" class="btn btn-sm btn-info"> Edit </a>
       <a href="{{URL::to('deletePost/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete"> Delete </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Posts</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{url('insertPost')}}" method="POST">
        @csrf
      <div class="modal-body">
      </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="title" name="title">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Author</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="author" name="author">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tag</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="tag" name="tag">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
  </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">submit</button>
      </div>
      </form>

    </div>
  </div>
</div>

@endsection
