@extends('admin.layouts.master')
@section('title','Add Product Category')
@section('content')
	<form role="form" method="POST">
        {{csrf_field()}}
        @include('admin.layouts.flash-msg')
        <div class="form-group">
            <label>Name</label>
            <input name="name" class="form-control" value="{{ $cate->name }}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input name="description" class="form-control" value="{{ $cate->description }}">
        </div>
        <button type="submit" name="btnAdd" class="btn btn-success btn-outline green"><i class="fa fa-check"></i>Submit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
@endsection