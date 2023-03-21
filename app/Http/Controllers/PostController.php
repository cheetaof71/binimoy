<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('active', 1)->get();
        return view('frontend.post.addPost', ['categories' => $categories]);
        // return view('frontend.post.addPost');
    }

    /**
     * Store a newly created resource in storage.
     */

    //! Validation

    protected function infoValidate($request)
    {
        $validateData = $request->validate([
            'post_name' => 'required|max:100|min:1',
            'post_title' => 'required|max:500|min:1',
            'category_id' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            // 'post_image' => 'required',
            'active' => 'required',
        ]);
    }
    //! Image Upload
    protected function imageUpload($request)
    {
        // $post_image = $request->file('post_image');
        // $img_ext = $post_image->getClientOriginalExtension();
        // $image_name = $request->post_name . '_' . hexdec(uniqid()) . '.' . $img_ext;
        // $directory = 'post_images/';
        // $img_url = $directory . $image_name;
        // $post_image->move($directory, $image_name);
        // return $img_url;



        foreach ($request->file('post_image') as $image) {

            $img_ext = $image->getClientOriginalExtension();
            $name = $request->post_name . '_' . hexdec(uniqid()) . '.' . $img_ext;
            $directory = 'post_images/';
            $url = $directory . $name;

            $image->move(public_path($directory), $name);
            $data[] = $url;
        }
        $img_url = json_encode($data);
        return $img_url;
    }

    //! Info Upload
    protected function infoUpload($request, $post, $img_url)
    {
        // dd($img_url);
        $post->post_name = $request->post_name;
        $post->post_title = $request->post_title;
        $post->category_id = $request->category_id;
        $post->location_id = $request->location_id;
        $post->sub_location_id = $request->sub_location_id;
        $post->price = $request->price;
        $post->condition = $request->condition;
        $post->brand = $request->brand;
        $post->short_description = $request->short_description;
        $post->long_description = $request->long_description;
        $post->name = $request->name;
        $post->phone = $request->phone;
        $post->email = $request->email;
        $post->post_image = $img_url;
        $post->active = $request->active;
        $post->save();
        return $post;
    }


    public function store(Request $request)
    {
        // return $request->all();
        $post = new Post();

        $this->infoValidate($request);

        $img_url = $this->imageUpload($request);
        // return $request->all();

        // $post->post_name = $request->post_name;
        // $post->post_title = $request->post_title;
        // $post->category_id = $request->category_id;
        // $post->short_description = $request->short_description;
        // $post->long_description = $request->long_description;
        // $post->post_image = $img_url;
        // $post->active = $request->active;
        // $post->save();

        $this->infoUpload($request, $post, $img_url);

        $message = "Post added successfully";
        // return redirect('post/manage')->with('message', $message);
        return redirect('post/add')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
