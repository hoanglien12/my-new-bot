@extends('admin.layouts.master')
@section('title','Edit Dog Categories')
@section('content')

    <h2>Edit <span style="color: red;">{{ $dogCategory->name }}</span></h2>
    @include('admin.layouts.flash-msg')
    
    <form action="{{ route('dog_category.update',$dogCategory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter email" name="name" value="{{ $dogCategory->name }}">
        </div>
        <div class="form-group">
            <label for="pwd">Description:</label>
            <input type="text" class="form-control" id="description" placeholder="Enter password" name="description" value="{{ $dogCategory->description }}">
        </div>
        <button type="submit" class="btn btn-default btn-outline green"><i class="fa fa-check"></i>Submit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
@endsection
