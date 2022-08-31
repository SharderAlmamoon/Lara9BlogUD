@extends('backend.mastertemplate.masterAdminTemplate')
@section('allbody')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>INSERT Porrtfolio</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
        <div class="text-right">
            <a href="{{route('dashboard')}}" class="btn btn-sm btn-success">Dashboard</a> /
            <a href="{{route('manage.portfolio')}}" class="btn btn-sm btn-success">Manage Portfolio</a> 
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
                       <form action="{{route('portfolio.insert')}}" method="post" enctype="multipart/form-data">
                          @csrf

                        <!--title -->
                        <div class="form-group">
                            <label for="title"><b>Portfolio Category</b></label>
                            <select name="portfolio_category" id="" class="form-control ">
                                <option value="">---category---</option>
                                <option value="WEB DESIGN" @if(old('portfolio_category') == 'webdesign') selected @endif>WEB DESIGN</option>
                                <option value="APPS DESIGN" @if(old('portfolio_category') == 'webdesign') selected @endif>APPS DESIGN</option>
                                <option value="GRAPHIC DESIGN" @if(old('portfolio_category') == 'graphicdesign') selected @endif>GRAPHIC DESIGN</option>
                                <option value="WEB DEVELOPMENT" @if(old('portfolio_category') == 'webDevelopment') selected @endif>WEB DEVELOPMENT</option>
                                <option value="UI/UX DESIGN" @if(old('portfolio_category') == 'uiuxdesign') selected @endif>UI/UX DESIGN</option>
                            </select>
                          </div>

                        <!--portfolio_title -->
                        <div class="form-group">
                            <label for="portfolio_title"><b>portfolio_title</b></label>
                            <input type="text" class="form-control" id="portfolio_title" placeholder="Enter Short Title" value="{{old('portfolio_title')}}" name="portfolio_title">
                          </div>

                        <!-- portfolio_longdescription -->
                          <div class="form-group">
                            <label for="#"> <b>portfolio_longdescription :</b></label>
                            <textarea name="portfolio_longdescription" id="summernote" class="form-control" cols="5" rows="3" placeholder="Enter Long Description">{{old('portfolio_longdescription')}}</textarea>
                          </div>
        
                        <!-- portfolio_image -->
                          <div class="form-group">
                            <label for=""><b>Portfolio Image</b></label>
                            <input type="file" class="form-control" id="image" name="portfolio_image">
                          </div>

                          <div class="text-center mt-2">
                            <img id="showimage" src="{{asset('backend/'.'defaultimage.png')}}" class=" rounded avatar-lg" width="100" alt="ADMIN IMAGE" >
                         </div>
                         <div class="form-group">
                            <select name="status" class="form-control">
                                <option value="">---Status---</option>
                                <option value="1" @if(old('status') == '1') selected @endif>Active</option>
                                <option value="2" @if(old('status') == '2') selected @endif>InActive</option>
                            </select>
                         </div>

                        <button class="btn btn-sm btn-primary" type="submit">Add Portfolio</button>

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