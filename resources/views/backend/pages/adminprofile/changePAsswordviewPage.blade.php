@extends('backend.mastertemplate.masterAdminTemplate')
@section('allbody')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Change Password</h4>
          <p class="mg-b-2">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
        <div class="float-right pl-5">
            <a href="{{Route('dashboard')}}" class="btn btn-sm btn-info text-white"> Dashboard</a> / <a href="{{Route('editeprofile')}}" class="btn btn-sm btn-info text-white">Profile</a> 
          </div>
      </div>

      <div class="br-pagebody">
        <div class="row row-sm">
        <div class="col-md-6 offset-md-3">
                <div class="card bg-white">
                    <div class="ml-2 mt-3">
                       <form action="{{route('updateuserPasswordchange')}}" method="post">
                          @csrf

                          @if(count($errors))
                             @foreach($errors->all() as $error)
                              <p class="alert alert-danger alert-dismissible fade show">{{$error}}</p>
                             @endforeach
                          
                          @endif

                        <!-- Admin oldpassword -->
                        <div class="form-group">
                            <label for="oldpassword"><b>Admin Oldpassword</b></label>
                            <input type="password" class="form-control" id="oldpassword"  name="oldpassword">
                          </div>

                        <!-- Admin Newpassword -->
                        <div class="form-group">
                            <label for="Newpassword"><b>Admin Newpassword</b></label>
                            <input type="password" class="form-control" id="Newpassword"  name="newpassword"> 
                          </div>

                        <!-- Admin Newpassword -->
                        <div class="form-group">
                            <label for="cnewpassword"><b>Confirm Newpassword</b></label>
                            <input type="password" class="form-control" id="cnewpassword"  name="newpassword_confirmation">
                          </div>
                        <button class="btn btn-sm btn-primary" type="submit">Updated Password</button>
                    </form>
                    </div>
                      
              </div><!-- card -->
            </div>
         </div>
      </div>

@endsection   