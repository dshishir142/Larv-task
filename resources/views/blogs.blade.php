@extends('layouts.app')
@section('content')
    @if (Auth::check())
        <a href="{{ url('/blog/add') }}">
            <button>Add Blogs</button>
        </a>
    @endif

    @foreach ($data as $item)
    @if (Auth::check())
    <hr>
    <a href="{{url('/blog/view/' . $item['id'])}}">
        @csrf
        <div class="container-fluid">
            <h3>{{ $item['title'] }}</h3>
            <img src="{{ asset('uploads/demo/' . $item['image']) }}" width="100" height="auto">
        </div>
    </a>
    @else     
    <div class="container-fluid">
        <h3>{{ $item->title }}</h3>
        <img src="{{ asset('uploads/demo/' . $item['image']) }}" width="100" height="auto">
    </div>

    @endif

    @endforeach
@endsection
