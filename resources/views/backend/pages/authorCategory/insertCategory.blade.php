@extends('backend.mastertemplate.masterAdminTemplate')
@section('allbody')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>INSERT Category Post</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
        <div class="text-right">
            <a href="{{route('dashboard')}}" class="btn btn-sm btn-success">Dashboard</a> /
            <a href="{{route('manage.category')}}" class="btn btn-sm btn-success">Manage Post Category</a> 
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
                       <form action="{{route('store.category')}}" method="post">
                          @csrf
                        <!--POST CATEGORY -->
                        <div class="form-group">
                            <label for="title"><b>Post Category</b></label>
                            <select name="post_category_name" id="" class="form-control ">
                                <option value="">---Post category---</option>
                                <option value="1" @if(old('post_category_name') == '1') selected @endif>Facebook</option>
                                <option value="2" @if(old('post_category_name') == '2') selected @endif>Laravel</option>
                                <option value="3" @if(old('post_category_name') == '3') selected @endif>Twitter</option>
                                <option value="4" @if(old('post_category_name') == '4') selected @endif>Github</option>
                                <option value="5" @if(old('post_category_name') == '5') selected @endif>Pinterest</option>
                                <option value="6" @if(old('post_category_name') == '6') selected @endif>Reddit</option>
                            </select>
                          </div>
                         <div class="form-group">
                         <label for="title"><b>Category Status</b></label>
                            <select name="post_category_status" class="form-control">
                                <option value="">---Status---</option>
                                <option value="1" @if(old('post_category_status') == '1') selected @endif>Active</option>
                                <option value="2" @if(old('post_category_status') == '2') selected @endif>InActive</option>
                            </select>
                         </div>
                        <button class="btn btn-sm btn-primary" type="submit">Add Category</button>
                       </form>
                    </div>
              </div><!-- card -->
            </div>
         </div>
      </div>
@endsection   