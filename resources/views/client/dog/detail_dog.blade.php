@extends('client.layouts.master')
@section('title','Detail Dog')
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
		                                $photos = $dogs->getImage($dogs->id);
		                            @endphp
		                            @foreach ($photos as $photo)
		                            	@if($photo != null)
		                                <img width="500" height="500" src="{{ asset('upload/dogs/' . $photo) }}" >
		                                @endif
		                            @endforeach
	                                
	                                @if($dogs->sale!=0)
	                                <div class="product-label"><span class="sale">Sale</span></div>
	                                @endif
	                            </div>
	                           
	                        </div>
	                        
	                    </div>
	                </div>
	                <div class="col-md-7 col-sm-12 col-xs-12">
	                    <div class="summary entry-summary detail-info">
	                        <h2 class="product-title title24 dosis-font font-bold text-uppercase">Name : {{$dogs->name}}</h2>
	                        
	                        <p class="price"></p>
	                        @if($dogs->sale==0)
	                        <div class="product-price simple"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$dogs->price}}</span></div>
	                        @else
	                         <div class="product-price simple"><del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$dogs->price}}</span></del> <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$dogs->sale}}</span></ins></div>
	                         @endif
	                          <div><p>Birthday: {{$dogs->birthday}}</p></div>
	                         <div><p>Height:    {{$dogs->height}} cm</p></div>
	                         <div><p>Weight:    {{$dogs->weight}} cm</p></div>
	                        <p></p>

	                        <form class="cart" action="{{route('home.cart',$dogs->id)}}" method="get">
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
	                                <span class="sku">DSP{{$dogs->id}}</span>
	                            </span>

	                            <span class="sku_wrapper">
	                                <label>Availability:</label>
	                                <span class="sku in-stock">In stock</span>
	                            </span>
	                            <span class="posted_in"><label>Categories:</label>
	                            	 @foreach($dogCategories as $dogcat)
	                                <div class="meta-item-list"><a href="{{route('home.dog',$dogcat->id) }}" rel="tag">{{$dogcat->name}}</a> </div>
	                               @endforeach
	                            </span>


	                        </div>
	                    </div>
	                </div>
	            	</div>
	        	</div>
	   	 	</div>

			<div class="clear"></div>
			<div class="des " style="margin-top: 20px;
    margin-bottom: 30px;">
				<h2 class="title18 font-bold text-uppercase title-single-related-post">Description</h2>
				<div>
					<p>{{$dogs->description}}</p>
				</div>
			</div>
			<hr>
		    <div class="single-related-post">
		        <h2 class="title18 font-bold text-uppercase title-single-related-post">
		            COMMENTS
		        </h2>
		        <div class="related-post-slider">
		            
                    <div class="post-info">
                    	@foreach($comment_dog as $cmt)
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
		    <div id="comments" class="comments-area comments blog-comment-detail">
		    </div><!-- #comments -->

		    @if(Auth::check())
		    	<div class="leave-comments contact-form reply-comment" style="margin-bottom: 50px;">
			        <div id="respond" class="comment-respond">
			            <h3 id="reply-title" class="comment-reply-title">Leave Comments</h3>
			            <form action="{{ url('dog/comment/'. $dogs->id) }}" method="POST" id="commentform" class="comment-form" novalidate="">
			            	@csrf
			               	<input type="hidden" name="id_dog" id="" value="{{ $dogs->id }}">
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
	                           @foreach($dog_orther  as $dog)
	                            <div class="owl-item active" style="width: 300px;">
	                                <div class="post-716 product type-product status-publish has-post-thumbnail product_cat-belgian-malinois product_cat-bichon-frise product_cat-bloodhound last instock featured shipping-taxable purchasable product-type-simple">
	                                    <div class="item-product item-product-grid">
	                                        <div class="product-thumb">
	                                            <!-- s7upf_woocommerce_thumbnail_loop have $size and $animation -->
	                                            <a href="{{ route('home.detail_dog',$dog->id) }}" class="product-thumb-link zoom-thumb">
	                                            	@php
	                                            		$photo = $dog->getImage($dog->id)
	                                            	@endphp
	                                                <img width="270" height="270" src="{{asset('upload/dogs/'.$photo[0])}}" >

	                                            </a>
	                                            <div class="product-extra-link text-center">
	                                                
	                                                <a href="index58aa.html?add-to-cart=716" rel="nofollow" data-product_id="716" data-product_sku="DSP92037" data-quantity="1" class="button addcart-link shop-button bg-color product_type_simple add_to_cart_button s7upf_ajax_add_to_cart product_type_simple" data-title="Cannoly"><span>Add to cart</span></a>
	                                            </div>
	                                        </div>
	                                        <div class="product-info">
	                                            <span class="title12 text-uppercase color font-bold">ID:DSP{{$dog->id}}</span>
	                                            <h3 class="title18 text-uppercase product-title dosis-font font-bold">
	                                                <a title="Cannoly" href="../cannoly/index.html" class="black">name :{{$dog->name}}</a>
	                                            </h3>
	                                            @if($dog->sale==0)
	                                            <div class="product-price simple"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$dog->price}}</span></div>
	                                            @else
	                                            <div class="product-price simple"><del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$dog->price}}</span></del> <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$dog->sale}}</span></ins></div>
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
	        </div>

	    </div><!-- #product-724 -->
	</div>
	@include('client.layouts.sidebar')


	<div class="zoomContainer" style="-webkit-transform: translateZ(0);position:absolute;left:89.5px;top:955px;height:345px;width:345px;"><div class="zoomLens" style="background-position: 0px 0px; float: right; overflow: hidden; z-index: 999; transform: translateZ(0px); opacity: 0.4; zoom: 1; width: 276px; height: 276px; background-color: white; cursor: default; border: 1px solid rgb(0, 0, 0); background-repeat: no-repeat; position: absolute; left: 0px; top: 69px; display: none;">&nbsp;</div><div class="zoomWindowContainer" style="width: 400px;"><div style="overflow: hidden; background-position: 0px -108px; text-align: center; background-color: rgb(255, 255, 255); width: 400px; height: 400px; float: left; background-size: 500px 500px; z-index: 100; border: 4px solid rgb(136, 136, 136); background-repeat: no-repeat; position: absolute; background-image: url('{{ asset('upload/dogs/1corgi2.jpg')  }}'); top: 0px; left: 345px; display: none;" class="zoomWindow">&nbsp;</div></div></div>
	
@endsection