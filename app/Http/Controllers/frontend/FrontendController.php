<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\SliderBanner;
use App\Models\Backend\AboutModel;
use App\Models\Backend\GalleryImageAbout;
use App\Models\Backend\Portfolio;
use App\Models\Backend\PostCategory;
use App\Models\Backend\Post;
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
        $allPost = Post::latest()->where('post_status',1)->limit(3)->get();
        return view('frontend.frontendDashboard',compact('sliderFrontend','aboutAll','gallery','portfolio','allPost'));
    }//END METHOD

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        $aboutAll = AboutModel::where('status','2')->get();
       return view('frontend.aboutFrontend',compact('aboutAll'));
    }//END METHOD

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
    }//END METHOD

    public function ReadmoreBlog($id)
    {
        $readmoreBlog = Post::find($id);
        $recentBlog = Post::latest()->limit(5)->get();
        $BlogCategories = PostCategory::orderby('post_category_name','desc')->get();
        return view('frontend.readmoreBlog',compact('readmoreBlog','recentBlog','BlogCategories'));
    }//END METHOD
    public function recentBlogId($id)
    {
        $readmoreBlogUp = Post::find($id);
        $recentBlog = Post::latest()->limit(5)->get();
        $BlogCategories= PostCategory::orderby('post_category_name','desc')->get();
        return view('frontend.recentPattern',compact('readmoreBlogUp','recentBlog','BlogCategories'));
    }//END METHOD

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoryPosts($id)
    {
        $RecenetPost = Post::latest()->limit(3)->get();
        $OurBlog = Post::where('post_category',$id)->get();
        $BlogCategories = PostCategory::orderby('post_category_name','desc')->get();
        $categoryName = PostCategory::findOrFail($id);
        return view('frontend.frontendOurblogPagecategory',compact('OurBlog','RecenetPost','BlogCategories','categoryName'));
    } //END METHOD

    public function portfoliodetails()
    {
        $portfoliod = Portfolio::all();
        return view('frontend.frontentDashoboardportfolio',compact('portfoliod'));
    } //END METHOD

    public function ourblog()
    {
        $OurBlog = Post::latest()->get();
        $RecenetPost = Post::latest()->limit(5)->get();
        $BlogCategories = PostCategory::orderby('post_category_name','desc')->get();
        return view('frontend.frontendOurblogPage',compact('OurBlog','RecenetPost','BlogCategories'));
    }//END METHOD

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function homeportfolio()
    {
        $portfolio = Portfolio::all();
        return view('frontend.homeportfolio',compact('portfolio'));
    }//END METHOD

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }//END METHOD

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
