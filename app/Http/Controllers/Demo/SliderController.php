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
        return view('backend.pages.slider.manage');
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

        
    }
}
