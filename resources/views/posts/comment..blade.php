@extends('layouts.app')

@section('title') Create @endsection

@section('content')
    <h1>comment page</h1>
    <form method="POST" action="{{ route('new.store') }}">
        <h1>comment page</h1>
        <h1>comment page</h1>
        @csrf
        @if(isset($post))
            <input type="hidden" name="id" value="{{$post->id}}">
        @endif


        <div class="mb-3">
            <label for="description" class="form-label">comment</label>
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

        <button class="btn btn-success">Add comment</button>
    </form>
@endsection
