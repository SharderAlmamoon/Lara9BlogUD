@extends('backend.mastertemplate.masterAdminTemplate')
@section('allbody')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>INSERT Post</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
        <div class="text-right">
            <a href="{{route('dashboard')}}" class="btn btn-sm btn-success">Dashboard</a> /
            <a href="{{route('manage.post')}}" class="btn btn-sm btn-success">Manage Post</a> 
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
                       <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                          @csrf

                        <!--Category -->
                <div class="form-group">
                    <label for="title"><b>Post Category</b></label>
                    <select name="post_category" id="" class="form-control ">
                        <option value="">---category---</option>
                        @foreach($category as $cate)
                        <option value="{{$cate->id}}" @if(old('post_category') == $cate->id) selected @endif>{{$cate->post_category_name}}</option>
                        @endforeach
                    </select>
                    </div>

                <!--author -->
                <div class="form-group">
                    <label for="title"><b>Post Category</b></label>
                    <select name="post_author" id="" class="form-control ">
                        <option value="">---Author---</option>
                        @foreach($author as $autho)
                        <option value="{{$autho->id}}" @if(old('post_author') == $autho->id) selected @endif>{{$autho->post_author_name}}</option>
                        @endforeach
                    </select>
                    </div>

                        <!--post_title -->
                        <div class="form-group">
                            <label for="post_title"><b>Post_title</b></label>
                            <input type="text" class="form-control" id="post_title" placeholder="Enter Post Title" value="{{old('post_title')}}" name="post_title">
                          </div>
                        <!--post_tags -->
                        <div class="form-group">
                            <label for="post_tags"><b>post_tags</b></label>
                            <input type="text" class="form-control" data-role="tagsinput" placeholder="Enter Post Tag" name="post_tags">
                          </div>

                        <!-- post_long_description -->
                          <div class="form-group">
                            <label for="#"> <b>post_long_description :</b></label>
                            <textarea name="post_long_description" id="summernote" class="form-control" cols="5" rows="3" placeholder="Enter Long Description">{{old('post_long_description')}}</textarea>
                          </div>
        
                        <!-- post_image -->
                          <div class="form-group">
                            <label for=""><b>post_image</b></label>
                            <input type="file" class="form-control" id="image" name="post_image">
                          </div>

                          <div class="text-center mt-2">
                            <img id="showimage" src="{{asset('backend/'.'defaultimage.png')}}" class=" rounded avatar-lg" width="100" alt="ADMIN IMAGE" >
                         </div>
                         <div class="form-group">
                            <select name="post_status" class="form-control">
                                <option value="">---post_status---</option>
                                <option value="1" @if(old('post_status') == '1') selected @endif>Active</option>
                                <option value="2" @if(old('post_status') == '2') selected @endif>InActive</option>
                            </select>
                         </div>
                        <button class="btn btn-sm btn-primary" type="submit">Insert Post</button>

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