

@extends('client.layouts.master')
@section('title','Dog Categories')
@section('content')
    @include('admin.layouts.flash-msg')
    @include('client.layouts.sidebar')
    <div class="main-wrap-shop content-wrap content-sidebar-left col-md-9 col-sm-8 col-xs-12">

    <div class="title-page clearfix">
    	@foreach($dogCategories as  $cate)
    	<a href="{{ route('home.dog',$cate->id) }}"><h2 class="title30 font-bold dosis-font text-uppercase pull-left">{{ $cate->name }}</h2></a>
        <a href="{{ route('home.dog',$cate->id) }}"><h5 class="font-bold pull-right">Xem thêm</h5></a>
    </div>
    <div class="product-grid-view   products-wrap js-content-wrap" data-load="{&quot;attr&quot;:{&quot;item_style&quot;:null,&quot;item_style_list&quot;:null,&quot;column&quot;:&quot;3&quot;,&quot;size&quot;:null,&quot;size_list&quot;:null,&quot;shop_style&quot;:null,&quot;animation&quot;:&quot;zoom-thumb&quot;,&quot;number&quot;:&quot;12&quot;,&quot;cats&quot;:&quot;golden-retriever&quot;}}">
        <div class="products row list-product-wrap js-content-main">
    	@foreach($cate->dog as $item_dog => $dog)
            @if($item_dog < 3)
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
                            <a title="Bailey" href="../../product/bailey/index.html" class="black">Name: {{$dog->name}}</a>
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
            @endif
        @endforeach
          
        </div>
		@endforeach
    </div>
</div>

</div>
</div>
@endsection