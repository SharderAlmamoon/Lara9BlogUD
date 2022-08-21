@extends('backend.mastertemplate.masterAdminTemplate')
@section('allbody')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Profile Admin</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
      </div>

      <div class="br-pagebody">
        <div class="row row-sm">
        <div class="col-md-6 offset-md-3">
              <div class="card bg-white">
                    <div class="text-center mt-4">
                        <img src="{{!empty($adminuser->profile_image) ? asset('backend/adminimage/'.$adminuser->profile_image) : asset('backend/'.'defaultimage.png')}}" class="img-fluid rounded-circle mb-5" width="100" alt="ADMIN IMAGE" >
                    </div>
                    <div class="text-left ml-2">
                        <h6>Admin Name &nbsp;&nbsp; ::&nbsp; &nbsp;<b>{{$adminuser->name}}</b></h6>
                        <hr>
                        <h6>Admin Username &nbsp;&nbsp; ::&nbsp; &nbsp;<b>{{$adminuser->username}}</b></h6>
                        <hr>
                        <h6>Admin Email &nbsp;&nbsp; ::&nbsp; &nbsp;<b>{{$adminuser->email}}</b></h6>
                        <hr>
                        <a href="{{route('editprofileFrom')}}" class="btn btn-sm btn-oblong btn-secondary btn-block mg-b-10">Edit Profile</a>
                    </div>
                        
                   
              </div><!-- card -->
            </div>
         </div>
      </div>
@endsection