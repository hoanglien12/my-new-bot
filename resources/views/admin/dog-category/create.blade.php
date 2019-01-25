@extends('admin.layouts.master')
@section('title','Add Dog Categories')
@section('content')
    <form action="{{ route('dog_category.store') }}" method="POST">
        @csrf
        @include('admin.layouts.flash-msg')

        <div class="form-group">
            <label for="email">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="pwd">Description:</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
        </div>
        <button type="submit" name="btnAdd" class="btn btn-outline green"><i class="fa fa-check"></i>Submit</button>
        <button type="reset" class="btn btn-primary">Reset</button>

    </form>
@endsection
