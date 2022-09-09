@extends('backend.mastertemplate.masterAdminTemplate')
@section('allbody')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>Edit Footer</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
        <div class="text-right">
            <a href="{{route('dashboard')}}" class="btn btn-sm btn-success">Dashboard</a> /
            <a href="{{route('footer.manage')}}" class="btn btn-sm btn-success">Footer Manage</a> 
        </div>
      </div>

      <div class="br-pagebody">
        <div class="row row-sm">
        <div class="col-md-8 offset-md-2">
                <div class="card bg-white">

<div class="ml-2 mt-3">
@if(count($errors))
  @foreach($errors->all() as $error)
      <p class="alert alert-danger">{{$error}}</p>
  @endforeach
@endif
<form action="{{route('footer.update',$footer->id)}}" method="post">
  @csrf

<!--Footer Number -->
<div class="form-group">
    <label for="number"><b>Footer Number</b></label>
    <input type="text" class="form-control" id="number" value="{{old('number',$footer->number)}}" name="number" placeholder="Enter number">
  </div>

<!--Footer Footer_short_description -->
<div class="form-group">
    <label for=""><b>Footer Short Description</b></label>
    <textarea name="footer_short_description" id="summernote" class="form-control" cols="5" rows="3" placeholder="Enter Long Description">{{old('footer_short_description',$footer->footer_short_description)}}</textarea>
  </div>

<!-- Footer Address -->
  <div class="form-group">
    <label for="address"> <b>Address</b></label>
    <input type="text" class="form-control" id="address" value="{{old('address',$footer->address)}}" name="address" placeholder="Enter Short Address">
  </div>

<!-- Footer email -->
  <div class="form-group">
    <label for="email"> <b>email</b></label>
    <input type="text" class="form-control" id="email" value="{{old('email',$footer->email)}}" name="email" placeholder="Enter Short Email">
  </div>

<!-- Footer Facebook_link -->
  <div class="form-group">
    <label for="facebook_link"> <b>Facebook Link</b></label>
    <input type="text" class="form-control" id="facebook_link" value="{{old('facebook_link',$footer->facebook_link)}}" name="facebook_link" placeholder="Enter Short FaceBook Link">
  </div>
<!-- Footer twitter_link -->
  <div class="form-group">
    <label for="twitter_link"> <b>Twitter Link</b></label>
    <input type="text" class="form-control" id="twitter_link" value="{{old('twitter_link',$footer->twitter_link)}}" name="twitter_link" placeholder="Enter Short Twitter Link">
  </div>
<!-- Footer linkedin_link -->
  <div class="form-group">
    <label for="linkedin_link"> <b>Linkedin Link</b></label>
    <input type="text" class="form-control" id="linkedin_link" value="{{old('linkedin_link',$footer->linkedin_link)}}" name="linkedin_link" placeholder="Enter Short Linkedin Link">
  </div>
<!-- Footer dribble_link -->
  <div class="form-group">
    <label for="dribble_link"> <b>DRIBBLE Link</b></label>
    <input type="text" class="form-control" id="dribble_link" value="{{old('dribble_link',$footer->dribble_link)}}" name="dribble_link" placeholder="Enter Short DRIBBLE Link">
  </div>
<!-- Footer pinterest_link -->
  <div class="form-group">
    <label for="pinterest_link"> <b>Pinterest Link</b></label>
    <input type="text" class="form-control" id="pinterest_link" value="{{old('pinterest_link',$footer->pinterest_link)}}" name="pinterest_link" placeholder="Enter Short Pinterest Link">
  </div>
<!-- Footer copywrite_text -->
  <div class="form-group">
    <label for="copywrite_text"> <b>Copywrite Text</b></label>
    <input type="text" class="form-control" id="copywrite_text" value="{{old('copywrite_text',$footer->copywrite_text)}}" name="copywrite_text" placeholder="Enter Short Copywrite Text">
  </div>

                        <button class="btn btn-sm btn-info" type="submit">Update Footer</button>

                       </form>
                    </div>
                      
              </div><!-- card -->
            </div>
         </div>
      </div>
@endsection   