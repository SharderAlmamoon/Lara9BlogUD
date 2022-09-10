<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\ContactFrom;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContactFromController extends Controller
{
    public function index(){
        $allContact = ContactFrom::latest()->get();
        return view('backend.pages.Contactmessage.contactMessageManage',compact('allContact'));
       
    }//eNd Method

    public function store(Request $request){
            $request->validate([
                'contact_name'=>'required',
                'contact_email'=>'required',
                'contact_number'=>'required',
                'contact_message'=>'required',
            ],[
                'contact_name.required' => 'THE NAME FIELD REQUIRED',
                'contact_email.required' => 'THE Email FIELD REQUIRED',
                'contact_number.required' => 'THE Number FIELD REQUIRED',
                'contact_message.required' => 'THE MESSAGE FIELD REQUIRED',
            ]);
            $contactFrom = new ContactFrom();
            $contactFrom->contact_name = $request->contact_name;
            $contactFrom->contact_email = $request->contact_email;
            $contactFrom->contact_number = $request->contact_number;
            $contactFrom->contact_message = $request->contact_message;
            $contactFrom->created_at = Carbon::now();
            $contactFrom->save();
            return back()->with('message','SUCCESSFULLY SENDING MESSAGE');
    } //End Method

    public function destroy($id){
        $deleteCOntact = ContactFrom::findOrFail($id);
        $deleteCOntact->delete();
        return back()->with('warning','Succeddfully Deleted');
    } //end Method
}
