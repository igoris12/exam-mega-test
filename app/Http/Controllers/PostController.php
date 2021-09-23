<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Validator;


class PostController extends Controller
{
    const RESULTS_IN_PAGE = 5;

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('town', 'desc')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
        return view('post.index', ['posts' => $posts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $validator = Validator::make($request->all(),
            [
                'post_town' => ['required', 'min:3', 'max:55'],
                'post_capacity' => ['required', 'integer', 'min:0'],
                'post_code' => ['required', 'min:20', 'max:20'],
            ]

            );
            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }

        $post = new Post;
        $post->town = $request->post_town;
        $post->capacity = $request->post_capacity;
        $post->code = $request->post_code;


        $post->save();
        return redirect()->route('post.index')->with('success_message', 'New Post added successful.');

    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\post  $post
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(post $post)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('post.edit', ['post' => $post]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {

         $validator = Validator::make($request->all(),
            [
                'post_town' => ['required', 'min:3', 'max:55'],
                'post_capacity' => ['required', 'integer', 'min:0'],
                'post_code' => ['required', 'min:20', 'max:20'],
            ]

            );
            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }

        $post->town = $request->post_town;
        $post->capacity = $request->post_capacity;
        $post->code = $request->post_code;


        $post->save();
        return redirect()->route('post.index')->with('success_message', 'New Post added successful.');

    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\post  $post
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(post $post)
    // {
    //     if($post->getBetter->count()){
    //    return redirect()->route('post.index')->with('info_message', 'Post cant be deleted.');


    //    }
    //    $post->delete();
    //    return redirect()->route('post.index')->with('success_message', 'Delete was successful.');
    // }
}
