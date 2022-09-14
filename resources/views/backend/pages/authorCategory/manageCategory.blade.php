@extends('backend.mastertemplate.masterAdminTemplate')
@section('allbody')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>MANAGE Category</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
        <div class="text-right">
            <a href="{{route('dashboard')}}" class="btn btn-sm btn-success">Dashboard</a> /
            <a href="{{route('create.category')}}" class="btn btn-sm btn-success">Create Category</a> 
        </div>
  </div>

      <div class="br-pagebody">
        <div class="row">
        <div class="col-md-12">
              <div class="card bg-white">
                    <table id="datatable2" class="table display responsive">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Category Name</th>
                                <th>Category Status</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allcategory as $key=>$category)
                            <tr>
                                <td>{{$paginationSerial++}}</td>
                                <td>{{$category->post_category_name}}</td>
                                <td>
                                    @if($category->post_category_status == 1)
                                     <span class="badge badge-info">Active</span>
                                     @else
                                     <span class="badge badge-warning">Inactive</span>
                                     @endif
                                    </td>
                                <td>
                                    <a href="{{route('edit.category',Crypt::encryptString($category->id))}}" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('delete.category',$category->id)}}" id="delete" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
              </div><!-- card -->
            </div>
         </div>
         <div class="ht-80 d-flex align-items-center justify-content-end">
            <!-- {{$allcategory->render()}} -->
            {{$allcategory->links('vendor.pagination.backendpaginationCustom')}}
            </div>
      </div>
@endsection