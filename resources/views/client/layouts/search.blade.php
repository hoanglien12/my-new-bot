@extends('client.layouts.master')
@section('title','Results search')
@section('content')

@include('client.layouts.sidebar')
<div class="main-wrap-shop content-wrap content-sidebar-left col-md-9 col-sm-8 col-xs-12">
    <h1>Results for key: {{ $value }}</h1>
@include('admin.layouts.flash-msg')
<div class="product-grid-view   products-wrap js-content-wrap" data-load="{&quot;attr&quot;:{&quot;item_style&quot;:null,&quot;item_style_list&quot;:null,&quot;column&quot;:&quot;3&quot;,&quot;size&quot;:null,&quot;size_list&quot;:null,&quot;shop_style&quot;:null,&quot;animation&quot;:&quot;zoom-thumb&quot;,&quot;number&quot;:&quot;12&quot;,&quot;cats&quot;:&quot;golden-retriever&quot;}}">
    <div class="products row list-product-wrap js-content-main">
    	@if(count($dogs) > 0)
        @foreach($dogs as $dog) 
        <div class="list-col-item list-3-item post-724 product type-product status-publish has-post-thumbnail product_cat-bichon-frise product_cat-french-bulldog product_cat-golden-retriever first instock sale featured shipping-taxable purchasable product-type-simple">
            <div class="item-product item-product-grid">
                <div class="product-thumb">
                    <!-- s7upf_woocommerce_thumbnail_loop have $size and $animation -->
                    <a href="{{ route('home.detail_dog',$dog->id)}} " class="product-thumb-link zoom-thumb">
                        @php
                            $photos = $dog->getImage($dog->id);
                        @endphp
                        @if($photos != null)
                        <img width="270" height="270" src="{{ asset('upload/dogs/' . $photos[0]) }}" class="attachment-270x270 size-270x270 wp-post-image" alt="" sizes="(max-width: 270px) 100vw, 270px">
                        @endif
                    </a>
                     @if($dog->sale!=0)
                    <div class="product-label"><span class="sale">sale</span></div>
                    @endif
                    <div class="product-extra-link text-center">
                       
                        <a href="{{route('home.cart',$dog->id)}}" rel="nofollow" data-product_id="724" data-product_sku="DSP23684" data-quantity="1" class="button addcart-link shop-button bg-color product_type_simple add_to_cart_button s7upf_ajax_add_to_cart product_type_simple" data-title="Bailey"><span>Add to cart</span></a>
                    </div>
                </div>
                <div class="product-info">
                    <span class="title12 text-uppercase color font-bold">{{$dog->dogcategory->name}}</span>
                    <h3 class="title18 text-uppercase product-title dosis-font font-bold">
                        <a title="Bailey" href="{{ route('home.detail_dog',$dog->id)}}" class="black"> {{$dog->name}}</a>
                    </h3>
                    @if($dog->sale==0)
                    <div class="product-price simple"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$dog->price}}</span></div>
                    @else
                     <div class="product-price simple"><del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$dog->price}}</span></del> <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$dog->sale}}</span></ins></div>
                     @endif
                    <ul class="wrap-rating list-inline-block">
                        <li>
                            <div class="product-rate">
                                <div class="product-rating" style="width:80%"></div>
                            </div>
                        </li>
                        <li>
                            <span class="number-rate silver">(1s)</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
        @endif
		@if(count($products) > 0)
         @foreach($products as $product) 
        <div class="list-col-item list-3-item post-724 product type-product status-publish has-post-thumbnail product_cat-bichon-frise product_cat-french-bulldog product_cat-golden-retriever first instock sale featured shipping-taxable purchasable product-type-simple">
            <div class="item-product item-product-grid">
                <div class="product-thumb">
                    <!-- s7upf_woocommerce_thumbnail_loop have $size and $animation -->
                    <a href="{{ route('home.detail_product',$product->id)}} " class="product-thumb-link zoom-thumb">
                         @php
                            $photos = $product->getImage($product->id);
                        @endphp
                        @if($photos != null)
                            <img width="270" height="270" src="{{ asset('upload/product/' . $photos[0]) }}" class="attachment-270x270 size-270x270 wp-post-image" alt="" sizes="(max-width: 270px) 100vw, 270px">
                        @endif
                    </a>
                    @if($product->sale!=0)
                    <div class="product-label"><span class="sale">sale</span></div>
                    @endif
                    <div class="product-extra-link text-center">
                       
                        <a href="{{route('home.productcart',$product->id)}}" rel="nofollow" data-product_id="724" data-product_sku="DSP23684" data-quantity="1" class="button addcart-link shop-button bg-color product_type_simple add_to_cart_button s7upf_ajax_add_to_cart product_type_simple" data-title="Bailey"><span>Add to cart</span></a>
                    </div>
                </div>
                <div class="product-info">
                    <span class="title12 text-uppercase color font-bold">ID:DSP{{$product->id}}</span>
                    <h3 class="title18 text-uppercase product-title dosis-font font-bold">
                        <a title="Bailey" href="../../product/bailey/index.html" class="black">Name: {{$product->name}}</a>
                    </h3>
                    @if($product->sale==0)
                    <div class="product-price simple"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$product->price}}</span></div>
                    @else
                     <div class="product-price simple"><del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$product->price}}</span></del> <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$product->sale}}</span></ins></div>
                     @endif
                    <ul class="wrap-rating list-inline-block">
                        <li>
                            <div class="product-rate">
                                <div class="product-rating" style="width:80%"></div>
                            </div>
                        </li>
                        <li>
                            <span class="number-rate silver">(1s)</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
        @endif
        @if(count($blogs) > 0)
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
                                {{$blog->summary}}
                            </p>
                            <ul class="list-inline-block post-meta-data">
                                <li><i class="fa fa-calendar color"></i><span class="gray">{{ date('Y-m-d',strtotime($blog->created_at))}}</span></li>
                                <li><i aria-hidden="true" class="fa fa-comment color"></i>
                                    <a href="../flowing-studio-dress-2/index.html#respond">
                                        Comments </a>
                                </li>
                                
                            </ul>
                            <a href="{{ route('home.detail_blog',$blog->id) }}" class="shop-button">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>

</div>
</div>

@endsection