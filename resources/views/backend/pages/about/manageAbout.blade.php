@extends('backend.mastertemplate.masterAdminTemplate')
@section('allbody')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>MANAGE About</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
        <div class="text-right">
            <a href="{{route('dashboard')}}" class="btn btn-sm btn-success">Dashboard</a> /
            <a href="{{route('about.add')}}" class="btn btn-sm btn-success">About add</a> 
        </div>
      </div>

      <div class="br-pagebody">
        <div class="row">
        <div class="col-md-12">
              <div class="card bg-white">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>TITLE</th>
                                <th>S.Title</th>
                                <th>S.Description</th>
                                <th>L.Description</th>
                                <th>Image</th>
                                <th>status</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $serial=1 @endphp
                            @foreach($aboutall as $about)
                            <tr>
                                <td>{{$serial}}</td>
                                <td>{{$about->title}}</td>
                                <td>{{$about->short_title}}</td>
                                <td>{{$about->short_description}}</td>
                                <td>{!! $about->long_description !!}</td>
                                <td>
                                    <img width="100" src="{{asset('backend/aboutImage/'.$about->about_image)}}" alt="SLIDERIMAGE">    
                               </td>
                                <td>
                                    @if($about->status == 1)
                                     <span class="badge badge-info">Active</span>
                                     @else
                                     <span class="badge badge-warning">Inactive</span>
                                     @endif
                                    </td>
                                <td>
                                    <a href="{{route('edit.about',Crypt::encryptString($about->id))}}" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('about.delete',$about->id)}}" onclick="return(confirm('asre You sure Want to Delete'))" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @php $serial++ @endphp
                            @endforeach
                        </tbody>
                    </table>
                        
                   
              </div><!-- card -->
            </div>
         </div>
      </div>
@endsection