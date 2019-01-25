@extends('client.layouts.master')
@section('title','Dogs')
@section('content')
    @include('admin.layouts.flash-msg')
    @include('client.layouts.sidebar')
    <div class="main-wrap-shop content-wrap content-sidebar-left col-md-9 col-sm-8 col-xs-12">

    <div class="title-page clearfix">
        <h2 class="title30 font-bold dosis-font text-uppercase pull-left">{{ $cate->name }}</h2>
        <ul class="sort-pagi-bar list-inline-block pull-right">
            <li>
                <div class="sort-by">
                    <span class="gray">Sort:</span>
                    <div class="select-box inline-block">
                        <form class="woocommerce-ordering" method="get">
                            <select name="orderby" id="sort" data="{{ $cate->id }}" class="orderby" onchange="sort_by_price(this)">
                                <option value="">Default sorting</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                            <input type="hidden" name="paged" value="1">
                            <p style="color: red" id="show_message"></p>
                        </form>
                    </div>
                </div> 
            </li>
        </ul>
    </div>
    <div class="product-grid-view   products-wrap js-content-wrap" data-load="{&quot;attr&quot;:{&quot;item_style&quot;:null,&quot;item_style_list&quot;:null,&quot;column&quot;:&quot;3&quot;,&quot;size&quot;:null,&quot;size_list&quot;:null,&quot;shop_style&quot;:null,&quot;animation&quot;:&quot;zoom-thumb&quot;,&quot;number&quot;:&quot;12&quot;,&quot;cats&quot;:&quot;golden-retriever&quot;}}">
        <div id="reload-dogs" class="products row list-product-wrap js-content-main">
            @include('client.dog.reload-dogs')
        </div>
    </div>
    <div class="text-right">
        {{ $dogs->links() }}
    </div>

    
</div>
</div>
</div>
@endsection
@section('script')
    <script>
        function sort_by_price(obj) {
            var message = document.getElementById('show_message');
            var get_value = obj.value;
            var get_id    = $("#sort").attr('data');
            console.log(get_value);
            if (get_value === 'price'){
                // message.innerHTML = "Bạn đã chọn price-asc ";
                $.ajax({
                    type: 'post',
                    data: {get_value:get_value,get_id:get_id,"_token": "{{ csrf_token() }}"},
                    url: '{{ route('home.sort-dog') }}',
                    dataType: 'html',
                    success:function(result){
                        console.log(1111);
                        console.log(result);

                       $('#reload-dogs').html(result);
                    },
                    error: function (errors) {
                       console.log(errors);
                    }
                });
            }
            else if (get_value === 'price-desc'){
                // message.innerHTML = "Bạn đã chọn price-desc";
                $.ajax({
                    type: 'post',
                    data: {get_value:get_value,get_id:get_id,"_token": "{{ csrf_token() }}"},
                    url: '{{ route('home.sort-dog') }}',
                    dataType: 'html',
                    success:function(result){
                      $('#reload-dogs').html(result);
                    }
                });
            }
        }
    </script>
@endsection
