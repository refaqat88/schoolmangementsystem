@extends('layouts.admin')

@section('title', 'Edit District')

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
                                <h3 class="card-title">District</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <form role="form" action="{{url('admin/district/update')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $district->dom_Id}}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nationality</label>
                                        <select name="nationality" class="form-control @error('nationality') is-invalid @enderror" style="width: 100%;">
                                            <option value="">Select Nationality</option>
                                            @foreach($nationalities as $nationality)
                                                <option value="{{$nationality->nation_Id}}" @if($nationality->nation_Id==$district->nation_Id) selected @endif>{{$nationality->nationality}}</option>
                                            @endforeach
                                        </select>
                                        @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>State</label>
                                        <select name="state" class="form-control @error('state') is-invalid @enderror" style="width: 100%;">
                                            <option  value="">Select State</option>
                                            <option selected="selected" value="{{$district->state_Id}}">{{$district->state_name}}</option>
                                           {{-- @foreach($states as $state)
                                                <option value="{{$state->state_Id}}" @if($state->state_Id==$district->state_Id) selected @endif>{{$state->state_name}}</option>
                                            @endforeach--}}
                                        </select>
                                        @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="district">District</label>
                                        <input type="text" class="form-control @error('district') is-invalid @enderror" id="district" value="{{ $district->dom_District}}" name="district" placeholder="Enter District"/>
                                        @error('district')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="{{url('admin/district')}}" class="btn btn-warning cancel" data-title=" ">Cancel</a>
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
    <script src="{{asset('js/admin_region.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection

