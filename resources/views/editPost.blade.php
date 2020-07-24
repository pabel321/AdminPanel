@extends('layouts.app')

@section('content')
<div class="container">

 <form action="{{url('updatePost/'.$row->id)}}" method="POST">
        @csrf
      <div class="modal-body">
      </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Title</label>
    <input type="text" class="form-control" id="exampleFormControlInput1"  name="title" value="{{$row->title}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Author</label>
    <input type="text" class="form-control" id="exampleFormControlInput1"  name="author" value="{{$row->author}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tag</label>
    <input type="text" class="form-control" id="exampleFormControlInput1"  name="tag" value="{{$row->tag}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" >{{$row->description}} </textarea>
  </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">update</button>
      </div>
      </form>

</div>


@endsection