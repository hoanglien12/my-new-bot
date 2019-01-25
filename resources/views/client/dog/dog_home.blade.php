


<div data-vc-full-width="true" data-vc-full-width-init="true" class="vc_row wpb_row block-product2" style="position: relative; left: -74.5px; box-sizing: border-box; width: 1349px; padding-left: 74.5px; padding-right: 74.5px;">
		<div class="wpb_column column_container col-sm-12">
		    <div class="vc_column-inner ">
		        <div class="wpb_wrapper">
		            <div class="tabs-block block-element tab-product2  7up-style tab-ajax-off">
		                <h2 class="title30 font-bold text-uppercase">Dogs</h2>
		                <div class="tab-header">

		                        	<a style="float: right;
    color: white;
    margin-right: -120px;
    margin-left: 10px;" href="{{ route('home.dog-category') }}" class="text-right shop-button bg-color arrow-right">Read more</a>
		                    <ul class="nav nav-pills nav-tabs nav-justified list-package title-tab font-bold  title-tab2 text-uppercase list-inline-block">
		                        <li class="active">
		                            <a href="#tab1" data-toggle="tab" aria-expanded="true">Sale</a>
		                        </li>
		                        <li class=""><a href="#tab2" data-toggle="tab" aria-expanded="false">New Arrival</a>
		                        </li>
		                        <li class=""><a href="#tab3" data-toggle="tab" aria-expanded="false">Best seller</a>
		                        </li>
		                        
		                    </ul>
		                    
		                </div>
		                <div class="tab-content carousel slide " id="myCarousel" >
							<div id="tab1" class="tab-pane active">
							    <div class="block-element  product-slider-view  default gap-30 js-content-wrap">
							        <div class="list-product-wrap">
							            <div class="wrap-item smart-slider group-navi  owl-carousel owl-theme" data-item="4" data-speed="" data-itemres="0:1,480:2,768:3,990:4" data-prev="" data-next="" data-pagination="" data-navigation="group-navi" style="opacity: 1; display: block;">
							                <div class="owl-wrapper-outer">
							                    <div class="owl-wrapper" style="width: 4800px; left: 0px; display: block;">
							                    	@foreach($sale_dogs as $dog)
							                       <div class="owl-item active" style="width: 300px;">
							                            <div class="item">
							                                <div class="post-705 product type-product status-publish has-post-thumbnail product_cat-bloodhound product_cat-french-bulldog product_cat-german-shepherd last instock featured shipping-taxable purchasable product-type-simple">
							                                    <div class="item-product item-product-grid">
							                                        <div class="product-thumb">
							                                            <!-- s7upf_woocommerce_thumbnail_loop have $size and $animation -->
							                                            <a href="{{ route('home.detail_dog',$dog->id)}}" class="product-thumb-link " title="{{ $dog->name . '-' . $dog->dogcategory->name }}">
							                                            	@php
												                                $photos = $dog->getImage($dog->id);
												                            @endphp
												                            @if($photos != null)
												                            	<img width="270" height="270" src="{{ asset('upload/dogs/' . $photos[0]) }}" class="attachment-270x270 size-270x270 wp-post-image" alt="" sizes="(max-width: 270px) 100vw, 270px">
		                                		                            @endif
		                                		                            </a>
													                        <div class="product-label"><span class="sale">sale</span></div>
													                        
							                                                
							                                            </a>

							                                            <div class="product-extra-link text-center">
							                                                <a href="{{route('home.cart',$dog->id)}}" class="button addcart-link shop-button bg-color product_type_simple add_to_cart_button s7upf_ajax_add_to_cart product_type_simple" data-title="Meela"><span>Add to cart <i class="fa fa-chevron-right"></i></span></a> </div>
							                                        </div>
							                                        <div class="product-info">
							                                            <span class="title12 text-uppercase color font-bold">{{$dog->dogcategory->name}}</span>
							                                            <h3 class="title18 text-uppercase product-title dosis-font font-bold">
																			<a title="Meela" href="../product/meela/index.html" class="black">{{$dog->name}}</a>
																		</h3>
																		
							                                            <div class="product-price simple"><del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$dog->price}}</span></del> <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$dog->sale}}</span></ins></div>
							                                            
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
							                        </div>
							                        @endforeach
							                    </div>
							                </div>
							                
							            </div>

							        </div>
									<div class="text-right">
									<a href="{{ route('home.dog-category') }}">Read more</a>
										
									</div>

							    </div>
							</div>
							<div id="tab2" class="tab-pane">
							    <div class="block-element  product-slider-view  default gap-30 js-content-wrap">
							        <div class="list-product-wrap">
							            <div class="wrap-item smart-slider group-navi  owl-carousel owl-theme" data-item="4" data-speed="" data-itemres="0:1,480:2,768:3,990:4" data-prev="" data-next="" data-pagination="" data-navigation="group-navi" style="opacity: 1; display: block;">
							                <div class="owl-wrapper-outer">
							                    <div class="owl-wrapper" style="width: 4800px; left: 0px; display: block;">
							                    	@foreach($new_dogs as $dog)
							                       <div class="owl-item active" style="width: 300px;">
							                            <div class="item">
							                                <div class="post-705 product type-product status-publish has-post-thumbnail product_cat-bloodhound product_cat-french-bulldog product_cat-german-shepherd last instock featured shipping-taxable purchasable product-type-simple">
							                                    <div class="item-product item-product-grid">
							                                        <div class="product-thumb">
							                                            <!-- s7upf_woocommerce_thumbnail_loop have $size and $animation -->
							                                            <a href="{{ route('home.detail_dog',$dog->id)}}" class="product-thumb-link " title="{{ $dog->name . '-' . $dog->dogcategory->name }}">
							                                            	@php
												                                $photos = $dog->getImage($dog->id);
												                            @endphp
												                            @if($photos != null)
												                            	<img width="270" height="270" src="{{ asset('upload/dogs/' . $photos[0]) }}" class="attachment-270x270 size-270x270 wp-post-image"  alt="" sizes="(max-width: 270px) 100vw, 270px">
		                                		                            @endif
							                                                </a>
														                  	@if($dog->sale!=0)
													                        <div class="product-label"><span class="sale">sale</span></div>
													                        @endif

							                                            </a>

							                                            <div class="product-extra-link text-center">
							                                                
							                                                <a href="{{route('home.cart',$dog->id)}}" rel="nofollow" class="button addcart-link shop-button bg-color product_type_simple add_to_cart_button s7upf_ajax_add_to_cart product_type_simple" data-title="Meela"><span>Add to cart <i class="fa fa-chevron-right"></i></span></a> </div>
							                                        </div>
							                                        <div class="product-info">
							                                            <span class="title12 text-uppercase color font-bold">{{$dog->dogcategory->name}}</span>
							                                            <h3 class="title18 text-uppercase product-title dosis-font font-bold">
																			<a title="Meela" href="../product/meela/index.html" class="black">{{$dog->name}}</a>
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
							                        </div>
							                        @endforeach
							                    </div>
							                    
							                </div>
							                
							            </div>
							        </div>
							    </div>
							</div>
							<div id="tab3" class="tab-pane">
							    <div class="block-element  product-slider-view  default gap-30 js-content-wrap">
							        <div class="list-product-wrap">
							            <div class="wrap-item smart-slider group-navi  owl-carousel owl-theme" data-item="4" data-speed="" data-itemres="0:1,480:2,768:3,990:4" data-prev="" data-next="" data-pagination="" data-navigation="group-navi" style="opacity: 1; display: block;">
							                <div class="owl-wrapper-outer">
							                    <div class="owl-wrapper" style="width: 4800px; left: 0px; display: block;">
							                    	@foreach($best_dogs as $dog)
							                       <div class="owl-item active" style="width: 300px;">
							                            <div class="item">
							                                <div class="post-705 product type-product status-publish has-post-thumbnail product_cat-bloodhound product_cat-french-bulldog product_cat-german-shepherd last instock featured shipping-taxable purchasable product-type-simple">
							                                    <div class="item-product item-product-grid">
							                                        <div class="product-thumb">
							                                            <!-- s7upf_woocommerce_thumbnail_loop have $size and $animation -->
							                                            <a href="{{ route('home.detail_dog',$dog->id)}}" class="product-thumb-link " title="{{ $dog->name . '-' . $dog->dogcategory->name }}">
							                                            	@php
												                                $photos = $dog->getImage($dog->id);
												                            @endphp
												                            @if($photos != null)
												                            	<img width="270" height="270" src="{{ asset('upload/dogs/' . $photos[0]) }}" class="attachment-270x270 size-270x270 wp-post-image"  alt="" sizes="(max-width: 270px) 100vw, 270px">
		                                		                            @endif
							                                                </a>
														                  @if($dog->sale!=0)
													                        <div class="product-label"><span class="sale">sale</span></div>
													                        @endif

							                                            </a>

							                                            <div class="product-extra-link text-center">
							                                                
							                                                <a href="index1f0d.html?add-to-cart=705" rel="nofollow" data-product_id="705" data-product_sku="DSP93768" data-quantity="1" class="button addcart-link shop-button bg-color product_type_simple add_to_cart_button s7upf_ajax_add_to_cart product_type_simple" data-title="Meela"><span>Add to cart <i class="fa fa-chevron-right"></i></span></a> </div>
							                                        </div>
							                                        <div class="product-info">
							                                            <span class="title12 text-uppercase color font-bold">{{$dog->dogcategory->name}}</span>
							                                            <h3 class="title18 text-uppercase product-title dosis-font font-bold">
																			<a title="Meela" href="../product/meela/index.html" class="black">{{$dog->name}}</a>
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
			</div>
		</div>
	</div>