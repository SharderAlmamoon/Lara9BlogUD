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
                    <table>
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
                            <tr>
                                <td>1</td>
                                <td>TITLE 1</td>
                                <td>SHORT DESCRIPTIIONUBU</td>
                                <td>SHORT DESCRIPTIIONUBU.png</td>
                                <td>http://youtube.com/al;lmaomoioniubv</td>
                                <td>
                                    <a href="#" class="btn-sm btn-info btn"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn-sm btn-danger btn"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                        
                   
              </div><!-- card -->
            </div>
         </div>
      </div>
@endsection