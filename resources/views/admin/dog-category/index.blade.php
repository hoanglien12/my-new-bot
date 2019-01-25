@extends('admin.layouts.master')
@section('title','Dog Categories')
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
        <a href="{{ route('dog_category.add') }}"><button class="btn btn-primary" ><i class="fa fa-plus"></i>Add new item</button></a>
    </div>

    @include('admin.layouts.flash-msg')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="datatable">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($count_category > 0)
                            <!-- {{ $i = 1 }} -->
                            @foreach($dogCategories as $c)
                            <!-- BEGIN MODAL CONFIRM DELETE ITEM -->
                            <div class="modal fade" id="delete{{$c->id}}" tabindex="-1" role="basic" aria-hidden="true" style="display: none;" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title text-center">Confirm delete </h4>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to delete : {{$c->name}} ?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('dog_category.delete',$c->id) }}" method="POST">
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
                            <!-- END MODAL -->
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $c->name }}</td>
                                    <td>{{ $c->description }}</td>
                                    <td>{{ $c->created_at }}</td>
                                    <td>{{ $c->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('dog_category.edit', ['id' => $c->id]) }}"><button class="btn btn-success"><i class="fa fa-edit"></i>Edit</button></a>
                                    </td>
                                    <td>
                                        <a class="btn-xs" data-toggle="modal" href="#delete{{$c->id}}" data-toggle="tooltip" title="Delete"><button class="btn-danger btn"><i class="fa fa-trash-o"></i>Delete</button></a>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="6" style="text-align: center" >No data</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <p>Total items: {{$count_category}}</p>
                </div>
                
            </div>
        </div>
    </div>
@endsection
<script>

</script>
