<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Foter;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footers = Foter::all();
        return view('backend.pages.footer.FooterManage',compact('footers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.footer.createfooter');
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
           'number' =>'required|numeric|min:14', 
           'footer_short_description' =>'required', 
           'address' =>'required', 
           'email' =>'required|unique:foters', 
           'facebook_link' =>'required', 
           'twitter_link' =>'required', 
           'linkedin_link' =>'required', 
           'dribble_link' =>'required', 
           'pinterest_link' =>'required', 
           'copywrite_text' =>'required', 
        ],[
            'number.required' =>'Number Is Required', 
           'footer_short_description.required' =>'Description Is required', 
           'address.required' =>'Address is Required', 
           'email.required' =>'Email Is Required', 
           'facebook_link.required' =>'Facebook Is Required', 
           'twitter_link.required' =>'Twitter Is Required', 
           'linkedin_link.required' =>'Linkedin Required', 
           'dribble_link.required' =>'Dribble Required', 
           'pinterest_link.required' =>'Pinterest Required', 
           'copywrite_text.required' =>'CopyWrite Text Required', 
        ]);
        Foter::insert([
            'number'=> $request->number,
            'footer_short_description'=> $request->footer_short_description,
            'address'=> $request->address,
            'email'=> $request->email,
            'facebook_link'=> $request->facebook_link,
            'twitter_link'=> $request->twitter_link,
            'linkedin_link'=> $request->linkedin_link,
            'dribble_link'=> $request->dribble_link,
            'pinterest_link'=> $request->pinterest_link,
            'copywrite_text'=> $request->copywrite_text,
            'created_at'=> Carbon::now()
        ]);
        return redirect()->route('footer.manage')->with('message','SuccessFully Inserted Footer');
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
        $footer = Foter::find($id);
        return view('backend.pages.footer.editFooter',compact('footer'));
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
            'number' =>'required|numeric|min:14', 
            'footer_short_description' =>'required', 
            'address' =>'required', 
            'email' =>'required', 
            'facebook_link' =>'required', 
            'twitter_link' =>'required', 
            'linkedin_link' =>'required', 
            'dribble_link' =>'required', 
            'pinterest_link' =>'required', 
            'copywrite_text' =>'required', 
         ],[
             'number.required' =>'Number Is Required', 
            'footer_short_description.required' =>'Description Is required', 
            'address.required' =>'Address is Required', 
            'email.required' =>'Email Is Required', 
            'facebook_link.required' =>'Facebook Is Required', 
            'twitter_link.required' =>'Twitter Is Required', 
            'linkedin_link.required' =>'Linkedin Required', 
            'dribble_link.required' =>'Dribble Required', 
            'pinterest_link.required' =>'Pinterest Required', 
            'copywrite_text.required' =>'CopyWrite Text Required', 
         ]);

         $footer = Foter::findOrFail($id);

         $footer->update([
             'number'=> $request->number,
             'footer_short_description'=> $request->footer_short_description,
             'address'=> $request->address,
             'email'=> $request->email,
             'facebook_link'=> $request->facebook_link,
             'twitter_link'=> $request->twitter_link,
             'linkedin_link'=> $request->linkedin_link,
             'dribble_link'=> $request->dribble_link,
             'pinterest_link'=> $request->pinterest_link,
             'copywrite_text'=> $request->copywrite_text,
             'created_at'=> Carbon::now()
         ]);
         return redirect()->route('footer.manage')->with('info','SuccessFully Footer Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $footerSingle = Foter::find($id);
        $footerSingle->delete();
        return redirect()->route('footer.manage')->with('warning','SuccessFully Footer Deleted');

    }
}
