<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\SliderBanner;
use App\Models\Backend\AboutModel;
use App\Models\Backend\GalleryImageAbout;
use App\Models\Backend\Portfolio;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliderFrontend = SliderBanner::orderby('id','asc')->get();
        $aboutAll = AboutModel::where('status',2)->get();
        $gallery = GalleryImageAbout::all();
        $portfolio = Portfolio::all();
        return view('frontend.frontendDashboard',compact('sliderFrontend','aboutAll','gallery','portfolio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        $aboutAll = AboutModel::where('status','2')->get();
       return view('frontend.aboutFrontend',compact('aboutAll'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $portfolio = Portfolio::find($id);
        return view('frontend.portfolioFrontend',compact('portfolio'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function portfoliodetails()
    {
        return view('frontend.frontentDashoboardportfolio');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
