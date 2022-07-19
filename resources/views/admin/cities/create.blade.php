@extends('layouts.admin')

@section('title', 'Create City')

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

                            <form role="form" action="{{url('admin/cities/add')}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>District</label>
                                        <select name="district" class="form-control @error('district') is-invalid select2 @enderror" style="width: 100%;">
                                            <option selected="selected" value="">Select District</option>
                                            @foreach($districts as $district)
                                            <option value="{{$district->dom_Id}}">{{$district->dom_District}}</option>
                                            @endforeach
                                        </select>
                                        @error('district')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="city_name">City Name</label>
                                        <input type="text" class="form-control @error('city_name') is-invalid @enderror" id="city_name" value="{{ old('city_name')}}" name="city_name" placeholder="Enter City Name"/>
                                        @error('city_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="zip-code">Zip Code</label>
                                        <input type="text" class="form-control @error('zip_code') is-invalid @enderror" id="zip-code" value="{{ old('zip_code')}}" name="zip_code" placeholder="Enter Zip Code"/>
                                        @error('zip_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{url('admin/cities')}}" class="btn btn-warning cancel" data-title=" "">Cancel</a>
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

