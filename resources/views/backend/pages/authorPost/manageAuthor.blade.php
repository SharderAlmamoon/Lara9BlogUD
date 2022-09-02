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
        <div class="msg"></div>
        <div class="row">
            <!-- AUTHOR CREATE -->

            <div class="col-md-4">
                <!-- Author Name -->
                <div class="form-group">
                    <label for=""><b>Author Name : </b></label>
                    <input type="text" class="form-control post_author_name" id="post_author_name" placeholder="Enter Your Author Name">
                    <span class="text-danger AuthorNameError"></span>
                </div>
            <!-- Author status -->
                <div class="form-group">
                    <label for=""><b>Author Status : </b></label>
                    <select class="form-control post_author_status" id="post_author_status">
                        <option value="">----Author Status----</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                    <span class="text-danger AuthorStatusError"></span>
                </div>
                <input type="hidden" id="id">
                <!-- Author Button -->
                <div class="from-group buttonnnnn">
                    <button type="submit" class="btn-sm btn btn-dark addButtonSubmit">Add Author</button>
                    <button type="submit" class="btn-sm btn btn-info UpdateButton">Update Author</button>
                </div>
        </div>

         <!--END AUTHOR CREATE -->
            <div class="col-md-8">
                <div class="card bg-white">
                        <table id="datatable2" class="table display responsive">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Author Name</th>
                                    <th>Author Status</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody class="tbodyhereappend">
                                <!-- <tr>
                                    <td>1</td>
                                    <td>ALMAMOON</td>
                                    <td>Active</td>
                                    <td>
                                    <button class="btn btn-success btn-sm EditButton"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-danger btn-sm deleteButton"><i class="fa fa-trash"></i></button>
                                </td>
                                </tr> -->
                            </tbody>
                        </table>
                </div><!-- card -->
            </div>
        </div>
    </div>
@endsection