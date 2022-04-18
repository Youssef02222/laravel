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

</div>




<div class="card mt-4" >
    <div class="card-header">
        Comments
    </div>
  <div>
        @foreach($comments as $comment)
            @if($comment->post_id==$post->id)
                <div>
                    <span class="h6">{{$post->user->name}}</span>
                    <span> :- {{ $comment->comment }}</span>
                </div>
            @endif
        @endforeach

    </div>
</div>



<!--
@if(isset($comment))


  @endif


<form method="POST" action="{{ route('posts.store') }}">
  @csrf




<label name="user">{{$post->user->name}}</label>
    <input type="hidden" name="usrid" value="{{$post->user->id}}">

<input type="text" class="form-control" name="addcomm" id="comm" value="..">
    <div class="mb-3">
        <label for="post_creator" class="form-label">Post Creator</label>
        <select name="post_creator" class="form-control" id="post_creator" >
          @if(isset($posts))
            @foreach($posts as $post)
                <option value="{{$user->id}}" name="usr_id" selected="{{ isset($post) ? ($post->user->id == $user->id ? 'selected' : '') : '' }}">{{$user->name}}</option>
            @endforeach
            @endif
        </select>
    </div>
  <button class="btn btn-success">Add Comment</button>
</form>

@endsection
