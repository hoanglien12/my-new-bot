@extends('admin.layouts.master')
@section('title','Dogs')
@section('content')
<hr>
    <h2>Add Dog</h2>
    @include('admin.layouts.flash-msg')
    <form action="{{ route('dog.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
            <label for="category" class="col-md-3">Dog Category</label>

        <div class="form-group col-md-9">
            <select name="category_id" id="category" class="form-control">
                @foreach($dog_category as $category)
                <option value="{{ $category->id }}"  {{ old('category_id') == $category->id ? 'selected' : '' }} >{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name" class="col-md-3">Name:</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="name" name="name" onkeyup="ChangeToSlug();" value="{{ old('name') }}">
            </div>
            
        </div>
        <div class="form-group">
            <label class="col-md-3">Slugs</label>
            <div class="col-md-9">
                <input name="slugs" value="{{ old('slugs') }}" placeholder="Slugs" id="slug" type="text" readonly class="form-control" >
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3">Photos</label>
            <div id="select_image_to_upload" class="col-md-9">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                    <div>
                        <span class="btn green btn-file" id="img">
                            <span class="fileinput-new"> Select file </span>
                            <input type="file" name="photos[]" id="photos" multiple >
                            <br>
                        </span>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="form-group">
            <label for="price" class="col-md-3">Price:</label>
            <div class="col-md-9">
            <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" >
                
            </div>
        </div>
        <div class="form-group">
            <label for="sale" class="col-md-3">Sale:</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="sale" name="sale" value="{{ old('sale') }}">
                
            </div>
        </div>
        <div class="form-group">
            <label for="pwd" class="col-md-3">Infomation:</label>
            <div class="input-group input-large date-picker input-daterange col-md-9">
                <div class="col-md-5">
                    <input type="text" class="form-control" id="height" name="height" placeholder="height:centimet" value="{{ old('height') }}">
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" id="weight" name="weight" placeholder="weight:kilogram" value="{{ old('weight') }}">
                </div>
                <div class="col-md-2">
                    <div class="input-group input-large date-picker input-daterange">
                        <input value="{{old('birthday')}}" name="birthday" placeholder="birthday" data-toggle="datepicker" data-provide="datepicker" type="text" class="form-control" value="{{ old('birthday') }}">
                    </div>
                </div>
            </div>
            
        </div>
        <div class="form-group">
            <label for="pwd" class="col-md-3">Description:</label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <button type="submit" class="btn btn-outline green"><i class="fa fa-check"></i>Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </div>
            
        </div>
        

    </form>
@endsection
