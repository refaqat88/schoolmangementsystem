@extends('layouts.master')
@section('title', 'Admission')
@section('content')
<div class="content">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"> School Information</h5>
                </div>
                <div class="card-body table-full-width ">
                    <div class="table-condensed">
                        <table class="table " width="100%">
                            <tbody>
                            <tr>
                                <th>School Name</th>
                                <td>{{$school->school_Name}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{$school->school_Add}}</td>
                            </tr>
                            <tr>
                                <th>Primary Contact</th>
                                <td>{{$school->primary_Contact}}</td>
                            </tr>
                            <tr>
                                <th>Secondary Contact</th>
                                <td>{{$school->secondary_Contact}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$school->email}}</td>
                            </tr>
                            <tr>
                                <th>Website</th>
                                <td>{{$school->website}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('front_script')
@endsection