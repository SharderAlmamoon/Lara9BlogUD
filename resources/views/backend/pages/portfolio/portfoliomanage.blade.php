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
        <div class="">
          <div class="">
            <table class="table">
              <thead>
                <tr>
                  <th>CATEGORY</th>
                  <th>TITLE</th>
                  <th>IMAGE</th>
                  <th>DESCRIPTION</th>
                  <th>Status</th>
                  <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                @foreach($allportfolio as $portfolio)
                <tr>
                  <td>{{$portfolio->portfolio_category}}</td>
                  <td>{{$portfolio->portfolio_title}}</td>

                  <td>
                    <img height="100" src="{{asset('backend/portfolioImage/'.$portfolio->portfolio_image)}}" alt="">
                  </td>
                  <td>{!! $portfolio->portfolio_longdescription !!}</td>
                  <td>{{$portfolio->status}}</td>
                  <td>
                    <a href="#" class="btn btn-sm btn warning"><i class="fa fa-edit"></i></a>
                    <a href="#" class="btn btn-sm btn danger"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->

        </div><!-- br-section-wrapper -->
      </div>
@endsection