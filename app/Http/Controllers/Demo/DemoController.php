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

}
