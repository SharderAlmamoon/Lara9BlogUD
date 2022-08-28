@extends('backend.mastertemplate.masterAdminTemplate')
@section('allbody')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>INSERT About</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
        <div class="text-right">
            <a href="{{route('dashboard')}}" class="btn btn-sm btn-success">Dashboard</a> /
            <a href="{{route('about.manage')}}" class="btn btn-sm btn-success">About Manage</a> 
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
                       <form action="{{route('update.about',$about->id)}}" method="post" enctype="multipart/form-data">
                          @csrf

                        <!--title -->
                        <div class="form-group">
                            <label for="title"><b>About Title</b></label>
                            <input type="text" class="form-control" id="title" value="{{old('title',$about->title)}}" name="title" placeholder="Enter Title">
                          </div>

                        <!--short_title -->
                        <div class="form-group">
                            <label for="short_title"><b>short_title</b></label>
                            <input type="text" class="form-control" id="short_title" placeholder="Enter Short Title" value="{{old('short_title',$about->short_title)}}" name="short_title">
                          </div>

                        <!-- short_description -->
                          <div class="form-group">
                            <label for="short_description"> <b>short_description</b></label>
                            <input type="text" class="form-control" id="short_description" value="{{old('short_description',$about->short_description)}}" name="short_description" placeholder="Enter Short Description">
                          </div>

                        <!-- long_description -->
                          <div class="form-group">
                            <label for="#"> <b>long_description :</b></label>
                            <textarea name="long_description" id="summernote" class="form-control" cols="5" rows="3" placeholder="Enter Long Description">{{old('long_description',$about->long_description)}}</textarea>
                          </div>
        
                        <!-- about_image -->
                          <div class="form-group">
                            <label for=""><b>About Image</b></label>
                            <input type="file" class="form-control" id="image" name="about_image">
                          </div>

                          <div class="text-center mt-2">
                            <img id="showimage" src="{{asset('backend/aboutImage/'.$about->about_image)}}" class=" rounded avatar-lg" width="100" alt="ADMIN IMAGE" >
                         </div>
                         <div class="form-group">
                            <select name="status" class="form-control">
                                <option value="">---Status---</option>
                                <option value="1" @if(old('status',$about->status) == '1') selected @endif>Active</option>
                                <option value="2" @if(old('status',$about->status) == '2') selected @endif>InActive</option>
                            </select>
                         </div>

                        <button class="btn btn-sm btn-primary" type="submit">Add About</button>

                       </form>
                    </div>
                      
              </div><!-- card -->
            </div>
         </div>
      </div>
      <script>
         jQuery(document).ready(function(){
          jQuery('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
              jQuery('#showimage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
            
          });
         });
      </script>
@endsection   