@extends('layouts.admin')

@section('title', 'Edit Designation')

@section('content')
    <div class="content-wrapper">
     <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- center column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Designation</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form role="form" action="{{url('admin/designation/update')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $designation->desig_Id}}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nationality">Designation</label>
                                        <input type="text" class="form-control @error('designation') is-invalid @enderror" id="designation" value="{{ $designation->designation}}" name="designation" placeholder="Enter Designation"/>
                                        @error('designation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="employee_type">Employee Type</label>
                                        <select name="employee_type" id="employee_type" class="form-control @error('employee_type') is-invalid  @enderror" style="width: 100%;">
                                            @error('designation')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                            <option selected="selected" value="">Select Employee Type</option>
                                            @foreach($employee_types as $employee_type)
                                                <option value="{{$employee_type->emp_typ_Id}}" @if($designation->emp_typ_Id==$employee_type->emp_typ_Id) selected @endif>{{$employee_type->emp_Type}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="nationality">Gender</label>
                                        <select name="status" class="form-control @error('status') is-invalid select2 @enderror" style="width: 100%;">
                                            @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                            <option selected="selected" value="">Select Gender</option>
                                            <option value="Active" @if($designation->desig_Status=="Active") selected @endif>Active</option>
                                            <option value="Inactive" @if($designation->desig_Status=="Inactive") selected @endif>Inactive</option>
                                        </select>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{url('admin/designation')}}" class="btn btn-warning cancel" data-title=" ">Cancel</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (center) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('custom_css')
    <!-- DataTables css File-->
    {{--<link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">--}}
@endsection

@section('custom_script')
    <!-- DataTables Js Files -->
   {{-- <script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>--}}
   {{-- <script src="{{asset('js/admin_common_script.js')}}"></script>--}}
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection

