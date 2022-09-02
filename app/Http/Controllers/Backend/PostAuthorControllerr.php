<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Backend\PostAuthor;

class PostAuthorControllerr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.authorpost.manageAuthor');
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
        $validator = Validator::make($request->all(),[
            'post_author_name' => 'required',
            'post_author_status' => 'required',
        ],[
            'post_author_name.required' => 'AUTHOR NAME IS REQUIRED',
            'post_author_status.required' => 'AUTHOR STATUS IS REQUIRED',
        ]);
        if($validator->fails()){
            return response()->json([
                'fails' =>  '404',
                'errors'=>$validator->messages() 
            ]);
        }else{
            $authorCreate = new PostAuthor();
            $authorCreate->post_author_name = $request->post_author_name;
            $authorCreate->post_author_status = $request->post_author_status;
            $authorCreate->save();
            return response()->json([
                'success'=>'SUCCEFFFULLY Included AUTHOR'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $PostAuthorall = PostAuthor::all();
        return response()->json([
            'allauthor'=>$PostAuthorall
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $AuthorSingle = PostAuthor::find($id);
        return response()->json([
            'singleauthor'=>$AuthorSingle
        ]);
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
        $validator = Validator::make($request->all(),[
            'post_author_name' => 'required',
            'post_author_status' => 'required',
        ],[
            'post_author_name.required' => 'AUTHOR NAME IS REQUIRED',
            'post_author_status.required' => 'AUTHOR STATUS IS REQUIRED',
        ]);

            $authorCreate = PostAuthor::find($id);
            $authorCreate->post_author_name = $request->name;
            $authorCreate->post_author_status = $request->status;
            $authorCreate->update();
            return response()->json([
                'success'=>'SUCCEFFFULLY Updated AUTHOR'
            ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authordelete = PostAuthor::find($id);
        $authordelete->delete();
        return response()->json([
            'success'=>'AUTHOR Has Been Deleted'
        ]);
    }
}
