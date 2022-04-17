@extends('layouts.app')

@section('title') Show @endsection

@section('content')

<div class="card" >
  <div class="card-header">
    Post Info
  </div>
  <div class="card-body">
      <div>
          <span class="h6">Title</span>
          <span> :- {{$post['title']}}</span>
        </div>
        <div class="mt-3">
            <span class="h6">Description</span> <span> :- </span>
            <p>{{$post['description']}}</p>
        </div>
    </div>
</div>

<div class="card mt-4" >
  <div class="card-header">
    Post Creator Info
  </div>
  <div class="card-body">
      <div>
          <span class="h6">Name</span>
          <span> :- {{$post['posted_by']}}</span>
        </div>
        <div>
          <span class="h6">Email</span>
          <span> :- akd@gmail.com</span>
        </div>
        <div>
          <span class="h6">Created At</span>
          <span> :- {{$post['created_at']}}</span>
        </div>
    
    </div>
</div>

@endsection