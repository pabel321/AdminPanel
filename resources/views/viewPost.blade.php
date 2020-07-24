@extends('layouts.app')

@section('content')

<div class="container">
	
<table class="table table-dark">
  <thead>
    <tr>
      <td >SL: {{$post->id}}</th>
      <td >Title: {{$post->title}}</th>
      <td >Author: {{$post->author}}</th>
      <td >Tag: {{$post->tag}}</th>
      <td >description: {{$post->description}}</th>
    </tr>
  </thead>
</table>

</div>

@endsection