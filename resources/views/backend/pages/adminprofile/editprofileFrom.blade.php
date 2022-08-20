@extends('backend.mastertemplate.masterAdminTemplate')
@section('allbody')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Profile Edit</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
      </div>

      <div class="br-pagebody">
        <div class="row row-sm">
        <div class="col-md-6 offset-md-3">
                <div class="card bg-white">

                    <div class="ml-2 mt-3">
                       <form action="" method="post" enctype="multipart/form-data">

                        <!-- Admin Name -->
                        <div class="form-group">
                            <label for="name"><b>Admin Name</b></label>
                            <input type="text" class="form-control" id="name" value="{{$adminuseredit->name}}" name="name">
                          </div>
                        <!-- Admin NAme -->
                          <div class="form-group">
                            <label for="username"> <b>Admin UserName</b></label>
                            <input type="text" class="form-control" id="username" value="{{$adminuseredit->username}}" name="username">
                          </div>
                        <!-- Admin Email -->
                          <div class="form-group">
                            <label for="email"><b>Admin Email</b></label>
                            <input type="text" class="form-control" id="email" value="{{$adminuseredit->email}}" name="email">
                          </div>

                        <!-- Admin Image -->
                          <div class="form-group">
                            <label for=""><b>Admin Image</b></label>
                            <input type="file" class="form-control" id="image" name="image">
                          </div>

                          <div class="text-center mt-2">
                            <img src="{{asset('backend/img/img11.jpg')}}" class="img-fluid rounded-circle mb-3 showimage" width="100" alt="ADMIN IMAGE" >
                        </div>

                        <button class="btn btn-sm btn-primary" type="submit">Updated Profile</button>

                       </form>
                    </div>
                        
                   
              </div><!-- card -->
            </div>
         </div>
      </div>
@endsection   