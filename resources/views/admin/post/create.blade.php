@extends('admin.layouts.master')
@section('title','Add Posts')
@section('content')
<hr>
    @include('admin.layouts.flash-msg')
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        
        <div class="form-group">
            <label class="col-md-3">Post's title</label>
            <div class="col-md-8">
                <input name="title" id="name" placeholder="Post's title" type="text" class="form-control" value="{{ old('title') }}" onkeyup="ChangeToSlug();">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Slugs</label>
            <div class="col-md-8">
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
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Summary</label>
            <div class="col-md-8">
                <textarea class="form-control" placeholder="Post's summary" name="summary" rows="3">{{ old('summary') }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Content</label>
            <div class="col-md-8">
                <textarea class="ckeditor form-control" id="content" name="content" rows="6">{{ old('content') }}</textarea>
                <script>
                    CKEDITOR.replace( 'content' );
                </script>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Source</label>
            <div class="col-md-8">
                <input type="text" name="source" class="form-control" placeholder="Source" value="{{ old('source') }}">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-3 control-label">HOT, Active</label>
            <div class="col-md-2">
                <select name="type"  class="bs-select form-control" data-style="blue">
                    <!-- <option value="">HOT</option> -->
                    <option value="1">HOT</option>
                    <option value="2">Normal</option>
                </select>
            </div>

            <div class="col-md-2">
                <select name="status" class="bs-select form-control" data-style="green-meadow">
                    <!-- <option value="">Active</option> -->
                    <option value="1">ON</option>
                    <option value="2">Off</option>
                </select>
            </div>
            
        </div>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn green btn-outline">
                        <i class="fa fa-check"></i> Submit
                    </button>
                    <button type="reset" name="reset" class="btn default">Cancel</button>
                </div>
            </div>
        </div>

    </form>
@endsection
