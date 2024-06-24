@extends('layouts.app')
@section('content')
    <div>
        <form enctype="multipart/form-data" action="{{url('/blog/edit/' . $blog['id'])}}" method="POST">
            @csrf
            <input placeholder="Title" name="title" value="{{$blog['title']}}">
            <input placeholder="description" name="description" value="{{$blog['description']}}">
            <input type="file" accept="image/*" name='image' value="{{$blog['image']}}">
            <input type="hidden" name="username" value="{{$blog['user']}}">
            <button>Submit</button>
        </form>
    </div>
@endsection