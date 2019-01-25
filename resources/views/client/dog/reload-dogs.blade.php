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
@endforeach