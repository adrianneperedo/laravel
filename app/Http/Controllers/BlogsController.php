<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\BlogFormRequest;
use App\Http\Controllers\Controller;
use App\Blog;

class BlogsController extends Controller
{

    public function  __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'DESC')->paginate(3);
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(BlogFormRequest $request)
    {
        $user = Auth::user();
        $slug = uniqid();

        $blog = new Blog([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'slug' => $slug,
            'user_id' => $user->id
        ]);

        $blog->save();
        return redirect('/blogs')->with('status', 'You have successfully created a blog!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        $blog = Blog::whereSlug($slug)->firstOrFail();
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($slug)
    {
        $blog = Blog::whereSlug($slug)->firstOrFail();
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(BlogFormRequest $request, $slug)
    {
        $user = Auth::user();
        $blog = Blog::whereSlug($slug)->firstOrFail();

        $blog->title = $request->get('title');
        $blog->content = $request->get('content');
        $blog->user_id = $user->id;
        $blog->save();
        return redirect(action('BlogsController@index'))->with('status', "The blog has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($slug)
    {
        $blog = Blog::whereSlug($slug)->firstOrFail();
        $blog->delete();
        return redirect('/blogs')->with('status', 'The blog has been deleted');
    }
}
