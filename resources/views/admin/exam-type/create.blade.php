@extends('layouts.admin')

@section('title', 'Create Exam Type')

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
                                <h3 class="card-title">Exam Type</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form role="form" action="{{url('admin/exam-type/add')}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="religion">Exam Type Name</label>
                                        <input type="text" class="form-control @error('exam_type_Name') is-invalid @enderror" id="exam_type_Name" value="{{ old('exam_type_Name')}}" name="exam_type_Name" placeholder="Enter Exam Type Name"/>
                                        @error('exam_type_Name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Exam Status</label>
                                        <select name="exam_Status" class="form-control @error('exam_Status') is-invalid @enderror" style="width: 100%;">
                                            <option selected="selected" value="">Select Exam Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                        @error('exam_Status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{ url('admin/exam-type') }}" class="btn btn-warning cancel" data-title=" ">Cancel</a>
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

