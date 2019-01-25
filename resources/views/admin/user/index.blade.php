@extends('admin.layouts.master')
@section('title','Users')
@section('content')

    <div class="portlet-body" style="border: 1px solid #ddd;
    border-radius: 4px; padding:10px; margin-bottom:10px;">
        <div class="table-toolbar">
            <form action="" method="GET" class="form-horizontal form-bordered" id="filter_box">
                <div class="row">
                    <!-- Filter Name -->
                    <div class="col-md-3">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" class="form-control">
                        <div class="help-block">Name</div>
                    </div>
                    
                    <div class="col-md-3">
                        <select name="role" id="" class="form-control">
                          <option value="">Role</option>
                          <option value="1" {{ (isset($role) && $role == 1) ? 'selected' : '' }}>Admin</option>
                          <option value="2" {{ (isset($role) && $role == 2) ? 'selected' : '' }}>User</option>
                        </select>
                        <div class="help-block">Role</div>
                    </div>
                    <!-- Filter Date -->
                    <div class="col-md-4">
                        <div class="input-group input-large date-picker input-daterange">
                            <input value="{{old('begin_date')}}" readonly name="begin_date" placeholder="Begin" data-toggle="datepicker" data-provide="datepicker" type="text" class="form-control">
                            <span class="input-group-addon"> To </span>
                            <input value="{{old('end_date')}}" name="end_date" data-toggle="datepicker" readonly placeholder="End" type="text" class="form-control">
                        </div>
                        <div class="help-block">Created date</div>
                    </div>
                    <!-- Search Submit -->
                    <div class="col-md-1">
                        <input type="submit" name="search" class="btn blue-steel" value="Search" />
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('admin.layouts.flash-msg')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <table width="100%" class="table table-striped table-bordered table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <!-- BEGIN MODAL CONFIRM DELETE ITEM -->
                            <div class="modal fade" id="delete{{$user->id}}" tabindex="-1" role="basic" aria-hidden="true" style="display: none;" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title text-center">Confirm delete </h4>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to delete : {{$user->name}} ?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('user.delete',$user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-danger btn-delete">Delete</button>
                                            </form>
                                            <button type="button" class="btn dark btn-outline" data-dismiss="modal"><i class="fa fa-remove"></i>Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->id_role ==1)
                                    {{ "Admin" }}
                                    @else
                                    {{ "User" }}
                                    @endif
                                </td>
                                <td>{{ $user->created_at }}</td>
                                
                                <td>
                                    <a class="btn-xs" data-toggle="modal" href="#delete{{$user->id}}" data-toggle="tooltip" title="Delete"><button class="btn-danger btn"> Delete</button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-right">
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    

    <div class="text-right">
    </div>
@endsection

