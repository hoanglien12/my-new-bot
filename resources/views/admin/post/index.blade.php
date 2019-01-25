@extends('admin.layouts.master')
@section('title','Posts')
@section('content')
	<div class="portlet-body" style="border: 1px solid #ddd;
    border-radius: 4px; padding:10px; margin-bottom:10px;">
        <div class="table-toolbar">
            <form action="{{ route('post.index') }}" method="GET" class="form-horizontal form-bordered" id="filter_box">
                <div class="row">
                    <!-- Filter Name -->
                    <div class="col-md-3">
                        <input type="text" name="title" value="{{ old('title') }}" placeholder="Title" class="form-control">
                        <div class="help-block">Post's Title</div>
                    </div>
                    <!-- Filter Status -->
                    <div class="col-md-3">
                        <select name="type" class="bs-select form-control" data-style="blue">
                            <option value="">Type</option>
                            
                            <option value="1" {{ (isset($type) && $type == 1) ? 'selected' : '' }}>HOT</option>
                            <option value="2" {{ (isset($type) && $type == 2) ? 'selected' : '' }}>Normal</option>
                        </select>
                        <div class="help-block">Type</div>
                    </div>
                    <!-- Filter  -->
                    <div class="col-md-3">
                        <select name="status" class="bs-select form-control" data-style="green-meadow">
                            <option value="">Status</option>
                            <option value="1" {{ (isset($status) && $type == 1) ? 'selected' : '' }}>ON</option>
                            <option value="2" {{ (isset($status) && $type == 2) ? 'selected' : '' }}>Off</option>
                        </select>
                        <p class="help-block">Status</p>
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
        <a href="{{ route('post.add') }}"><button class="btn btn-primary"><i class="fa fa-plus"></i>Add new item</button></a>
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
                            <th>Title</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Image</th>
                            <th>Date</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if($count_post > 0)
                            <input type="text" hidden value="{{$i=1}}">
                            @foreach($posts as $post)
                            <!-- BEGIN MODAL CONFIRM DELETE ITEM -->
                            <div class="modal fade" id="delete{{$post->id}}" tabindex="-1" role="basic" aria-hidden="true" style="display: none;" >
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title text-center">Confirm delete </h4>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to delete : {{$post->title}} ?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('post.delete',$post->id) }}" method="POST">
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
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <p class="text-active">
                                            {{ $post->active == 1 ? "ON" : "Off" }}
                                        </p>
                                        <span data="{{ $post->id }}" data-type="{{ $post->active }}" class="btn btn-circle bold change_status"><i class="fa fa-exchange"></i></span>
                                    </td>
                                    <td>
                                        @if($post->hot == 1)
                                            {{  "HOT" }}
                                        
                                        @else
                                            {{  "Normal" }}
                                        @endif

                                    </td>
                                    <td>
                                        @php
                                            $photos = $post->getImage($post->id);
                                        @endphp
                                        @if($photos != null)
                                            @foreach ($photos as $photo)
                                                <img src="{{ asset('upload/post/' . $photo) }}" alt="" style="width: 150px;height: 100px;">
                                            @endforeach
                                            @else
                                                <p>no photo</p>
                                            @endif
                                    </td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>
                                        <a href="{{ route('post.edit', ['id' => $post->id]) }}"><button class="btn btn-success"><i class="fa fa-edit"></i>Edit</button></a>
                                    </td>
                                    <td>
                                        <a class="btn-xs" data-toggle="modal" href="#delete{{$post->id}}" data-toggle="tooltip" title="Delete"><button class="btn-danger btn"><i class="fa fa-trash-o"></i>Delete</button></a>
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
                    <p>Total items: {{ $count_post }}</p>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        $(".change_status").click(function(){
            var get_id = $(this).attr('data');
            var get_type = $(this).attr('data-type');
            var get_value = $(this).attr('value');
            if(get_type == '1')
            {
                $(this).attr('data-type',2);
                $(this).prev().text('Off');
                // $(this).prev().css('color','black');
            }
            else
            {
                $(this).attr('data-type',1);
                $(this).prev().text('ON');
                // $(this).prev().css('color','red');

            }
            $.ajax({
                type: 'post',
                data: {get_id:get_id,get_type:get_type,"_token": "{{ csrf_token() }}"},
                url: '{{ route('post.change_status') }}',
                dataType: 'json',
                success:function(result){
                    
                }
            }); 
        });    
    });
</script>
@endsection
