@extends('client.layouts.master')
@section('title','Cart')
@section('content')
<article style="background: white" id="post-1084" class="post-1084 page type-page status-publish hentry">
	<div class="entry-content clearfix">
		<br>
		@include('admin.layouts.flash-msg')

		<div class="title-page clearfix">
			<h1 class="title30 dosis-font font-bold text-uppercase">Cart</h1>
		</div>
		<div class="clearfix">
			<div class="woocommerce">
				<form class="woocommerce-cart-form" action="{{route('home.viewcart')}}" method="post">
					<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
						<thead> 
							<tr style="color: black; ">
								<th style="width: 50px;" class="product-remove">Delete</th>
								<th style="width: 300px" class="product-thumbnail">Image</th>
								<th style="width: 200px" class="product-name">Product</th> 
								<th style="width: 200px" class="product-price">Price</th>
								<th style="width: 200px" class="product-quantity">Quantity</th>
								<th style="width: 250px" class="product-subtotal">Total</th>
							</tr>
						</thead>
						@if(Session::has('cart'))
								<tbody>
									@foreach($dog_add as $dog)

										<tr class="woocommerce-cart-form__cart-item cart_item">
											@if(isset($dog['item']['id_dog_cate']))
											<td class="product-remove">
 												<a href="{{route('home.del',$dog['item']['name'])}}" class="remove" aria-label="Remove this item" data-product_id="724" data-product_sku="DSP23684">
													<i class="fa fa-trash" style="margin-left: 15px; color: red; font-size: 20px;"></i>
												</a>
											</td>
											@else
											<td class="product-remove">
 												<a href="{{route('home.del',$dog['item']['name'])}}" class="remove" aria-label="Remove this item" data-product_id="724" data-product_sku="DSP23684">
													<i class="fa fa-trash" style="margin-left: 15px; color: red; font-size: 20px;"></i>
												</a>
											</td>
											@endif
											@php
												$img = $dog['item']->getImage($dog['item']['id']);
											@endphp
											@if(isset($dog['item']['id_dog_cate']))
											<td class="product-thumbnail"> 
												<a href="#">
													<img width="100px" height="100px" src="{{ asset('upload/dogs/' . $img[0]) }}" />
												</a>
											</td>
											@else
												<td class="product-thumbnail"> 
													<a href="#">
														<img width="100px" height="100px" src="{{ asset('upload/product/' . $img[0]) }}" />
													</a>
												</td>
											@endif

											<td class="product-name" data-title="Product">
												<a href="">{{$dog['item']['name']}}</a>
											</td>
											<td class="product-price" data-title="Price">
												<span class="woocommerce-Price-amount amount">
													<span class="woocommerce-Price-currencySymbol">&#36;
													@if ($dog['item']['sale']==0) 
														{{$dog['item']['price']}} 
													@else 
														{{$dog['item']['sale']}} 
													@endif 
												</span>
											</td>
											@if(isset($dog['item']['id_dog_cate']))
												<td class="product-quantity" data-title="Quantity">
													<label class="qty-label">Qty:</label>
													<div class="detail-qty info-qty border radius6" style="color: black;">
														<a href="{{route('home.reduce',$dog['item']['name'])}}" class="qty-down" style="color: black;">
															<i class="fa fa-angle-down" aria-hidden="true"></i>
														</a>
														<input type="text" step="1" min="0" max="" name="" value="{{$dog['qty']}}" title="Qty" class="input-text text qty qty-val" size="4" disabled />
														<a href="{{route('home.cart',$dog['item']['id'])}}" class="qty-up">
															<i class="fa fa-angle-up" aria-hidden="true"></i>
														</a>
													</div>
												</td>
											@else
												<td class="product-quantity" data-title="Quantity">
													<label class="qty-label">Qty:</label>
													<div class="detail-qty info-qty border radius6" style="color: black;">
														<a href="{{route('home.reduce',$dog['item']['name'])}}" class="qty-down" style="color: black;">
															<i class="fa fa-angle-down" aria-hidden="true"></i>
														</a>
														<input type="text" step="1" min="0" max="" name="" value="{{$dog['qty']}}" title="Qty" class="input-text text qty qty-val" size="4" disabled />
														<a href="{{route('home.productcart',$dog['item']['id'])}}" class="qty-up">
															<i class="fa fa-angle-up" aria-hidden="true"></i>
														</a>
													</div>
												</td>
											@endif
											<td class="product-subtotal" data-title="Total" style="color: black;">
												<span class="woocommerce-Price-amount amount">
													<span class="woocommerce-Price-currencySymbol">&#36;
													</span>{{$dog['price']}}
												</span>
											</td>
										</tr>
									@endforeach
									<tr>
										<td colspan="3" class="actions">
											<strong style="color: black;">Total: @if(Session::has('cart')){{number_format($totalPrice)}} @else 0.00 @endif</strong></br>
											<input type="hidden" id="_wpnonce" name="_wpnonce" value="e210a99684" />
											<input type="hidden" name="_wp_http_referer" value="/wordpress/haustiere/cart/" />
										</td>
										<td colspan="3" class="actions">
											<a href="{{ route('home.deleteAll') }}"><button type="button" class="btn btn-danger">Delete Cart</button></a>
										</td>
									</tr>
								</tbody>
							@endif
						</table>

					</form>
				<div  class="wc-proceed-to-checkout">
					<a href="{{route('home.checkout')}}" class="checkout-button button alt wc-forward">
					Proceed to checkout</a>

					<a href="{{ route('home.index') }}"><button type="button" class="btn btn-primary">Return home</button></a>
				</div>
			</div>
		</div>
	</div>
</article>
@endsection