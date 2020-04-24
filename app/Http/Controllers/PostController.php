<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = \Canvas\Post::published()->orderByDesc('published_at')->get();


        return view('blog.index',
        [
            'posts'=>$posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $posts = \Canvas\Post::with('tags', 'topic')->published()->get();
        $post = $posts->firstWhere('slug', $slug);

        if(optional($post)->published)
        {
            $data = [
                'author'    => $post->author,
                'post'      => $post,
                'meta'      => $post->meta,
            ];

            event(new\Canvas\Events\PostViewed($post));

            return view ('blog.show', compact('data'));
        } else{
            abort(404);
        }

    }

    public function getPostByTag(string $slug)

    {
        if(\Canvas\Tag::where('slug', $slug)->first())
        {
            $data =[
                'posts'=> \Canvas\Post::whereHas('tags', function($query) use ($slug)
                {
                    $query->where('slug', $slug);
                })->published()->orderByDesc('published_at')->get(),
                    'slug'  =>  $slug
            ];
            return view('blog.tags', compact('data'));
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
