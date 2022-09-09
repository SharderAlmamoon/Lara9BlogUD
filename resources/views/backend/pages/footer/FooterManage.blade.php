@extends('backend.mastertemplate.masterAdminTemplate')
@section('allbody')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>MANAGE Footer</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
        <div class="text-right">
            <a href="{{route('dashboard')}}" class="btn btn-sm btn-success">Dashboard</a> /
            <a href="{{route('about.add')}}" class="btn btn-sm btn-success">Footer add</a> 
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
                                <th>Number</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Facebook Link</th>
                                <th>Linkedin lINK</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $serial=1 @endphp
                            @foreach($footers as $footer)
                            <tr>
                                <td>{{$serial}}</td>
                                <td>{{$footer->number}}</td>
                                <td>{{$footer->address}}</td>
                                <td>{{$footer->email}}</td>
                                <td>{{$footer->facebook_link}}</td>
                                <td>{{$footer->linkedin_link}}</td>
                                <td>
                                    <a href="{{route('footer.edit',Crypt::encryptString($footer->id))}}" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('footer.delete',$footer->id)}}" id="delete" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></a>
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