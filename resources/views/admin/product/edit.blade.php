@extends('admin.layouts.master')
@section('title','Edit Product')
@section('content')
    <form role="form" method="POST" action="{{ route('product.edit', [$product->id]) }}" enctype="multipart/form-data">
        {{csrf_field()}}
        @include('admin.layouts.flash-msg')
        <div class="form-group">
            <label for="category" class="col-md-3">Product Category</label>
            <div class="col-md-9">
                <select name="product_cate" id="" class="form-control">
                    @foreach($cate as $c)
                        <option value="{{ $c->id }}" {{ (old('product_cate') ? old('product_cate') : $product->id_product_cate) == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Name</label>
            <div class="col-md-9">
                <input name="name" class="form-control" value="{{ old('name') ? old('name') : $product->name }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Price</label>
            <div class="col-md-9">
                <input type="text" name="price" class="form-control" value="{{ old('price') ? old('price') : $product->price }}">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Sale</label>
            <div class="col-md-9">
                <input type="text" name="sale" class="form-control" value="{{ old('sale') ? old('sale') : $product->sale }}">
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
                            <input type="file" name="photos[]" id="photos" multiple onclick="hideImg();">
                        </span>
                    </div>
                    <div id="image-old">
                        @php
                            $photos = $product->getImage($product->id);
                        @endphp
                        @if($photos != null)
                        @foreach ($photos as $photo)
                            <img  src="{{ asset('upload/product/' . $photo) }}" alt="" style="width: 150px;height: 100px;" >
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3">Description</label>
            <div class="col-md-9">
                <input name="description" class="form-control" value="{{ old('description') ? old('description') : $product->description }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <button type="submit" name="btnAdd" class="btn btn-outline green">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </div>
            
        </div>
    </form>
@endsection