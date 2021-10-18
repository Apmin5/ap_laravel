<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostStored;
use App\Models\Category;
use App\Mail\postCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\storePostRequest;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = Post::all();
        $data = Post::where('user_id',auth()->id())->orderBy('id','desc')->get();
        return view('home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storePostRequest $request)
    {
        
        // $post = new Post();
        // $post->name = $request->name;
        // $post->description = $request->description;
        // $post->save();
        $validated = $request->validated();
        $post = Post::create($validated + ['user_id'=>Auth::user()->id]);
        // Mail::to('aung@gmail.com')->send(new PostStored($post));
        return redirect('/posts')->with('status','New post.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
    //    if($post->user_id != auth()->id()){
    //        abort(403);
    //    }
        // Mail::raw('Hello World',function($msg){
        //     $msg->to('aung@gmail.com')->subject('Ap index function.');
        // });
        Mail::to('aung@gmail.com')->send(new postCreated());
        $this->authorize('view',$post);
        return view('show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // if($post->user_id != auth()->id()){
        //     abort(403);
        // }
        $this->authorize('view',$post);

        $category = Category::all();
        return view ('edit',compact('post','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storePostRequest $request,Post $post)
    {
        // $post->name = $request->name;
        // $post->description = $request->description;
        // $post->save();
        // if($post->user_id != auth()->id()){
        //     abort(403);
        // }
        $this->authorize('view',$post);

        $validated = $request->validated();
        $post->update($validated);
        return redirect('/posts')->with('status','Edit post.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts')->with('status','delete post.');

    }
}
