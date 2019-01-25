
	<!-- row-5 -->
    <div class="vc_row wpb_row">
	    <div class="wpb_column column_container col-sm-12">
	        <div class="vc_column-inner ">
	            <div class="wpb_wrapper">
	                <div class="block-element latest-news2 blog-slider-view  default js-content-wrap">
	                    <h2 class="title30 text-uppercase">LATEST NEWS</h2>
	                    <div class="list-post-wrap row">
	                        <div class="wrap-item smart-slider group-navi  owl-carousel owl-theme" data-item="3" data-speed="" data-itemres="0:1,560:2,990:3" data-prev="" data-next="" data-pagination="" data-navigation="group-navi" style="opacity: 1; display: block;">
	                            <div class="owl-wrapper-outer">
	                                <div class="owl-wrapper" style="width: 6400px; left: 0px; display: block;">
	                                	@foreach($blogs as $blog)
	                                    <div class="owl-item active" style="width: 400px;">
	                                        <div class="item">
	                                            <div class="item-post item-post-default style2">
	                                                <div class="post-thumb banner-advs zoom-image overlay-image">
	                                                    <a href="{{ route('home.detail_blog',$blog->id) }}">
	                                                    	@php
	                                                    	$photo = $blog->getImage($blog->id)
	                                                    	@endphp
	                                                    	@if($photo != null)
	                                                        <img src="{{ asset('upload/post/' . $photo[0]) }}">
	                                                        @endif
	                                                    </a>
	                                                </div>
	                                                <div class="post-info">
	                                                    <h3 class="title14 dosis-font text-uppercase font-bold post-title"><a href="{{ route('home.detail_blog',$blog->id) }}" class="black">
	                                                    	{{$blog->title}}
	                                                    </a></h3>
	                                                    <ul class="list-inline-block post-meta-data">
	                                                         <li><i class="fa fa-calendar color"></i><span class="gray">{{ date('Y-m-d',strtotime($blog->created_at))}}</span></li>
	                                                        <li><i aria-hidden="true" class="fa fa-comment color"></i>
	                                                            <a href="../flowing-studio-dress-2/index.html#respond">{{$blog->count_cmt($blog->id)}} Comments                        
	                                                            </a>
	                                                        </li>
	                                                    </ul>
	                                                    <p class="desc" style="text-overflow: ellipsis;">
	                                                    	{{ \Illuminate\Support\Str::words($blog->summary,25)}}
	                                                    </p> <a href="{{ route('home.detail_blog',$blog->id) }}" class="readmore text-uppercase font-bold color wobble-horizontal">Read more<i class="fa fa-angle-right"></i></a>
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
	        </div>
	    </div>
	</div>
