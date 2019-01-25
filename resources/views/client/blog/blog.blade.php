@extends('client.layouts.master')
@section('title','Blog')
@section('content')
    <div class="content-wrap content-sidebar-right col-md-9 col-sm-8 col-xs-12">
    <div class="title-page clearfix">
        <h2 class="title30 font-bold dosis-font text-uppercase pull-left">Blogs</h2>
        
    </div>
    <div class="js-content-wrap blog-list-view " data-column="3">
        <div class="js-content-main list-post-wrap row">
            @foreach($blogs as $blog)
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="item-post item-post-large item-default">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="post-thumb banner-advs zoom-image overlay-image">
                                <a href="{{ route('home.detail_blog',$blog->id) }}" class="adv-thumb-link">
                                    @php
                                        $photo = $blog->getImage($blog->id);
                                    @endphp
                                    @if($photo != null)
                                    <img width="870" height="400" src="{{ asset('upload/post/' . $photo[0]) }}" class="attachment-870x400 size-870x400 wp-post-image" alt=""> </a>
                                    @endif
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="post-info">
                                <h3 class="title24 post-title dosis-font font-bold">
                                    <a href="" class="black">
                                        {{$blog->title}}
                                    </a>
                                </h3>
                                <p class="desc">
                                    {{\Illuminate\Support\Str::words($blog->summary,25)}}
                                </p>
                                <ul class="list-inline-block post-meta-data">
                                    <li><i class="fa fa-calendar color"></i><span class="gray">{{ date('Y-m-d',strtotime($blog->created_at))}}</span></li>
                                    <li><i aria-hidden="true" class="fa fa-comment color"></i>
                                        <a href="">
                                            {{$blog->count_cmt($blog->id)}} Comments 
                                        </a>
                                    </li>
                                    
                                </ul>
                                <a href="{{ route('home.detail_blog',$blog->id) }}" class="shop-button">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-right">
            {{ $blogs->links() }}
        </div>


    </div>
</div>
    @include('client.layouts.sidebar')

@endsection