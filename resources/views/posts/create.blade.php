@extends('layouts.app')

@section('title') Create @endsection

@section('content')
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf

            @if(isset($post))
                <input type="hidden" name="id" value="{{$post->id}}">
            @endif
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>

                <input type="text" class="form-control" name="title" id="title" value="{{ isset($post) ? $post['title'] : '' }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3" >{{ isset($post) ? $post['description'] : '' }}</textarea>
            </div>

            <div class="mb-3">
                <label for="post_creator" class="form-label">Post Creator</label>
                <select name="post_creator" class="form-control" id="post_creator" >
                    @foreach($users as $user)
                    <option value="{{$user->id}}" selected="{{ isset($post) ? ($post->user->id == $user->id ? 'selected' : '') : '' }}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>

            <button class="btn btn-success">Create Post</button>
        </form>
@endsection
          <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ isset($post) ? $post['title'] : '' }}">
            </div>
            
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" >{{ isset($post) ? $post['description'] : '' }}</textarea>  
            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Post Creator</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" value="{{ isset($post) ? $post['posted_by'] : '' }}">
            </div>
            
            <button class="btn btn-success">Create Post</button>
        </form>
@endsection

