@extends('backend.mastertemplate.masterAdminTemplate')
@section('allbody')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>INSERT Gallery AboutImage</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
        <div class="text-right">
            <a href="{{route('dashboard')}}" class="btn btn-sm btn-success">Dashboard</a> /
            <a href="{{route('about.manage')}}" class="btn btn-sm btn-success">About Manage</a> 
        </div>
      </div>

  <div class="br-pagebody">
    <div class="row row-sm">
        <div class="col-md-6">
                <div class="card bg-white">

                    <div class="ml-2 mt-3">
                        @if(count($errors))
                         @foreach($errors->all() as $error)
                             <p class="alert alert-danger">{{$error}}</p>
                          @endforeach
                        @endif
                       <form action="{{route('insert.gallerybout',$allabout->id)}}" method="post" enctype="multipart/form-data">
                          @csrf

                        <!--title -->
                        <div class="form-group">
                            <label for="title"><b>About ID</b></label>
                            <input type="text" class="form-control" id="title" value="{{$allabout->id}}" name="about_code" readonly>
                          </div>

                        <!-- about_image -->
                          <div class="form-group">
                            <label for=""><b>About Gallery Image</b></label>
                            <input type="file" class="form-control" id="" name="gallery_about_image[]" multiple>
                          </div>
                        <button class="btn btn-sm btn-primary" type="submit">Add About GalleryImage</button>

                       </form>
                    </div>    
              </div><!-- card -->
        </div>
        <div class="col-md-6">
                    <div class="card bg-white">
                        <p class="display-4 text-warning">Gallery PIC</p>
                        @foreach($galleryImageAll as $galleryimage)
                        <div class="emnitei">
                           <a href="{{route('deletegalleryImage',$galleryimage->id)}}" class="btn-sn btn btn-warning"><i class="fa fa-trash"></i></a>
                           <img src="{{asset('backend/aboutgallery/'.$galleryimage->gallery_about_image)}}" height="100" alt="GalleryImage">
                        </div>
                        @endforeach
                    </div>
                </div>
    </div>
  </div>
@endsection   