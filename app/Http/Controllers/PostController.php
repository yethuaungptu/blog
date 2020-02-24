<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(2);
        $customers = Customer::all();
        return view('posts/index',compact('posts','customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();

        return view('posts/create',compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create($this->validateRequest());
        $this->storeImage($post);
        $post->save();
        return redirect('posts ')->with('message','Post are successfully created...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts/show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts/edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post)
    {
        $post->update($this->validateRequest());
        return redirect('posts');

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
        return redirect('posts');
    }

    private function validateRequest(){
        return request()->validate([
            'title'=>'required|min:3',
            'content'=>'required|min:3',
            'customer_id'=>'required',
            'image' => 'sometimes|file|image|max:5000',
        ]);
    }
    private function storeImage($menu)
    {
        if (request()->has('image')){
            $menu->update([
                'image' => request()->image->store('uploads', 'public')
            ]);
        }
        $image =Image::make(public_path('storage/' . $menu->image))->fit(270,300);
        $image -> save();
    }
}
