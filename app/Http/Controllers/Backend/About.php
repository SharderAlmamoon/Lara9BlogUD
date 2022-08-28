<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AboutModel;
use Illuminate\Http\Request;
use Image;
use File;

class About extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutall = AboutModel::orderby('id','desc')->get();
        return view('backend.pages.about.manageAbout',compact('aboutall'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.about.insertAbout');
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
            'title' => 'required',
            'short_title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'about_image' => 'required',
            'status' => 'required',
        ]);
        $about = new AboutModel();
        $about->title = $request->title;
        $about->short_title = $request->short_title;
        $about->short_description = $request->short_description;
        $about->long_description = $request->long_description;
        $about->status = $request->status;

        if($request->about_image){
            $aboutImage = $request->File('about_image');
            $aboutimageCName = hexdec(uniqid()).'.'.$aboutImage->getClientOriginalExtension();
            $aboutImagePath = public_path('backend/aboutImage/'. $aboutimageCName);
            Image::make($aboutImage)->resize(523,605)->save($aboutImagePath);
            $about->about_image = $aboutimageCName;
        }
        $about->save();
        return redirect()->route('about.manage')->with('message','Successfully About Added'); 
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
        $id =\Crypt::decryptString($id);
         $about = AboutModel::find($id);
        return view('backend.pages.about.editAbout',compact('about'));

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
