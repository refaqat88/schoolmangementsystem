@extends('layouts.admin')

@section('title', 'Edit City')

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
                                <h3 class="card-title">City</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form role="form" action="{{url('admin/employee-type/update')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $employee_type->emp_typ_Id}}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="designation">Designation</label>
                                        <select name="designation" id="designation" class="form-control @error('designation') is-invalid select2 @enderror" style="width: 100%;">
                                            @error('designation')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                            <option selected="selected" value="">Select Designation</option>
                                            @foreach($designations as $designation)
                                                <option value="{{$designation->desig_Id}}" @if($designation->desig_Id==$employee_type->desig_Id) selected @endif>{{$designation->designation}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="employee-type">Employee Type</label>
                                        <select name="employee_type" id="employee-type" class="form-control @error('employee_type') is-invalid select2 @enderror" style="width: 100%;">
                                            @error('employee_type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <option selected="selected" value="">Select Employee Type</option>
                                            <option value="Teaching" @if($employee_type->emp_Type=='Teaching') selected @endif>Teaching</option>
                                            <option value="None Teaching" @if($employee_type->emp_Type=='None Teaching') selected @endif>None Teaching</option>
                                        </select>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{url('admin/employee-type')}}" class="btn btn-warning cancel" data-title=" ">Cancel</a>
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

