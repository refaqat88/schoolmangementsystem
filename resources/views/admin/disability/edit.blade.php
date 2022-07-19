@extends('layouts.admin')

@section('title', 'Edit Disability')

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
                                <h3 class="card-title">Disability</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form role="form" action="{{url('admin/disability/update')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $disability->disable_Id}}">
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="nationality">Disable Status</label>
                                        <select name="disable_status" class="form-control @error('disable_status') is-invalid select2 @enderror" style="width: 100%;">
                                            @error('disable_status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <option selected="selected" value="">Select Status</option>
                                            <option value="Yes" @if($disability->disable_status=="Yes") selected @endif>Yes</option>
                                            <option value="No" @if($disability->disable_status=="No") selected @endif>No</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="disability">Disability</label>
                                        <input type="text" class="form-control @error('disability') is-invalid  @enderror" id="disability" value="{{ $disability->disability}}" name="disability" placeholder="Enter Disability"/>
                                        @error('disability')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{url('admin/disability')}}"  class="btn btn-warning cancel" data-title=" ">Cancel</a>
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

