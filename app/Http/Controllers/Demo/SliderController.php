<?php

namespace App\Http\Controllers\Demo;

use App\Models\frontend\SliderBanner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use File;

class SliderController extends Controller
{
    public function index(){
        return view('backend.pages.slider.insertManager');
    } //End MEthod;

    public function manage(){
        $allSlider = SliderBanner::orderby('id','asc')->get();
        return view('backend.pages.slider.manage',compact('allSlider'));
    } //End MEthod;

    public function store(Request $request){
        $request->validate([
            'slider_title' => 'required',
            'slider_shortdes' => 'required',
            'slider_image' => 'required',
            'slider_url' => 'required',
        ]);
        $sliderinsert = new SliderBanner();
        $sliderinsert->slider_title = $request->slider_title;
        $sliderinsert->slider_shortdes = $request->slider_shortdes;
        $sliderinsert->slider_url = $request->slider_url;

        if($request->slider_image){
            $sliderImage = $request->File('slider_image');
            $sliderimageCName = hexdec(uniqid()).'.'.$sliderImage->getClientOriginalExtension();
            $sliderPath = public_path('backend/sliderImage/'.$sliderimageCName);
            Image::make($sliderImage)->save( $sliderPath);
            $sliderinsert->slider_image = $sliderimageCName;
        }
        $sliderinsert->save();
        return redirect()->route('slider.manage')->with('message','SUccessFully SLider Added'); 
    }//end method

    public function edit($id){
        $id=\Crypt::decryptString($id);
        $slider = SliderBanner::find($id);
        return view('backend.pages.slider.editedSlider',compact('slider'));
    } //end Method

    public function update(Request $request,$id){
        $request->validate([
            'slider_title' => 'required',
            'slider_shortdes' => 'required',
            'slider_image' => 'required',
            'slider_url' => 'required',
        ]);

        $updateSlider = SliderBanner::find($id);
        $updateSlider->slider_title = $request->slider_title; 
        $updateSlider->slider_shortdes = $request->slider_shortdes; 
        $updateSlider->slider_url = $request->slider_url; 

        if($request->slider_image){
            if(File::exists('backend/sliderImage/'.$updateSlider->slider_image)){
                File::delete('backend/sliderImage/'.$updateSlider->slider_image);
            }
            $sliderImage = $request->File('slider_image');
            $sliderimageCName = hexdec(uniqid()).'.'.$sliderImage->getClientOriginalExtension();
            $sliderPath = public_path('backend/sliderImage/'.$sliderimageCName);
            Image::make($sliderImage)->save( $sliderPath);
            $updateSlider->slider_image = $sliderimageCName;
        }
        $updateSlider->update();
        return redirect()->route('slider.manage')->with('info','SUccessFully SLider UPdated');
    } //end Method

    public function destroy(){

    } //end Method
}
