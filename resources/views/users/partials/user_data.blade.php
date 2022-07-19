<table id="datatable" data-id="datatable"  class="table table-hover custom_border" cellspacing="0" width="100%">
    <thead class="table-secondary">
    <tr>
        <th class="text-center w-auto">{{ __('layout.SNo') }}</th>
        <th class="w-30">{{ __('layout.Given_Name') }}</th>
        <th class="w-20">{{ __('layout.Username') }}</th>
        <th class="w-15">{{ __('layout.User_Type') }}</th>
        <th class="w-10">{{ __('layout.Status') }}</th>
        <th class="w-15 disabled-sorting text-center">{{ __('layout.Actions') }}</th>
    </tr>
    </thead>

    <tbody>
    @php $i= 1;@endphp
    @foreach($users as $user)
        <tr>
            <td class="text-center">{{$i++}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->username}}</td>
            <td>@if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        {{ $v }}
                    @endforeach
                @endif</td>
            <td>{{$user->status}}</td>
            <td class="text-center disabled-sorting">
                <div class="col-lg-6 text-center  col-md-6 col-sm-1">

                    @canany(['edit-user','delete-user','reset-password-user'])

                        <div class="dropdown text-center">
                            <button style="" class="dropdown-toggle text-left btn-link  btn-round  btn-sm btn text-info  btn-cus-weight"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('layout.Manage') }}
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">

                                @can('view-users')
                                    <a class="dropdown-item" href="#" id="show-user" data-id="{{ $user->id }}"> {{ __('layout.View_Profile') }}</a>

                                @endcan


                                @can('edit-user')
                                    <a class="dropdown-item" href="#" id="edit-user" data-id="{{ $user->id }}"> {{ __('layout.Edit_User') }}</a>
                                @endcan


                                @can('reset-password-user')
                                    <a class="dropdown-item reset-password-user" data-id="{{ $user->id }}" href="#"> {{ __('layout.Reset_Password') }}</a>
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
