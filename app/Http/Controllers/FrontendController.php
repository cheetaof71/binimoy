<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests\StoreFrontendRequest;
use App\Http\Requests\UpdateFrontendRequest;
use Illuminate\Http\Request;
use App\Models\Frontend;
use App\Models\Post;
use App\Models\Category;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('active', 1)->get();
        $posts = DB::table('posts')
            ->join('categories', 'categories.id', 'posts.category_id')
            ->select('posts.*', 'categories.category_name')
            ->get();
        $posts_trending = Post::orderBy('view_count', 'DESC')
                                ->take(4)
                                ->where('active', 1)
                                ->get();
        $posts_trending2=$posts_trending;
        // // echo $posts_trending;
        // // dd();
        return view('frontend.home.index', ['categories' => $categories, 'posts' => $posts,'trending' => $posts_trending,'trending2'=>$posts_trending2]);
        // return view('frontend.home.index', ['posts' => $posts]);
        // // return view('frontend.home.index');

        return view('frontend.home.index');
    }

    public function post_view($id)
    {
        // $post = DB::table('posts')
        //     ->join('categories', 'categories.id', 'posts.category_id')
        //     ->select('posts.*', 'categories.category_name')
        //     ->where('posts.id',$id)
        //     ->get();
        $categories = Category::where('active', 1)->get();

        // $posts_trending = Post::orderBy('view_count', 'DESC')->get();
        $post = Post::find($id);
        $post->update(['view_count' => $post->view_count + 1]);
        // Post::update(['view_count'=>$post->view_count + 1]);
        // $post->view_count = $post->view_count + 1;
        // $post->save();

        // return view('frontend.pages.singlepost', ['categories' => $categories, 'post' => $post, 'posts_trending' => $posts_trending]);
        return view('frontend.pages.singlepost', ['categories' => $categories, 'post' => $post]);
        // return view('frontend.pages.singlepost', ['post' => $post]);
        // return view('frontend.pages.singlepost');
    }
    public function category_view($id)
    {
        $categories = Category::where('active', 1)->get();
        $posts = DB::table('posts')
        ->join('categories', 'categories.id', 'posts.category_id')
        ->select('posts.*', 'categories.category_name')
        ->where('posts.category_id', $id)
            ->get();
        // $posts_trending = Post::orderBy('view_count', 'DESC')->get();
        // echo $posts_trending;
        // dd();
        return view('frontend.pages.category', ['categories' => $categories, 'posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function location_post(Request $request)
    {
        // return $request->all();
        $categories = Category::where('active', 1)->get();
        if($request->location_id<10){
            $posts = DB::table('posts')
            ->join('categories', 'categories.id', 'posts.category_id')
            ->select('posts.*', 'categories.category_name')
            ->where('posts.location_id', $request->location_id)
            ->get();
        }
        else {
            $posts = DB::table('posts')
                ->join('categories', 'categories.id', 'posts.category_id')
                ->select('posts.*', 'categories.category_name')
                ->where('posts.sub_location_id', $request->location_id)
                ->get();
        }
        // $posts_trending = Post::orderBy('view_count', 'DESC')->get();
        // echo $posts_trending;
        // dd();
        return view('frontend.pages.category', ['categories' => $categories, 'posts' => $posts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFrontendRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function search(Request $request)
    {
        $posts = Post::where('post_name','like', '%' . request('search') . '%')
                        ->orWhere('post_title', 'like', '%' . request('search') . '%')
                        ->get();
        // dd($posts);
        // $sql = "SELECT tbl_food.*,tbl_category.title as category
        //          FROM tbl_food,tbl_category
        //          WHERE tbl_food.category_id=tbl_category.ID AND tbl_food.active=1 AND (tbl_food.title LIKE '%$search%' OR tbl_food.description LIKE '%$search%')";
        return view('frontend.pages.searchpage', ['posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Frontend $frontend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFrontendRequest $request, Frontend $frontend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Frontend $frontend)
    {
        //
    }
}
