<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DemoController extends Controller
{
    public function index(){
        return view('about');
    }
    public function indexconTact(){
        return view('contact');
    }
    public function signoutrouter(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    // Admin editeprofile
    public function editeprofile(){
         $id = Auth::user()->id;
         $adminuser = User::find($id);
        return view('backend.pages.adminprofile.editprofile',compact('adminuser'));
    }
    public function editprofileFrom(){
         $id = Auth::user()->id;
         $adminuseredit = User::find($id);
        return view('backend.pages.adminprofile.editprofileFrom',compact('adminuseredit'));
    }

    public function updateprofilestore(Request $request){
        // dd($updateUserProfile);
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required'
        ]);

        $id = Auth::user()->id;
        $updateUserProfile = User::find($id);
        $updateUserProfile->name = $request->name;
        $updateUserProfile->username =$request->username;
        $updateUserProfile->email =$request->email;

        $updateUserProfile->update();
        return redirect()->route('editeprofile');

        
    }

}
