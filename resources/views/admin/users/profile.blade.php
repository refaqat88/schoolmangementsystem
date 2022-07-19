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
                                
                                    <img class="profile-user-img img-fluid img-circle" width="100" height="auto"
                                         src="{{$adminprofile->photo()}}"
                                         alt="User profile picture">
                               
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
                                    <form class="form-horizontal">
                                        <div class="form-group row">

                                            <div class="col-sm-12">
                                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                {{$adminprofile->name}}
                                            </div>
                                        </div>
                                        <div class="form-group row">

                                            <div class="col-sm-12">
                                                <label for="inputEmail"  class="col-sm-2 col-form-label">Email</label>
                                                {{$adminprofile->email}}
                                            </div>
                                        </div>
                                        <div class="form-group row">

                                            <div class="col-sm-12">
                                                <label for="inputStatus"  class="col-sm-2 col-form-label">Status</label>
                                                {{$adminprofile->status}}
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
