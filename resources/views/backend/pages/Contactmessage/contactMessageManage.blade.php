@extends('backend.mastertemplate.masterAdminTemplate')
@section('allbody')
<div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
          <h4>MANAGE Contact</h4>
          <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
        </div>
        <div class="text-right">
            <a href="{{route('dashboard')}}" class="btn btn-sm btn-success">Dashboard</a> /
            <a href="{{route('manage.ContactForm')}}" class="btn btn-sm btn-success">MANAGE COntact Form</a> 
        </div>
</div>

<div class="br-pagebody">
        <div class="">
          <div class="">
            <table class="table">
              <thead>
                <tr>
                  <th>SL#</th>
                  <th>NAME</th>
                  <th>Email</th>
                  <th>PHONE</th>
                  <th>MESSAGE</th>
                  <th>CREATED_AT</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                @php $serial = 1 @endphp
                @foreach($allContact as $Contact)
                <tr>
                  <td>{{$serial}}</td>
                  <td>{{$Contact->contact_name}}</td>
                  <td>{{$Contact->contact_email}}</td>
                  <td>{{$Contact->contact_number}}</td>
                  <td>{{$Contact->contact_message}}</td>
                  <td>{{$Contact->created_at}}</td>
                  <td>
                     <a href="{{route('delete.contact',$Contact->id)}}"id="delete" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                 @php $serial++ @endphp
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->

        </div><!-- br-section-wrapper -->
      </div>
@endsection