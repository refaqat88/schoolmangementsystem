@extends('layouts.master')
@section('title', 'Author')
@section('content')
    <style>
        .add-div-error{
            color: red;
        }
        .edit-div-error{
            color: red;
        }
    </style>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h4 class="card-title">Authors</h4>
                    </div>
                    <div class="card-body">
                        <div class="row bor-sep">
                            <div class="col-sm-12 pull-right">
                                @can('add-library')
                                    <button class="btn btn-secondary btn-round pull-right" data-toggle="modal"
                                        data-target="#AuthorModal" id="show-author-btn">
                                    Add New Author
                                </button>
                                @endcan
                            </div>
                        </div>
                        {{--add Subject Modal--}}
                        <div class="modal fade modalvisibillity" id="AuthorModal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Add New Stationary</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">
                                            <form id="AuthorForm">
                                                <div class="add-div-error" style="display:none">
                                                    <div class="alert alert-danger alert-dismissible fade show"
                                                        role="alert" id="add-alert-danger">
                                                        <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <ul class="p-0 m-0" style="list-style: none;">
                                                            <li></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                @csrf

                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        <label>Author Name</label>
                                                        <input type="text" class="form-control" placeholder=""
                                                                name="authorName">
                                                        <div class="add-div-error authorName"></div>
                                                    </div>

                                                </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-success btn-round btn-link add-new-author-btn" id="add-Author-Btn">Save
                                            </button>

                                        </div>
                                        <div class="divider"></div>
                                        <div class="">
                                            <button type="button"  class="btn btn-danger btn-round btn-link" data-dismiss="modal" >
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{--end add Subject Modal--}}

                        {{--edit Subject Modal--}}
                        
                        <div class="modal fade" id="EditAuthorModal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <form id="EditAuthorForm" action="" method="Post">
                                    @csrf
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Edit Authors</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">

                                                <input type="hidden" name="id" id="auth_id">
                                                <div class="col-sm-12">

                                                    <div class="row">
                                                        <div class="form-group col-sm-12">
                                                            <label>Name</label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                name="authorName" id="auth_name">
                                                            <div class="edit-div-error authorName"></div>

                                                        </div>

                                                    </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="submit" class="btn btn-round btn-success btn-link update-author-btn" id="update-Btn">Update
                                            </button>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="">
                                            <button type="button" class="btn btn-round btn-danger btn-link" data-dismiss="modal">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>

                                </div>
                                </form>
                            </div>
                        </div>
                        {{--end edit subject modal--}}

                        {{--show subject Modal--}}
                        <div class="modal fade modalvisibillity" id="ShowAuthorModal" tabindex="-1" role="dialog"
                             aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                                <div class="modal-content">
                                    <div class="modal-header justify-content-center">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                        <h5 class="title title-up" id="Model-Title">Show Author</h5>
                                    </div>
                                    <div class="modal-body row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="form-group col-sm-12">
                                                    <label>Name</label>
                                                    <p id="show-auth-name"></p><hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="">
                                            <button type="button" data-dismiss="modal" class="btn btn-round btn-danger btn-link">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--end Show subject modal--}}
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                    <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">Author Record List</h6>
                                </div>
                                <div class="card-body">
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0"
                                           width="100%">
                                        <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th class="disabled-sorting">Actions</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th class="disabled-sorting">Actions</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php $i=1; ?>
                                        @foreach($authors as $author)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$author->auth_Name}}</td>
                                                <td class="text-center">
                                                    <div class="form-inline">
                                                        <div class="">
                                                            @can('view-library')
                                                            <button class=" btn-link btn-cus-weight show-auther"
                                                                    type="button"
                                                                    data-toggle="modal"
                                                                    {{-- data-target="#viewclass"--}}
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false" data-id="{{ $author->auth_Id  }}">
                                                                View
                                                            </button>
                                                            @endcan
                                                        </div>
                                                        @canany(['edit-library','delete-library'])
                                                        <div
                                                                class="nav-item btn-rotate dropdown pull-right ">
                                                            <a class="nav-link dropdown-toggle pull-right"
                                                               href="javascript:void(0)"
                                                               data-toggle="dropdown"
                                                               aria-haspopup="true"
                                                               aria-expanded="false" data-id="{{ $author->auth_Id }}">
                                                            </a>
                                                            <div  class="dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdownMenuLink">
                                                                @can('edit-library')
                                                                <a class="dropdown-item edit-auther" href="javascript:void(0)"
                                                                   data-toggle="modal"
                                                                   aria-haspopup="true"
                                                                   aria-expanded="false" data-id="{{ $author->auth_Id }}">Edit</a>
                                                                @endcan
                                                                @can('delete-library')
                                                                <a class="dropdown-item delete-author-btn"
                                                                   href="javascript:void(0)" data-id="{{$author->auth_Id}}">Delete</a>
                                                                @endcan
                                                            </div>
                                                        </div>
                                                        @endcanany
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div><!-- end content-->
                            </div><!--  end card  -->
                        </div> <!-- end col-md-12 -->
                    </div> <!-- end row -->

                </div>

            </div>

        </div>

    </div>

@endsection

@section('front_script')
    <script src="{{asset('adminassets/validator/dist/jquery.validate.js')}}"></script>
    <script src="{{asset('js/author.js')}}"></script>     
@endsection
