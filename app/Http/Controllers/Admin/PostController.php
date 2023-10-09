<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    public function index()
    {
        return Inertia::render('Posts/Index', [
            'posts' => Post::all()
        ]);
    }


    public function show(Post $post)
    {
        return Inertia::render('Posts/Show', [
            'post' => $post
        ]);
    }


    public function create()
    {
        return Inertia::render('Posts/Create', [
            'posts' => Post::all()
        ]);
    }

    public function store( Request $request )
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|max:1000',
            'image' => 'required|file'
        ]);

        $uploadedFile = null;
        if ( $request->has('image') && $request->file('image') !== null ) {

            $file = $request->file('image');

            $uploadedFile = Storage::putFileAs('uploads', $file, uniqid("", true) . '.' . $file->getClientOriginalExtension());
        }


        auth()->user()->posts()->create( [
            'title' => $request->title,
            'description' => $request->description,
            'slug' => str_replace(" ", "_", $request->title),
            'image' => $uploadedFile
        ] );

        Session::flash('success', 'Post has been created successfully');

        return redirect()
            ->route('posts.index');


    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|max:1000',
            'image' => 'sometimes'
        ]);

        $post = auth()->user()->posts()->where('id', $id)->first();

        if ( $post === null ) {
            Session::flash('error', 'Invalid Post   ');

            return Inertia::render('Posts/Edit', [
               'post' => $post
            ]);
        }

        $uploadedFile = explode("/storage", $post->image)[1];
        if ( $request->has('image') &&
            $request->file('image') !== null &&
            !str_contains('http', $request->file('image')) &&
            !str_contains('https', $request->file('image'))  ) {

            $file = $request->file('image');

            $uploadedFile = Storage::putFileAs('uploads', $file, uniqid("", true) . '.' . $file->getClientOriginalExtension());
        }


        $post = auth()->user()->posts()->update( [
            'title' => $request->title,
            'description' => $request->description,
            'slug' => str_replace(" ", "_", $request->title),
            'image' => $uploadedFile
        ] );

        Session::flash('success', 'Post has been updated successfully');

        return redirect()
            ->route('posts.show', [$id]);
    }

    public function edit(Post $post)
    {

        return Inertia::render('Posts/Edit', [
            'post' => $post
        ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        Session::flash('success', 'Post has been deleted successfully');

        return redirect()
            ->route('posts.index');

    }
}
