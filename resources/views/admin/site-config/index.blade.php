@extends('admin.layouts.master')
@section('title','Site config')
@section('content')

    <div class="portlet-body" style="border: 1px solid #ddd;
    border-radius: 4px; padding:10px; margin-bottom:10px;">

        <div class="table-toolbar">
            <form action="" method="GET" class="form-horizontal form-bordered" id="filter_box">
                <div class="row">
                    <!-- Filter Name -->
                    <div class="col-md-3">
                        <input type="text" name="label" value="{{ old('label') }}" placeholder="Label" class="form-control">
                        <div class="help-block">Label</div>
                    </div>
                    <!-- Filter Name -->
                    <div class="col-md-3">
                            <select name="type" class="form-control">

                                <option value="">Type</option>
                                <option value="0" {{ (isset($type) && $type == 0) ? 'selected' : '' }}>String</option>
                                <option value="1" {{ (isset($type) && $type == 1) ? 'selected' : '' }}>Number</option>
                                <option value="2" {{ (isset($type) && $type == 2) ? 'selected' : '' }}>JSON</option>
                            </select>
                            <div class="help-block">Type</div>
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
    <div class="add-new-item">
        <a href="{{ route('site_config.add') }}"><button class="btn btn-primary" ><i class="fa fa-plus"></i>Add new item</button></a>
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
                                <th>Label</th>
                                <th>Type</th>
                                <th>Value</th>
                                <th>Created at</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($configs as $config)
                            <!-- BEGIN MODAL CONFIRM DELETE ITEM -->
                            <div class="modal fade" id="delete{{$config->id}}" tabindex="-1" role="basic" aria-hidden="true" style="display: none;" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title text-center">Confirm delete </h4>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to delete : {{$config->label}} ?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('site_config.delete',$config->id) }}" method="POST">
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

                            <!-- BEGIN MODAL -->
                            <div class="modal fade" id="value{{ $config->id }}" tabindex="-1" role="basic" aria-hidden="true" data-target="#value{{$config->id}}" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title text-center">Information</h4>
                                        </div>
                                        <div class="modal-body" style="word-wrap: break-word;">
                                            <p>{{$config->value}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- END MODAL -->
                            <tr>
                                <td>{{ $config->id }}</td>
                                <td>{{ $config->label }}</td>

                                <td>
                                    @if($config->type == 0)
                                    {{ "String" }}
                                    @elseif($config->type == 1)
                                    {{ "Number" }}
                                    @else
                                    {{"JSON"}}
                                    @endif
                                </td>
                                <td>
                                    <a class="btn-xs" data-toggle="modal" href="#value{{ $config->id }}" title="Chi tiết"><button class="btn-info btn blue btn-outline" >Detail</button></a>
                                </td>                                
                                <td>{{ $config->created_at }}</td>
                                <td>
                                        <a href="{{ route('site_config.edit', ['id' => $config->id]) }}"><button class="btn btn-success"><i class="fa fa-edit"></i>Edit</button></a>
                                    </td>
                                    <td>
                                        <a class="btn-xs" data-toggle="modal" href="#delete{{$config->id}}" data-toggle="tooltip" title="Delete"><button class="btn-danger btn"><i class="fa fa-trash-o"></i>Delete</button></a>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p>Total items: {{ $count_configs }}</p>
                </div>
                
            </div>
        </div>
    </div>
    

    <div class="text-right">
    </div>
@endsection

