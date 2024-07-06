@include('layouts.app')

<h2>{{ $blog->title }}</h2>
<img src="{{ asset('uploads/demo/' . $blog['image']) }}" width="250" height="auto">
<h5>{{ $blog->description}}</h5>
<p>- {{ $blog->user }}</p>
<p>{{$blog->created_at->diffForHumans()}}</p>

@if ($blog['user'] == Auth::user()->name)
<a href="{{url('/edit/'. $blog['id'])}}">
    <button class="btn btn-dark">edit</button>
</a>
@endif

<a href="{{url('/delete/'. $blog['id'])}}">
    <button class="btn btn-danger">delete</button>
</a>

