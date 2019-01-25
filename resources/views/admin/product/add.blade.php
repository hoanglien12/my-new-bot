@extends('admin.layouts.master')
@section('title','Add Product')
@section('content')
<hr>
	<form role="form" method="POST" action="{{ route('product.add') }}" enctype="multipart/form-data">
        {{csrf_field()}}
        @include('admin.layouts.flash-msg')
        
        <div class="form-group">
            <label for="category" class="col-md-3">Product Category</label>
            <div class="col-md-9">
                <select name="product_cate" id="category" class="form-control">
                @foreach($cate as $c)
                    <option value="{{ $c->id }}" {{ old('product_cate') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                @endforeach
            </select>
            </div>
            
        </div>
        <div class="form-group">
            <label class="col-md-3">Name</label>
            <div class="col-md-9">
                <input name="name" class="form-control" placeholder="Enter name">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Price</label>
            <div class="col-md-9">
                <input type="text" name="price" class="form-control" placeholder="Enter price">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Sale</label>
            <div class="col-md-9">
                <input type="text" name="sale" class="form-control" placeholder="Enter sale">
            </div>
        </div>
        
        <!-- <div class="form-group">
            <label>Photos</label>
            <i style="color: blue; padding-left: 20px;">Keep Ctrl to select multiphotos!</i>
            <input type="file" name="photos[]" id="photos" class="form-control" multiple>
        </div>
 -->
        <div class="form-group">
            <label class="control-label col-md-3">Photos</label>
            <div id="select_image_to_upload" class="col-md-9">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                    <div>
                        <span class="btn green btn-file" id="img">
                            <span class="fileinput-new"> Select file </span>
                            <input type="file" name="photos[]" id="photos" multiple >
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Description</label>
            <div class="col-md-9">
                <input name="description" class="form-control" placeholder="Enter description">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <button type="submit" class="btn btn-outline green">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </div>
            
        </div>
    </form>
@endsection