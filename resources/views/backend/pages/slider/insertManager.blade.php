@extends('backend.mastertemplate.masterAdminTemplate')
@section('allbody')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>INSERT Slider</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
        <div class="text-right">
            <a href="{{route('dashboard')}}" class="btn btn-sm btn-success">Dashboard</a> /
            <a href="{{route('slider.manage')}}" class="btn btn-sm btn-success">Slider Manage</a> 
        </div>
      </div>

      <div class="br-pagebody">
        <div class="row row-sm">
        <div class="col-md-6 offset-md-3">
                <div class="card bg-white">

                    <div class="ml-2 mt-3">
                        @if(count($errors))
                         @foreach($errors->all() as $error)
                             <p class="alert alert-danger">{{$error}}</p>
                          @endforeach
                        @endif
                       <form action="{{route('insert.slider')}}" method="post" enctype="multipart/form-data">
                          @csrf

                        <!--slider_title -->
                        <div class="form-group">
                            <label for="slider_title"><b>Slider Title</b></label>
                            <input type="text" class="form-control" id="slider_title" value="{{old('slider_title')}}" name="slider_title">
                          </div>
                        <!-- slider_shortdes -->
                          <div class="form-group">
                            <label for="slider_shortdes"> <b>Slider Shortdes</b></label>
                            <input type="text" class="form-control" id="slider_shortdes" value="{{old('slider_shortdes')}}" name="slider_shortdes">
                          </div>

                        <!-- slider_url -->
                          <div class="form-group">
                            <label for="slider_url"> <b>Slider Url :</b></label>
                            <input type="text" class="form-control" id="slider_url" value="{{old('slider_url')}}" name="slider_url">
                          </div>
        
                        <!-- slider_image -->
                          <div class="form-group">
                            <label for=""><b>Slider Image</b></label>
                            <input type="file" class="form-control" id="image" name="slider_image">
                          </div>

                          <div class="text-center mt-2">
                            <img id="showimage" src="{{asset('backend/'.'defaultimage.png')}}" class=" rounded avatar-lg" width="100" alt="ADMIN IMAGE" >
                        </div>

                        <button class="btn btn-sm btn-primary" type="submit">Slider Inserted</button>

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