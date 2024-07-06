<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Blog::all();
        // $session = session()->all();
        // echo "<pre>";
        // print_r($session);
        return view("blogs", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $upload = new Blog();

        $data = $request->toArray();

        $upload->title = $data["title"];
        $upload->description = $data["description"];
        $upload->user = $data['username'];

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/demo/', $filename);
        $upload->image = $filename;
        $upload->save();
        return view('home');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::find($id);
        return view('viewblog')->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::find($id)->toArray();
        return view('editblog')->with('blog', $blog);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::find($id);

        $blog->title = $request->title;
        $blog->description = $request->description;

        if ($request->hasFile('image')) {
            File::delete("uploads/demo/" . $blog->image);
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/demo/', $filename);
            $blog->image = $filename;
        }
        $blog->save();
        return redirect('/blog');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todelete = Blog::find($id);
        $todelete->delete();
        return view('Home');
    }
}