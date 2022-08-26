@extends('backend.mastertemplate.masterAdminTemplate')
@section('allbody')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>MANAGE SLIDER</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
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
                                <th>SHORT DES</th>
                                <th>IMAGE</th>
                                <th>VIDEO LINK</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $serial=1 @endphp
                            @foreach($allSlider as $slider)
                            <tr>
                                <td>{{$serial}}</td>
                                <td>{{$slider->slider_title}}</td>
                                <td>{{$slider->slider_shortdes}}</td>
                                <td>
                                    <img width="100" src="{{asset('backend/sliderImage/'.$slider->slider_image)}}" alt="SLIDERIMAGE">    
                               </td>
                                <td>{{$slider->slider_url}}</td>
                                <td>
                                    <a href="{{route('slider.editfrom',Crypt::encryptString($slider->id))}}" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('slider.delete',$slider->id)}}" onclick="return(confirm('asre You sure Want to Delete'))" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></a>
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