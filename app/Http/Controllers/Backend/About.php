<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AboutModel;
use App\Models\Backend\GalleryImageAbout;
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
        $about =  AboutModel::find($id);
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
        $request->validate([
            'title' => 'required',
            'short_title' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'status' => 'required',
        ]);

        $about = AboutModel::find($id);
        $about->title = $request->title;
        $about->short_title = $request->short_title;
        $about->short_description = $request->short_description;
        $about->long_description = $request->long_description;
        $about->status = $request->status;

        if($request->about_image){
            if(File::exists('backend/aboutImage/'.$about->about_image)){
                File::delete('backend/aboutImage/'.$about->about_image);
            }
            $aboutImage = $request->File('about_image');
            $aboutimageCName = hexdec(uniqid()).'.'.$aboutImage->getClientOriginalExtension();
            $aboutImagePath = public_path('backend/aboutImage/'. $aboutimageCName);
            Image::make($aboutImage)->resize(523,605)->save($aboutImagePath);
            $about->about_image = $aboutimageCName;
        }
        $about->update();
        return redirect()->route('about.manage')->with('info','Successfully About Updated'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $deleteAbout = AboutModel::find($id);
        if(File::exists('backend/aboutImage/'.$deleteAbout->deleteAbout_image)){
            File::delete('backend/aboutImage/'.$deleteAbout->about_image);
        }
        $deleteGallery = GalleryImageAbout::where('about_code',$deleteAbout->id)->get();
        foreach($deleteGallery as $deleteGa){
            if(File::exists('backend/Aboutgallery/'.$deleteGa->gallery_about_image)){
                File::delete('backend/Aboutgallery/'.$deleteGa->gallery_about_image);

                $galleryidDelete = GalleryImageAbout::find($deleteGa->id);
                $galleryidDelete->delete();
            }
        }
       $deleteAbout->delete();
       return back()->with('warning','SuccessFully About Deleted');
    }   //end method




    public function multiimagepage($id){
        $allabout =  AboutModel::find($id);
        $galleryImageAll = GalleryImageAbout::where('about_code',$allabout->id)->get();
        return view('backend.pages.about.galleryImage',compact('allabout','galleryImageAll'));
    }//end method

    public function insertMultiImage(Request $request,$id){
       if($request->gallery_about_image){
         $aboutGalleryImage = $request->File('gallery_about_image');
            foreach($aboutGalleryImage as $aboutGallery){
            $filename = md5(rand(00000,99999).time()).'.'.$aboutGallery->getClientOriginalExtension();
            $fileLocationpath = public_path('backend/Aboutgallery/'.$filename);
            Image::make($aboutGallery)->save($fileLocationpath);

            $galleryImage = new GalleryImageAbout();
            $galleryImage->about_code = $request->about_code;
            $galleryImage->gallery_about_image = $filename;
            $galleryImage->save();
         }
         return redirect()->back()->with('success','Successfully About Image Done');
       } 
    }//end method

    public function deletegalleryImage($id){
        $gtalleryImageDelete = GalleryImageAbout::find($id);
         if(File::exists('backend/Aboutgallery/'.$gtalleryImageDelete->gallery_about_image)){
            File::delete('backend/Aboutgallery/'.$gtalleryImageDelete->gallery_about_image);
         }
         $gtalleryImageDelete->delete();
         return redirect()->back()->with('warning','Successfully Delete');
    }
}
