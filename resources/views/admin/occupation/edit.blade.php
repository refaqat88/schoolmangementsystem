@extends('layouts.admin')

@section('title', 'Edit Occupation')

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
                                <h3 class="card-title">Occupation</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form role="form" action="{{url('admin/occupation/update')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $occupation->occup_Id}}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="occupation">Occupation</label>
                                        <input type="text" class="form-control @error('occupation') is-invalid @enderror" id="occupation" value="{{ $occupation->occup_Name}}" name="occupation" placeholder="Enter Occupation"/>
                                        @error('occupation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{url('admin/occupation')}}" class="btn btn-warning cancel" data-title=" ">Cancel</a>
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

