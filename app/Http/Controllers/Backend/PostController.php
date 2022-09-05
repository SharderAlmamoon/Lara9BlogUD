<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\PostCategory;
use App\Models\Backend\PostAuthor;
use App\Models\Backend\Post;
use File;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allpost = Post::latest()->get();
        return view('backend.pages.post.postmanage',compact('allpost'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = PostCategory::where('post_category_status',1)->get();
        $author = PostAuthor::where('post_author_status',1)->get();
        return view('backend.pages.post.postCreate',compact('category','author'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_category'=> 'required',
            'post_author' => 'required',
            'post_title' => 'required',
            'post_long_description' => 'required',
            'post_image' => 'required',
            'post_tags' => 'required',
            'post_status' => 'required',
        ],[
            'post_category.required' => 'CATEGORY FIELD IS REQUIRED',
            'post_author.required' => 'AUTHOR FIELD IS REQUIRED',
            'post_title.required' => 'TITLE FIELD IS REQUIRED',
            'post_long_description.required' => 'LONGDESCRIPTION FIELD IS REQUIRED',
            'post_image.required' => 'IMAGE FIELD IS REQUIRED',
            'post_tags.required' => 'TAGS FIELD IS REQUIRED',
            'post_status.required' => 'STATUS FIELD IS REQUIRED',
        ]);
        
       $postStore = new Post();
       $postStore->post_category = $request->post_category;
       $postStore->post_author = $request->post_author;
       $postStore->post_title = $request->post_title;
       $postStore->post_long_description = $request->post_long_description;
       $postStore->post_tags = $request->post_tags;
       $postStore->post_status = $request->post_status;
       
       if($request->post_image){
         $postImage = $request->File('post_image');
         $imagePostCustomName = rand(00000,99999).'.'.$postImage->getClientOriginalExtension();
         $PosImagePath = public_path('backend/postImage/'.$imagePostCustomName);
         Image::make($postImage)->save( $PosImagePath);
         $postStore->post_image = $imagePostCustomName;
        }
        $postStore->save();
        return redirect()->route('manage.post')->with('message','SUCCESSFULLY POST ADDED');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $singlePost = Post::find($id); 
        $category = PostCategory::where('post_category_status',1)->get();
        $author = PostAuthor::where('post_author_status',1)->get();
        return view('backend.pages.post.postedit',compact('singlePost','category','author'));
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
        $request->validate([
            'post_category'=> 'required',
            'post_author' => 'required',
            'post_title' => 'required',
            'post_long_description' => 'required',
            'post_tags' => 'required',
            'post_status' => 'required',
        ],[
            'post_category.required' => 'CATEGORY FIELD IS REQUIRED',
            'post_author.required' => 'AUTHOR FIELD IS REQUIRED',
            'post_title.required' => 'TITLE FIELD IS REQUIRED',
            'post_long_description.required' => 'LONGDESCRIPTION FIELD IS REQUIRED',
            'post_tags.required' => 'TAGS FIELD IS REQUIRED',
            'post_status.required' => 'STATUS FIELD IS REQUIRED',
        ]);
        
       $postUpdate = Post::find($id);
       $postUpdate->post_category = $request->post_category;
       $postUpdate->post_author = $request->post_author;
       $postUpdate->post_title = $request->post_title;
       $postUpdate->post_long_description = $request->post_long_description;
       $postUpdate->post_tags = $request->post_tags;
       $postUpdate->post_status = $request->post_status;
       
       if($request->post_image){
            if(File::exists('backend/postImage/'. $postUpdate->post_image)){
                File::delete('backend/postImage/'. $postUpdate->post_image);
            }
         $postImage = $request->File('post_image');
         $imagePostCustomName = rand(00000,99999).'.'.$postImage->getClientOriginalExtension();
         $PosImagePath = public_path('backend/postImage/'.$imagePostCustomName);
         Image::make($postImage)->save( $PosImagePath);
         $postUpdate->post_image = $imagePostCustomName;
        }
        $postUpdate->update();
        return redirect()->route('manage.post')->with('info','SUCCESSFULLY POST UpDATED');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $singlePostDelete = Post::find($id);
        if(File::exists('backend/postImage/'. $singlePostDelete->post_image)){
            File::delete('backend/postImage/'. $singlePostDelete->post_image);
        }
        $singlePostDelete->delete();
        return redirect()->route('manage.post')->with('warning','SUCCESSFULLY POST DELETED');

    }
}
