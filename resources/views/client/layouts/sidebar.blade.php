<div class="col-md-3 col-sm-4 col-xs-12">
    <div class="sidebar sidebar-left">
        <div id="woocommerce_product_search-2" class="sidebar-widget widget woocommerce widget_product_search">
            <h3 class="widget-title">Search</h3>
            <form role="search" method="get" class="woocommerce-product-search" action="{{ route('home.search') }}">
                <label class="screen-reader-text" for="woocommerce-product-search-field-0">Search for:</label>
                <input type="search" id="woocommerce-product-search-field-0" class="search-field" placeholder="Search products…" value="" name="s">
                <button type="submit" value="Search">Search</button>
                <input type="hidden" name="post_type" value="product">
            </form>
        </div>
        <div id="sv_category_fillter-2" class="sidebar-widget widget widget_sv_category_fillter">
            <h3 class="widget-title">Dog Categories</h3>
            @foreach($dogCategories as $dogcat)
            <ul class="list-none list-attr">
                <li><a data-cat="airedale-terrier" href="{{route('home.dog',$dogcat->id) }}" class="load-shop-ajax ">{{$dogcat->name}}</a></li>
            </ul>
             @endforeach
             <h3 class="widget-title">Product Categories</h3>
              @foreach($productCategories as $dogcat)
            <ul class="list-none list-attr">
                <li><a data-cat="airedale-terrier" href="{{route('home.product',$dogcat->id) }}" class="load-shop-ajax ">{{$dogcat->name}}<span class="count"></span></a></li>
            </ul>
             @endforeach
        </div> 
        
      
        
    </div>
</div>