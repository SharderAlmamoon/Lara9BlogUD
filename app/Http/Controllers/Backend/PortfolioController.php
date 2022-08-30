<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Portfolio;
use Illuminate\Http\Request;
use Image;
use File;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allportfolio = Portfolio::latest()->get();
        return view('backend.pages.portfolio.portfoliomanage',compact('allportfolio'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('backend.pages.portfolio.insertportfolio');
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
            'portfolio_category'=> 'required',
            'portfolio_title' => 'required',
            'portfolio_longdescription' => 'required',
            'portfolio_image' => 'required',
            'status' => 'required',
        ],[
            'portfolio_category.required' => 'CATEGORY FIELD IS REQUIRED',
            'portfolio_title.required' => 'TITLE FIELD IS REQUIRED',
            'portfolio_longdescription.required' => 'DESCRIPTION FIELD IS REQUIRED',
            'portfolio_image.required' => 'IMAGE FIELD IS REQUIRED',
            'status.required' => 'STATUS FIELD IS REQUIRED',
        ]);
        
       $portfolio = new Portfolio();
       $portfolio->portfolio_category = $request->portfolio_category;
       $portfolio->portfolio_title = $request->portfolio_title;
       $portfolio->portfolio_longdescription = $request->portfolio_longdescription;
       $portfolio->status = $request->status;

        if($request->portfolio_image){
           $portfolioImage = $request->File('portfolio_image');
           $portfolioimageCName = hexdec(uniqid()).'.'. $portfolioImage->getClientOriginalExtension();
           $portfolioImagePath = public_path('backend/portfolioImage/'.$portfolioimageCName);
            Image::make( $portfolioImage)->resize(1020,519)->save( $portfolioImagePath);
           $portfolio->portfolio_image =$portfolioimageCName;
        }
        $portfolio->save();
        return redirect()->route('manage.portfolio');
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
