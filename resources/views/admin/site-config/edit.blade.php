@extends('admin.layouts.master')
@section('title','Edit Site config')
@section('content')
    <hr>
    <h2>Edit <span style="color: red;">{{ $site_config->label }}</span></h2>
    @include('admin.layouts.flash-msg')
    <form action="{{ route('site_config.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="label">Label:</label>
            <input type="text" class="form-control" id="name" name="label" value="{{ $site_config->label }}">
        </div>
        <div class="form-group">
            <label for="type">Type:</label>
            <select name="type" id="" class="form-control">
                <option value="0" {{ $site_config->type==0 ? "selected" : "" }}>Chuỗi</option>
                <option value="1" {{ $site_config->type==1 ? "selected" : "" }}>Số</option>
                <option value="2" {{ $site_config->type==2 ? "selected" : "" }}>JSON</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="value">Value:</label>
            <input type="text" class="form-control" id="value" name="value" value="{{ $site_config->value }}">
        </div>
        <button type="submit" class="btn btn-default btn-outline green"><i class="fa fa-check"></i>Submit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
@endsection
