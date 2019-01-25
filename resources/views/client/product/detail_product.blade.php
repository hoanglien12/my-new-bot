@extends('client.layouts.master')
@section('title','Detail Product')
@section('content')	
	@include('admin.layouts.flash-msg')
	<div class="main-wrap-shop content-wrap content-sidebar-right col-md-9 col-sm-8 col-xs-12">

	    <div id="product-724" class="post-724 product type-product status-publish has-post-thumbnail product_cat-bichon-frise product_cat-french-bulldog product_cat-golden-retriever first instock sale featured shipping-taxable purchasable product-type-simple">
	        <div class="product-detail">
	            <div class="row">
	                <div class="col-md-5 col-sm-12 col-xs-12">
	                    <div class="detail-gallery">
	                        <div class="wrap-detail-gallery images zoom-style2">
	                            <div class="mid woocommerce-product-gallery__image">
	                            	@php
		                                $photos = $products->getImage($products->id);
		                            @endphp
		                            @if($photos != null)
		                                <img width="500" height="500" src="{{ asset('upload/product/' . $photos[0]) }}" class="attachment-270x270 size-270x270 wp-post-image" alt="" sizes="(max-width: 270px) 100vw, 270px">
		                            @endif
	                                @if($products->sale!=0)
	                                <div class="product-label"><span class="sale">sale</span></div>
	                                @endif
	                            </div>
	                           
	                        </div>
	                        
	                    </div>
	                </div>
	                <div class="col-md-7 col-sm-12 col-xs-12">
	                    <div class="summary entry-summary detail-info">
	                        <h2 class="product-title title24 dosis-font font-bold text-uppercase">Name : {{$products->name}}</h2>
	                        
	                        <p class="price"></p>
	                        @if($products->sale==0)
	                        <div class="product-price simple"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$products->price}}</span></div>
	                        @else
	                         <div class="product-price simple"><del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$products->price}}</span></del> <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$products->sale}}</span></ins></div>
	                         @endif
	                          
	                        <form class="cart" action="{{route('home.productcart',$products->id)}}" method="get">
	                        	@csrf
	                            <button type="submit" name="add-to-cart" value="724" class="button addcart-link shop-button bg-color product_type_simple add_to_cart_button s7upf_ajax_add_to_cart product_type_simple">Add to cart</button>

	                        </form>
							<div class="yith-wcwl-add-to-wishlist add-to-wishlist-724">
	                            <div class="yith-wcwl-add-button show" style="display:block">
	                                <img src="../../wp-content/plugins/yith-woocommerce-wishlist/assets/images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden">
	                            </div>
	                        <div class="clear"></div>
	                        <div class="product_meta item-product-meta-info">	
	                            <span class="sku_wrapper">
	                                <label>Product Code:</label>
	                                <span class="sku">DSP{{$products->id}}</span>
	                            </span>

	                            <span class="posted_in"><label>Categories:</label>
	                             @foreach($productCategories as $dogcat)
	                                <div class="meta-item-list"><a href="{{route('home.product',$dogcat->id) }}" rel="tag">{{$dogcat->name}}</a> </div>
	                               @endforeach
	                            </span>


	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	      
			<div class="clear"></div>
		    <div class="single-related-post">
		        <h2 class="title18 font-bold text-uppercase title-single-related-post">
		            COMMENTS
		        </h2>
		        <div class="related-post-slider">
		            
		                <div class="owl-wrapper-outer">
		                    <div class="owl-wrapper" style="width: 3600px; left: 0px; display: block;">
		                        <div class="owl-item active" style="width: 300px;">
		                            <div class="item-post item-post-default">
		                                <div class="post-thumb banner-advs zoom-image fly-hoz">
		                                    <a href="#">
			                                    <img width="270" height="180" src="" class="attachment-870x400 size-870x400 wp-post-image" alt=""> </a>
		                                </div>
		                                <div class="post-info">
		                                	@foreach($comment_product as $cmt)
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
		    <div id="comments" class="comments-area comments blog-comment-detail">
		    </div><!-- #comments -->

		    @if(Auth::check())
		    	<div class="leave-comments contact-form reply-comment" style="margin-bottom: 50px;">
			        <div id="respond" class="comment-respond">
			            <h3 id="reply-title" class="comment-reply-title">Leave Comments</h3>
			            <form action="{{ url('product/comment/'. $products->id) }}" method="POST" id="commentform" class="comment-form" novalidate="">
			            	@csrf
			               	<input type="hidden" name="id_product" id="" value="{{ $products->id }}">
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
	                           @foreach($product_other  as $product)
	                            <div class="owl-item active" style="width: 300px;">
	                                <div class="post-716 product type-product status-publish has-post-thumbnail product_cat-belgian-malinois product_cat-bichon-frise product_cat-bloodhound last instock featured shipping-taxable purchasable product-type-simple">
	                                    <div class="item-product item-product-grid">
	                                        <div class="product-thumb">
	                                            <!-- s7upf_woocommerce_thumbnail_loop have $size and $animation -->
	                                            <a href="../cannoly/index.html" class="product-thumb-link zoom-thumb">
	                                                @php
						                                $photos = $product->getImage($product->id);
						                            @endphp
						                            @if($photos != null)
						                                <img width="270" height="270" src="{{ asset('upload/product/' . $photos[0]) }}" class="attachment-270x270 size-270x270 wp-post-image" alt="" sizes="(max-width: 270px) 100vw, 270px">
						                            @endif

	                                            </a>
	                                        </div>
	                                        <div class="product-info">
	                                            <span class="title12 text-uppercase color font-bold">ID:DSP{{$product->id}}</span>
	                                            <h3 class="title18 text-uppercase product-title dosis-font font-bold">
	                                                <a title="Cannoly" href="../cannoly/index.html" class="black">name :{{$product->name}}</a>
	                                            </h3>
	                                            @if($product->sale==0)
	                                            <div class="product-price simple"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$product->price}}</span></div>
	                                            @else
	                                            <div class="product-price simple"><del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$product->price}}</span></del> <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$product->sale}}</span></ins></div>
	                                            @endif

	                                            <ul class="wrap-rating list-inline-block">
	                                                <li>
	                                                    <div class="product-rate">
	                                                        <div class="product-rating" style="width:0%"></div>
	                                                    </div>
	                                                </li>
	                                            </ul>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                            @endforeach
	                        </div>
	                        
	                    </div>
			         
	            </div>
	        </div>

	    </div><!-- #product-724 -->
	</div>
</div>
	@include('client.layouts.sidebar')


	<div class="zoomContainer" style="-webkit-transform: translateZ(0);position:absolute;left:89.5px;top:955px;height:345px;width:345px;"><div class="zoomLens" style="background-position: 0px 0px; float: right; overflow: hidden; z-index: 999; transform: translateZ(0px); opacity: 0.4; zoom: 1; width: 276px; height: 276px; background-color: white; cursor: default; border: 1px solid rgb(0, 0, 0); background-repeat: no-repeat; position: absolute; left: 0px; top: 69px; display: none;">&nbsp;</div><div class="zoomWindowContainer" style="width: 400px;"><div style="overflow: hidden; background-position: 0px -108px; text-align: center; background-color: rgb(255, 255, 255); width: 400px; height: 400px; float: left; background-size: 500px 500px; z-index: 100; border: 4px solid rgb(136, 136, 136); background-repeat: no-repeat; position: absolute; background-image: url(&quot;../../wp-content/uploads/2018/01/pet_store_dog_12.jpg&quot;); top: 0px; left: 345px; display: none;" class="zoomWindow">&nbsp;</div></div></div>
	
@endsection