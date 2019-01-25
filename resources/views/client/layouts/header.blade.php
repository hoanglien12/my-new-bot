<style type="text/css">
.bt{
	color: white;
	background: #9cc914;
	width: 118px;
}
.bt:hover{
	background: #599907;
	color: white;
}
.bt1{
	color: white;
	background:black;
	width: 118px;
}
.bt1:hover{
	background: #3F3F3F;
	color: white;
}
.cart{
	color: white;
}
</style>
<header id="header" class="header-page">
	<!-- <div class="container"> -->
	<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row top-header vc_custom_1516164851430 vc_row-has-fill" style="background-color: #727272">
		<div class="container">
			<div class="wpb_column column_container col-sm-6 col-md-3 col-xs-6">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">
						<div class="custom-information  ">
							<p class="desc white font-bold text-uppercase title12 top-phone-number text-left">Call us Now: {{ $site_phone[0]->value }}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="info-top-right text-right wpb_column column_container col-sm-6 col-md-9 col-xs-6">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">
						<ul class="social-network list-inline-block text-uppercase  inline-block font-bold">
							<li><a class="white push" href="#"><i class="icon ion-social-facebook"></i></a></li>
							<li><a class="white push" href="#"><i class="icon ion-social-googleplus"></i></a></li>
							<li><a class="white push" href="#"><i class="icon ion-social-twitter"></i></a></li>
						</ul>
						<ul class="top-link list-inline-block text-uppercase  inline-block text-upercase title12">
							<li></li>
		                    @guest
		                        <li class="nav-item">
		                            <a class="nav-link white wobble-top" href="{{ route('login') }}">{{ __('Login') }}</a>
		                        </li>
		                        <li class="nav-item">
		                            <a class="nav-link white wobble-top" href="{{ route('register') }}">{{ __('Register') }}</a>
		                        </li>
		                    @else
		                        <li class="nav-item dropdown">
		                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: white;">
		                                {{ Auth::user()->name }}<span class="caret"></span>
		                            </a>

		                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
		                            	<a class="dropdown-item" href="{{ route('editPass') }}">
				                            <i class="fa fa-exchange-alt"></i>{{ __('Change password') }}
				                        </a>
		                                <br>
		                                <a class="dropdown-item" href="{{ route('logout') }}"
		                                   onclick="event.preventDefault();
		                                                 document.getElementById('logout-form').submit();">
		                                    {{ __('Logout') }}
		                                </a>
		                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		                                    @csrf
		                                </form>
		                            </div>
		                        </li>
		                    @endguest
		                </ul>	
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="vc_row-full-width vc_clearfix"></div>
	<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row main-header bg-color main-header2">
		<div class="container">
			<div class="wpb_column column_container col-sm-12 col-md-3">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">
						<div class="logo logo-text">
							<div class="text-logo">
								<a href="{{ route('home.index') }}">
									<ul class="list-inline-block">
										<li><img class="alignnone size-full wp-image-870" src="{{ asset('asset/uploads/2018/01/logo-2.png') }}" alt="" width="51" height="46" /></li>
										<li>
											<h1 class="title30 dosis-font text-uppercase font-bold white">Haustiere</h1>
											<h2 class="title24 gab-font white opaci">we sell real friends</h2>
										</li>
									</ul>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="wrap-menu-search wpb_column column_container col-sm-12 col-md-9">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">
						<nav class="main-nav  main-nav1 ">
							<ul id="menu-main-menu" class="list-none">
								<li id="nav-menu-item-826" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-custom menu-item-object-custom menu-item-home current-menu-ancestor current-menu-parent menu-item-has-children"><a href="{{ route('home.index') }}" class="menu-link main-menu-link">Home</a></li>
								<li id="nav-menu-item-831" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children"><a href="{{ route('home.dog-category') }}" class="menu-link main-menu-link">Dogs</a>
								<ul class="sub-menu menu-odd  menu-depth-1">
									@foreach($dogCategories as $cate)
										<li id="nav-menu-item-1083" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page"><a href="{{ route('home.dog',$cate->id) }}" class="menu-link sub-menu-link">{{ $cate->name }}</a>
										</li>
									@endforeach
								</ul>
							</li>
							<li id="nav-menu-item-829" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="{{ route('home.product-category') }}" class="menu-link main-menu-link">Products</a>
							<ul class="sub-menu menu-odd  menu-depth-1">
								@foreach($productCategories as $cate)
								<li id="nav-menu-item-1179" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page">
									<a href="{{ route('home.product',$cate->id) }}" class="menu-link sub-menu-link">{{ $cate->name }}</a>
								</li>
								@endforeach
							</li>
						</ul>
					</li>
					<li id="nav-menu-item-827" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children"><a href="{{ route('home.blog') }}" class="menu-link main-menu-link">Blog</a>
						
					<!-- <ul class="sub-menu menu-odd  menu-depth-1">
						<li id="nav-menu-item-1122" class="sub-menu-item  menu-item-odd menu-item-depth-1 menu-item menu-item-type-post_type menu-item-object-page"><a href="../blog-list/index.html" class="menu-link sub-menu-link">Blog List</a></li>
					</ul> -->
				</li>
				<li id="nav-menu-item-837" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page"><a href="{{ route('home.about-us') }}" class="menu-link main-menu-link">About</a></li>
				<li id="nav-menu-item-836" class="main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page"><a href="{{ route('home.contact') }}" class="menu-link main-menu-link">Contact</a></li>
			</ul>
			<a href="#" class="toggle-mobile-menu"><span></span></a>
		</nav>
		
		<div class="block-element block-search-element  ">
			<form class="search-form search-hover   live-search-on" action="{{ route('home.search') }}">
				<input name="search" placeholder="Search......" type="text">
				<input type="hidden" name="post_type" placeholder="product" />
				<div class="submit-form">
					<input type="submit" value="">
				</div>
				<div class="list-product-search">
					<p class="text-center">Please enter key search to display results.</p>
				</div>
			</form>
		</div>
		<div class="dropdown" >
		<a href="{{ route('home.viewcart') }}" class="cart"><button style="background:#9cc914; border:2px solid white" class="btn btn-primary dropdown-toggle" type="button" >
          @if(Session::has('cart')){{Session('cart')->totalQty}}@else 0 @endif 
          <span class="white mini-cart-space" >items - </span> @if(Session::has('cart')){{number_format(Session('cart')->totalPrice)}} @else 0.00 @endif</a>
    <!-- {{-- <button style="background:#9cc914; border:2px solid white" class="btn btn-primary dropdown-toggle" type="button"  data-toggle="dropdown" > 
          @if(Session::has('cart')){{Session('cart')->totalQty}}@else 0 @endif 
          <span class="white mini-cart-space" >items - </span> @if(Session::has('cart')){{number_format($totalPrice)}} @else 0.00 @endif
    <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width: 245px; margin-left: -80px">
    	@if(Session::has('cart'))
	        @foreach($dog_cart as $dog_add)
	        <div class="product-thumb">
			<a href="" class="product-thumb-link">
			<img width="50px" height="50px" src="" />
				 </a></div>
			<div class="product-info"><h3 class="title14 product-title"><a href="">{{$dog_add['item']['name']}}</a></h3>
			<div class="mini-cart-qty"> <span>
			<span class="qty-num">{{$dog_add['qty']}}</span> x <span class="color">
			<span class="woocommerce-Price-amount amount">
			<span class="woocommerce-Price-currencySymbol">&#36;</span>@if($dog_add['item']['sale']==0){{number_format($dog_add['item']['price'])}} @else {{number_format($dog_add['item']['sale'])}}@endif</span></span></span></div></div>
			<div class="product-delete text-right">
			<a href="{{route('home.del',$dog_add['item']['id'])}}" class="remove-product"><i class="fa fa-trash"></i></a></div>
			@endforeach
        @endif
        @yield('client.cart.viewproduct')
		<div class="mini-cart-total text-uppercase title18 clearfix">
			<span class="pull-left">TOTAL:</span>
			<strong class="pull-right color mini-cart-total-price get-cart-price">
				<span class="woocommerce-Price-amount amount">
					<span class="woocommerce-Price-currencySymbol">&#36;</span>
						@if(Session::has('cart')){{number_format($totalPrice)}} @else 0 @endif
					</span>
				</strong>
			</div>
		    <div class="cart-btns">
        <button class="bt"><a href="{{route('home.viewcart')}}">View Cart</a></button>
          <button class="bt1"><a href="{{route('home.checkout')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a></button>
        </div>
      
    </ul> --}} -->
  </div>
	</div>
</div>
</div>
<div class="vc_row-full-width vc_clearfix"></div>
<!-- </div> -->
</header>