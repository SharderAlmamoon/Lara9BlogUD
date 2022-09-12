<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\frontend\SliderBanner;
use App\Models\Backend\AboutModel;
use App\Models\Backend\GalleryImageAbout;
use App\Models\Backend\Portfolio;
use App\Models\Backend\PostCategory;
use App\Models\Backend\Post;
use App\Models\Backend\Foter;
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
        $footerr = Foter::all();
        $sliderFrontend = SliderBanner::orderby('id','asc')->get();
        $aboutAll = AboutModel::where('status',2)->get();
        $gallery = GalleryImageAbout::all();
        $portfolio = Portfolio::all();
        $allPost = Post::latest()->where('post_status',1)->limit(3)->get();
        return view('frontend.frontendDashboard',compact('sliderFrontend','aboutAll','gallery','portfolio','allPost','footerr'));
    }//END METHOD

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    { 
        $title = "About | Almamoon";
        $footerr = Foter::all();
        $aboutAll = AboutModel::where('status','2')->get();
       return view('frontend.aboutFrontend',compact('aboutAll','footerr','title'));
    }//END METHOD

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $title = "Details | Almamoon";
        $footerr = Foter::all();
        $portfolio = Portfolio::find($id);
        return view('frontend.portfolioFrontend',compact('portfolio','footerr','title'));
    }//END METHOD

    public function ReadmoreBlog($id)
    {
        $title = "ReadMoreBlog | Almamoon";
        $footerr = Foter::all();
        $readmoreBlog = Post::find($id);
        $recentBlog = Post::latest()->limit(5)->get();
        $BlogCategories = PostCategory::orderby('post_category_name','desc')->get();
        return view('frontend.readmoreBlog',compact('readmoreBlog','recentBlog','BlogCategories','footerr','title'));
    }//END METHOD
    public function recentBlogId($id)
    {
        $title = "RecentBlog | Almamoon";
        $footerr = Foter::all();
        $readmoreBlogUp = Post::find($id);
        $recentBlog = Post::latest()->limit(5)->get();
        $BlogCategories= PostCategory::orderby('post_category_name','desc')->get();
        return view('frontend.recentPattern',compact('title','readmoreBlogUp','recentBlog','BlogCategories','footerr'));
    }//END METHOD

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoryPosts($id)
    {
        $title = "Category | Almamoon";
        $footerr = Foter::all();
        $RecenetPost = Post::latest()->limit(3)->get();
        $OurBlog = Post::where('post_category',$id)->get();
        $BlogCategories = PostCategory::orderby('post_category_name','desc')->get();
        $categoryName = PostCategory::findOrFail($id);
        return view('frontend.frontendOurblogPagecategory',compact('title','footerr','OurBlog','RecenetPost','BlogCategories','categoryName'));
    } //END METHOD

    public function portfoliodetails()
    {
        $title = "ProtFolioDetails | Almamoon";
        $footerr = Foter::all();
        $portfoliod = Portfolio::all();
        return view('frontend.frontentDashoboardportfolio',compact('title','footerr','portfoliod'));
    } //END METHOD

    public function ourblog()
    {
        $title = "OurBlog | Almamoon";
        $footerr = Foter::all();
        $OurBlog = Post::latest()->paginate(3);
        $RecenetPost = Post::latest()->limit(5)->get();
        $BlogCategories = PostCategory::orderby('post_category_name','desc')->get();
        return view('frontend.frontendOurblogPage',compact('title','footerr','OurBlog','RecenetPost','BlogCategories'));
    }//END METHOD

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function homeportfolio()
    {
        $title = "HomePortfolio | Almamoon";
        $footerr = Foter::all();
        $portfolio = Portfolio::all();
        return view('frontend.homeportfolio',compact('title','footerr','portfolio'));
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
