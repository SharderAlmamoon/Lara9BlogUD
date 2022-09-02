<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allcategory = PostCategory::latest()->get();
        return view('backend.pages.authorCategory.manageCategory',compact('allcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.authorCategory.insertCategory');
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
            'post_category_name' => 'required',
            'post_category_status' => 'required',
        ],[
           'post_category_name.required' => 'NAME FIELD REQUIRED', 
           'post_category_status.required' => 'Status FIELD REQUIRED', 
        ]);
        $categoryInsert = new PostCategory();
        $categoryInsert->post_category_name = $request->post_category_name;
        $categoryInsert->post_category_status = $request->post_category_status;
        $categoryInsert->save();
        return redirect()->route('manage.category')->with('message','Succesfully Category inserted');
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
        $id = \Crypt::decryptString($id);
        $category = PostCategory::find($id);
        return view('backend.pages.authorCategory.editCategory',compact('category'));
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
            'post_category_name' => 'required',
            'post_category_status' => 'required',
        ],[
           'post_category_name.required' => 'NAME FIELD REQUIRED', 
           'post_category_status.required' => 'Status FIELD REQUIRED', 
        ]);
        $categoryUpdate = PostCategory::find($id);
        $categoryUpdate->post_category_name = $request->post_category_name;
        $categoryUpdate->post_category_status = $request->post_category_status;
        $categoryUpdate->update();
        return redirect()->route('manage.category')->with('message','Succesfully Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteCategory = PostCategory::find($id);
        $deleteCategory->delete();
        return redirect()->route('manage.category')->with('warning','successfully Delete');
    }
}
