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
          <span> :- {{ $post->title }}</span>
        </div>
        <div class="mt-3">
            <span class="h6">Description</span> <span> :- </span>
            <p>{{ $post->description }}</p>
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
          <span> :- {{$post->user->name}}</span>
        </div>
        <div>
          <span class="h6">Email</span>
          <span> :- {{ $post->user->email }}</span>
        </div>
        <div>
          <span class="h6">Created At</span>
          <span> :- {{ $post->human_readable_date() }}</span>
        </div>
    
    </div>
</div>

@endsection