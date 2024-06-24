@extends('layouts.app')
@section('content')
    <div>
        <form enctype="multipart/form-data" action="{{url('/blog/store')}}" method="POST">
            @csrf
            <input placeholder="Title" name="title">
            <input placeholder="description" name="description">
            <input type="file" accept="image/*" name='image'>
            <input type="hidden" name="username" value="{{Auth::user()->name}}">
            <button>Submit</button>
        </form>
    </div>
@endsection
