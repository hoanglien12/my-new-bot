@extends('admin.layouts.master')
@section('title','Edit Posts ')
@section('content')
<hr>
    <h2>Edit <span style="color: red;">{{ $post->title }}</span></h2>
    @include('admin.layouts.flash-msg')
    <form action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="col-md-3 control-label">Post's title</label>
            <div class="col-md-8">
                <input name="title" id="title" placeholder="Title" type="text" class="form-control" value="{{ $post->title }}" onkeyup="ChangeToSlug();">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Slugs</label>
            <div class="col-md-8">
                <input name="slugs" value="{{ $post->slugs }}" placeholder="Slugs" id="slug" type="text" readonly class="form-control" >
                
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
                </div>
                    <div id="image-old">
                        @php
                            $photos = $post->getImage($post->id);
                        @endphp
                        @if($photos != null)
                        @foreach ($photos as $photo)
                            <img src="{{ asset('upload/post/' . $photo) }}" alt="" style="width: 150px;height: 100px;">
                        @endforeach
                        @endif
                    </div>
                            
            </div>
            <div id="paste_url_image" class="col-md-8 col-md-offset-3" style="display: none;">
                <input name="url_image" placeholder="Nhập link ảnh" type="text" class="form-control">
                <p class="help-block">Link ảnh</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Summary</label>
            <div class="col-md-8">
                <textarea class="form-control" placeholder="Summary" name="summary" rows="3">{{ $post->summary }}</textarea>
                
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Content</label>
            <div class="col-md-8">
                <textarea class="ckeditor form-control" id="content" name="content" rows="6">{{ $post->content }}</textarea>
                <script>
                    CKEDITOR.replace( 'content' );
                </script>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Source</label>
            <div class="col-md-8">
                <input type="text" name="source" class="form-control" placeholder="Source" value="{{ $post->source }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">HOT, Active</label>
            <div class="col-md-2">
                <select name="type" class="bs-select form-control" data-style="blue">
                    <option value="1" {{ $post->hot==1 ? "selected" : "" }}>HOT</option>
                    <option value="2" {{ $post->hot==2 ? "selected" : "" }}>Thường</option>
                </select>
            </div>

            <div class="col-md-2">
                <select name="status" class="bs-select form-control" data-style="green-meadow">
                    <option value="1" {{ $post->active==1 ? "selected" : "" }}>Kích hoạt</option>
                    <option value="2" {{ $post->active==2 ? "selected" : "" }}>Không kích hoạt</option>
                </select>
            </div>
            
        </div>
        <!-- Form action buttons -->
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
