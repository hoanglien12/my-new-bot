
	<!-- row-2 -->
	<div class="vc_row wpb_row block-about-store">
	    <div class="wpb_column column_container col-sm-6">
	        <div class="vc_column-inner ">
	            <div class="wpb_wrapper">
	                <div class="banner-advs   zoom-image line-scale">
	                    <a href="#" class="adv-thumb-link">
	                    	@php
	                    		$photos = $about_us->getImage($about_us->id);
	                    	@endphp 
	                    	@if($photos != null)
	                    	<img width="570" height="570" src="{{ asset('upload/post/' . $photos[0]) }}" class="attachment- size-" alt="" sizes="(max-width: 570px) 100vw, 570px">
	                    	@endif
	                    </a>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="wpb_column column_container col-sm-6">
	        <div class="vc_column-inner ">
	            <div class="wpb_wrapper">
	                <div class="custom-information  ">
	                    <div class="intro-about-store">
	                        <h2 class="title30 dosis-font font-bold text-uppercase color">{{ $about_us->title }}</h2>
	                        <p class="desc white">{{ $about_us->summary }}</p>
	                    </div>
	                </div>
	                <div class="s7upf-slider about-store-slider ">
	                    <div class="wrap-item sv-slider  pagi-nav-style owl-carousel owl-theme" data-item="0" style="opacity: 1; display: block;">
                            <div class="owl-item" style="width: 460px;">
                                <div class="item-about-store  ">
                                    <h3 class="title14 font-bold dosis-font text-uppercase"><a href="#" class="black">{{ $about_us->title }}</a></h3>
                                    <p class="desc">{!! $about_us->content !!}</p>
                                    <!-- <a href="#" class="shop-button bg-color arrow-right">Read More</a> -->
                                </div>
                            </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>