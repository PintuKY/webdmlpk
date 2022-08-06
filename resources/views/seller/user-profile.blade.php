@extends('seller.layouts.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('dist/img/user.png')}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">User Name</h3>

               

                <ul class="list-group list-group-unbordered mb-3">
                 
                  <li class="list-group-item">
                    <b>Email address</b> <a class="float-right">Anand@webmail.com</a>
                  </li>
                </ul>

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Edit Profile</a></li>
             <!--     <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li> -->
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
     <div class="card">
              <div class="card-header">
                <h3 class="card-title">Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                <!--  <thead>
                    <tr>
                      <th style="width: 100px">Details</th>
                    </tr>
                  </thead> -->
                  <tbody>
               
					 
					<tr>
                      <td>User Type </td>
                      <td><span class="badge bg-danger">User</span></td>
                    </tr>
					 
                    <tr>
                      <td>Email</td>
                      <td>Anand@webmail.com</td>
                     </tr>
					 
				
					 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
         
            </div>
            <!-- /.card -->



        
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <form class="form-horizontal">
                     
					  <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">New Password </label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputName" placeholder="Enter New Password">
                        </div>
                      </div>
					  
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Confirm Password </label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputName" placeholder="Enter Confirm Password">
                        </div>
                      </div>
					  
                
					  
          
            
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-success">Update</button>
						  <button type="submit" class="btn btn-danger">Cancel</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->

   
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection