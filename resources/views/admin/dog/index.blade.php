@extends('admin.layouts.master')
@section('title','Dogs')
 
@section('content')

    <div class="portlet-body" style="border: 1px solid #ddd;
    border-radius: 4px; padding:10px; margin-bottom:10px;">
        <div class="table-toolbar">
            <form action="{{ route('dog.index') }}" method="GET" class="form-horizontal form-bordered" id="filter_box">
                <div class="row">
                    <!-- Filter Name -->
                    <div class="col-md-3">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Tên" class="form-control">
                        <div class="help-block">Dog's Name</div>
                    </div>
                    <!-- Filter Category Name -->
                    <div class="col-md-3">
                        <select name="category_id" class="form-control">
                            <option value="">Dog Category</option>
                            @foreach($dog_category as $cat)
                            <option value="{{ $cat->id }}" {{ (isset($category_id) && ($cat->id == $category_id)) ? "selected" : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        <div class="help-block">Dog Category's Name</div>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="price" value="{{ old('price') }}" placeholder="Price" class="form-control">
                        <div class="help-block">Price</div>
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
        <a href="{{ route('dog.add') }}"><button class="btn btn-primary"><i class="fa fa-plus"></i>Add new item</button></a>
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
                                <th>Dog Category</th>
                                <th>Information</th>
                                <th>Price</th>
                                <th>Sale</th>
                                <th>Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            @if($count_dogs > 0)
                            <input type="text" hidden value="{{$i=1}}">

                            @foreach($dogs as $dog)
                            <!-- BEGIN MODAL CONFIRM DELETE ITEM -->
                            <div class="modal fade" id="delete{{$dog->id}}" tabindex="-1" role="basic" aria-hidden="true" style="display: none;" data-target="#delete{{$dog->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title text-center">Confirm delete </h4>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure to delete : {{$dog->name}} ?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('dog.delete',$dog->id) }}" method="POST">
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

                            <!-- BEGIN MODAL -->
                            <div class="modal fade" id="info{{ $dog->id }}" tabindex="-1" role="basic" aria-hidden="true" data-target="#info{{$dog->id}}" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title text-center">Information</h4>
                                        </div>
                                        <div class="modal-body" style="word-wrap: break-word;">
                                            <p>Height   : {{ $dog->height }}</p>
                                            <p>Weight   : {{ $dog->weight }}</p>
                                            <p>Birthday : {{ isset($dog->birthday) ? date('Y-m-d',strtotime($dog->birthday)) : null }}</p>
                                            <p>List photos: </p>
                                            @php
                                                $photos = $dog->getImage($dog->id);
                                            @endphp
                                            @if($photos != null)
                                            @foreach ($photos as $photo)
                                                <img src="{{ asset('upload/dogs/' . $photo) }}" alt="" style="width: 150px;height: 100px;">
                                            @endforeach
                                            @else
                                                <p>no photo</p>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- END MODAL -->
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $dog->name }}</td>
                                <td>{{ $dog->dogcategory->name }}</td>
                                <td>
                                    <a class="btn-xs" data-toggle="modal" href="#info{{ $dog->id }}" title="Delete"><button class="btn-info btn blue btn-outline" >Chi tiết</button></a>
                                </td>
                                <td>{{ $dog->price }}</td>
                                <td>{{ $dog->sale }}</td>
                                <td>{{ date('Y-m-d',strtotime($dog->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('dog.edit',$dog->id)}}"><button class="btn btn-success"><i class="fa fa-edit"></i>Edit</button></a>
                                </td>
                                <td>
                                    <a class="btn-xs" data-toggle="modal" href="#delete{{$dog->id}}" data-toggle="tooltip" title="Delete">
                                        <button class="btn btn-danger" ><i class="fa fa-trash-o"></i>Delete</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                            @else
                            <tr >
                                <td colspan="7" class="text-center">No data</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <p>Total items: {{$count_dogs}}</p>

                    <div class="text-right">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

