@extends('backend.mastertemplate.masterAdminTemplate')
@section('allbody')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>MANAGE POST</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
        <div class="text-right">
            <a href="{{route('dashboard')}}" class="btn btn-sm btn-success">Dashboard</a> /
            <a href="{{route('post.create')}}" class="btn btn-sm btn-success">add Post</a> 
        </div>
</div>

<div class="br-pagebody">
        <div class="">
          <div class="">
            <table class="table">
              <thead>
                <tr>
                  <th>Category</th>
                  <th>Author</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Tags</th>
                  <th>Status</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                @foreach($allpost as $port)
                <tr>
                  <td>@if($port->categoryName)
                    <span class="badge badge-primary">{{$port->categoryName->post_category_name}}</span>
                    @else
                    <span class="badge badge-danger">C.Deleted</span>
                    @endif
                  </td>

                  <td>@if($port->authorName)
                    <span class="badge badge-info">{{$port->authorName->post_author_name}}</span>
                    @else
                    <span class="badge badge-danger">A.Deleted</span>
                    @endif
                  </td>

                  <td>
                    <img height="100" src="{{asset('backend/postImage/'.$port->post_image)}}" alt="">
                  </td>
                  <td>{{$port->post_title}}</td>
                  <td>{{$port->post_tags}}</td>
                  <td>
                      @if($port->post_status == 1)
                      <span class="badge badge-success">Active</span> 
                      @else 
                      <span class="badge badge-warning">Inactive</span> 
                      @endif
                    </td>
                  <td>
                    <a href="{{route('edit.post',$port->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                    <a href="{{route('delete.post',$port->id)}}"id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->

        </div><!-- br-section-wrapper -->
      </div>
@endsection