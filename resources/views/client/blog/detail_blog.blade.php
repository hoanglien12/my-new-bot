@extends('client.layouts.master')
@section('title','Detail Blog')
@section('content')
	<div>
		<h1>Blogs</h1>
	</div>
	<div class="content-wrap content-sidebar-right col-md-9 col-sm-8 col-xs-12">
	    <div class="content-single-blog ">
	        <div class="single-post-thumb banner-advs">
	            @php
                    $photo = $blog->getImage($blog->id);
                @endphp
                @if($photo != null)
                <img width="870" height="400" src="{{ asset('upload/post/' . $photo[0]) }}" class="attachment-870x400 size-870x400 wp-post-image" alt=""> </a>
                @endif
	        </div>
	        <ul class="list-inline-block post-meta-data">
	            <li><i class="fa fa-calendar color"></i><span class="gray">{{ date('Y-m-d',strtotime($blog->created_at))}}</span></li>
	            <li><i aria-hidden="true" class="fa fa-comment color"></i>
	                <a href="index.html#respond">{{ count($comment_post)}}
	                    Comments </a>
	            </li>
	        </ul>
	        <div class="content-post-default">
	            <h2 class="title24 font-bold">
	            	{{$blog->title}}
	            </h2>
	            <div class="detail-content-wrap clearfix">
	                <div class="vc_row wpb_row">
	                    <div class="wpb_column column_container col-sm-12">
	                        <div class="vc_column-inner ">
	                            <div class="wpb_wrapper">
	                                <div class="wpb_text_column wpb_content_element ">
	                                    <div class="wpb_wrapper">
	                                        <p class="desc">
	                                        	{{$blog->summary}}
	                                        </p>
	                                        <p class="desc">
	                                        	{!!$blog->content!!}
	                                        </p>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div><div class="clear"></div>
		    <div class="single-related-post">
		        <h2 class="title18 font-bold text-uppercase title-single-related-post">
		            COMMENTS
		        </h2>
		        <div class="related-post-slider">
		            <div class="wrap-item smart-slider owl-carousel owl-theme" data-item="" data-speed="" data-itemres="0:1,480:2,990:3" data-prev="" data-next="" data-pagination="" data-navigation="" style="opacity: 1; display: block;">
		                <div class="owl-wrapper-outer">
		                    <div class="owl-wrapper" style="width: 3600px; left: 0px; display: block;">
		                        <div class="owl-item active" style="width: 300px;">
		                            <div class="item-post item-post-default">
		                                <div class="post-thumb banner-advs zoom-image fly-hoz">
		                                    <a href="#">
			                                    <img width="270" height="180" src="" class="attachment-870x400 size-870x400 wp-post-image" alt=""> </a>
		                                </div>
		                                <div class="post-info">
		                                	@foreach($comment_post as $cmt)
		                                    <h3 class="title14 dosis-font text-uppercase font-bold post-title"><a href="../flowing-studio-dress/index.html" class="black">{{ $cmt->user->name }}</a></h3>
		                                    <ul class="list-inline-block post-meta-data">
		                                        <li><i aria-hidden="true" class="fa fa-comment color"></i>
		                                            <h6 style="display: inline; font-size: 17px;">{{ $cmt->comment }}</h6>
		                                        </li>
		                                    </ul>
		                                    @endforeach
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		    <div id="comments" class="comments-area comments blog-comment-detail">
		    </div><!-- #comments -->

		    @if(Auth::check())
		    	<div class="leave-comments contact-form reply-comment" style="margin-bottom: 50px;">
			        <div id="respond" class="comment-respond">
			            <h3 id="reply-title" class="comment-reply-title">Leave Comments</h3>
			            <form action="{{ url('blog/comment/'. $blog->id) }}" method="POST" id="commentform" class="comment-form" novalidate="">
			            	@csrf
			               	<input type="hidden" name="id_post" id="" value="{{ $blog->id }}">
			                <textarea name="comment" id="" cols="30" rows="8"></textarea>
			                <br>
			                <button type="submit" class="btn btn-primary">Post a comment</button>
			            </form>
			        </div><!-- #respond -->
			    </div>
		    @endif

		    <div class="related-product">
	            <h2 class="title18 font-bold text-uppercase single-title">Related products</h2>
	            <div class="product-slider">
	                <div class="wrap-item group-navi smart-slider owl-carousel owl-theme" data-item="" data-speed="" data-itemres="0:1,480:2,990:3" data-prev="" data-next="" data-pagination="" data-navigation="true" style="opacity: 1; display: block;">
	                    <div class="owl-wrapper-outer">
	                        <div class="owl-wrapper" style="width: 3600px; left: 0px; display: block;">
	                           @foreach($blogs_other  as $blog)
	                            <div class="owl-item active" style="width: 300px;">
	                                <div class="post-716 product type-product status-publish has-post-thumbnail product_cat-belgian-malinois product_cat-bichon-frise product_cat-bloodhound last instock featured shipping-taxable purchasable product-type-simple">
	                                    <div class="item-product item-product-grid">
	                                        <div class="product-thumb">
	                                            <!-- s7upf_woocommerce_thumbnail_loop have $size and $animation -->
	                                            <a href="{{ route('home.detail_dog',$blog->id) }}" class="product-thumb-link zoom-thumb">
	                                            	@php
	                                            		$photo = $blog->getImage($blog->id)
	                                            	@endphp
	                                                <img width="270" height="270" src="{{asset('upload/post/'.$photo[0])}}" >

	                                            </a>
	                                            
	                                        </div>
	                                        <div class="product-info">
	                                            
	                                            <h3 class="title18 text-uppercase product-title dosis-font font-bold">
	                                                <a title="{{$blog->title}}" href="../cannoly/index.html" class="black">{{$blog->title}}</a>
	                                            </h3>

	                                             <p class="desc">
				                                    {{\Illuminate\Support\Str::words($blog->summary,25)}}
				                                </p>
				                                <ul class="list-inline-block post-meta-data">
                                    <li><i class="fa fa-calendar color"></i><span class="gray">{{ date('Y-m-d',strtotime($blog->created_at))}}</span></li>
                                    <li><i aria-hidden="true" class="fa fa-comment color"></i>
                                        <a href="../flowing-studio-dress-2/index.html#respond">{{ count($comment_post)}}
                                            Comments </a>
                                    </li>
                                </ul>
                                <a href="{{ route('home.detail_blog',$blog->id) }}" class="shop-button">Read more</a>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                            @endforeach
	                        </div>
	                        
	                    </div>
			         
	                </div>
	            </div>
	        </div>
	</div>
	@include('client.layouts.sidebar')
@endsection