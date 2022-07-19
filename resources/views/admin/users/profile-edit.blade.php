@extends('layouts.admin')

@section('title', 'Admin Home')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
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
                                    @if($adminprofile->user_image)
                                        <img class="profile-user-img img-fluid img-circle"
                                             width="100" height="auto" src="{{asset('upload/user/'.$adminprofile->user_image)}}"
                                             alt="User profile picture">
                                    @else
                                        <img class="avatar border-gray" width="100" height="auto" src="{{url('adminassets/img/accountant.jpg')}}" alt="Default User">
                                    @endif
                                </div>

                                <h3 class="profile-username text-center">{{$adminprofile->name}}</h3>

                                <p class="text-muted text-center">{{ $adminprofile->user_type }}</p>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">

                            <div class="card-body">
                                <div class="tab-content">
                                    <div>

                                        @if(session()->has('message'))
                                            <div class="alert alert-success">
                                                 <span class="close" data-dismiss="alert" aria-label="close">&times;</span>
                                                {{ session()->get('message') }}
                                            </div>
                                        @endif
                                        <form class="form-horizontal" action="{{url('admin/profile/update')}}" method="post" enctype="multipart/form-data">
                                            @csrf()
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" class="form-control" value="{{$adminprofile->name}}" id="inputName" placeholder="Name">
                                                </div>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" class="form-control" value="{{$adminprofile->email}}" id="inputEmail" placeholder="Email">
                                                </div>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group row">
                                                <label for="userImage" class="col-sm-2 col-form-label">Image</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control" placeholder=""
                                                           value="" name="user_image"
                                                           title="User Image">
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputpassword" class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="password" class="form-control"  id="inputPass" placeholder="Password">
                                                </div>
                                                <div class="add-div-error password"></div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputconfpassword" class="col-sm-2 col-form-label">Confirm Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="confirmpassword" class="form-control"  value="" id="inputConfPass" placeholder="Confirm Password">
                                                </div>
                                                <div class="add-div-error confirmpassword"></div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary" >Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
