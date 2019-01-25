@extends('admin.layouts.master')
@section('title','Product')
@section('content')
    <div class="portlet-body" style="border: 1px solid #ddd;
    border-radius: 4px; padding:10px; margin-bottom:10px;">
        <div class="table-toolbar">
            <form action="{{ route('product.show') }}" method="GET" class="form-horizontal form-bordered" id="filter_box">
                <div class="row">
                    <!-- Filter Name -->
                    <div class="col-md-3">
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" class="form-control">
                        <div class="help-block">Product's Name</div>
                    </div>
                    <!-- Filter Category Name -->
                    <div class="col-md-3">
                        <select name="category_id" class="form-control">
                            <option value="">Product Category</option>
                            @foreach($product_cate as $cate)
                            <option value="{{ $cate->id }}"
                                {{ (isset($category_id) && ($cate->id == $category_id)) ? "selected" : '' }}>{{ $cate->name }}</option>
                            @endforeach
                        </select>
                        <div class="help-block">Product Category's Name</div>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="price" value="{{ old('price') }}" placeholder="Price" class="form-control">
                        <div class="help-block">Price</div>
                    </div>
                    <!-- Filter Date -->
                    <div class="col-md-4">
                        <div class="input-group input-large date-picker input-daterange">
                            <input value="{{old('begin_date')}}" readonly name="begin_date" placeholder="Begin" data-toggle="datepicker" data-provide="datepicker" type="text" class="form-control">
                            <span class="input-group-addon"> to </span>
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
        <a href="{{ route('product.add') }}"><button class="btn btn-primary" ><i class="fa fa-plus"></i>Add new item</button></a>
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
                                <th>Price</th>
                                <th>Sale</th>
                                <th>Description</th>
                                <th>Photos</th>
                                <th>Product Category</th>
                                <th>Created at</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($product as $pro)
	                            <tr>
	                                <td>{{ $pro->id }}</td>
	                                <td>{{ $pro->name }}</td>
                                    <td>{{ $pro->price }}</td>
                                    <td>{{ $pro->sale }}</td>
	                                <td>{{ $pro->description }}</td>
                                    <td>
                                        @php
                                            $photos = $pro->getImage($pro->id);
                                        @endphp
                                        @if($photos)
                                            @foreach ($photos as $photo)
                                                <img src="{{ asset('upload/product/' . $photo) }}" alt="" style="max-width: 150px;max-height: 100px;">
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>{{ $pro->productcategory->name }}</td>
                                    <td>{{ $pro->created_at }}</td>
	                                <td>
	                                	<a href="{{ route('product.edit', ['id' => $pro->id]) }}"><button class="btn btn-success"><i class="fa fa-edit"></i>Edit</button></a>
                                    </td>
                                    <td>
	                                	<a href="{{ route('product.delete', ['id' => $pro->id]) }}" onclick="return confirm('Are you sure delete {{ $pro->name }}?')"><button class="btn btn-danger"><i class="fa fa-trash-o"></i>Delete</button></a>
	                                </td>
	                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p>Total items: {{ $count_products }}</p>
                </div>
                
            </div>
        </div>
    </div>
@endsection