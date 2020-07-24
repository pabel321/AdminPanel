@extends('layouts.app')

@section('content')
<div>
	
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($news as $row)
    <tr>
      <th scope="row"> {{$row->id}} </th>
      <td> {{$row->title}} </td>
      <td> {{$row->author}} </td>
      <td> <img src="{{URL::to($row->image)}}" style="height: 80px; width: 80px;"> </td>
      <td> 
       <a href="" class="btn btn-sm btn-danger"> Delete </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

@endsection