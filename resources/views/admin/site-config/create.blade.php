@extends('admin.layouts.master')
@section('title','Add New Site Config')
@section('content')
    @include('admin.layouts.flash-msg')
    <hr>
    <form action="{{ route('site_config.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="label">Label:</label>
            <input type="text" class="form-control" id="name" name="label" value="{{ old('label') }}">
        </div>
        <div class="form-group">
            <label for="type">Type:</label>
            <select name="type" id="type" class="form-control">
                <option value="0">String</option>
                <option value="1">Number</option>
                <option value="2">JSON</option>                
            </select>
        </div>
        <div class="form-group">
            <label for="value">Value:</label>
            <input type="text" class="form-control" id="value" name="value" value="{{ old('value') }}">
        </div>
        <button type="submit" class="btn btn-default btn-outline green"><i class="fa fa-check"></i>Add</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
@endsection
