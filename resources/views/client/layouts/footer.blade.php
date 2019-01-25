<footer id="footer" class="footer-page">
	<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row footer-top">
		<div class="container">
			<div class="wpb_column column_container col-sm-12">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">
						<div class="wrap-item sv-slider   owl-carousel owl-theme" data-item="8" data-speed="5000" data-itemres="0:2,375:3,480:4,640:5,768:6,990:7,1200:8" data-animation="" data-navigation="" data-pagination="" data-prev="" data-next="" style="opacity: 1; display: block;">
							<div class="owl-wrapper-outer">
								<div class="owl-wrapper" style="width: 2336px; left: 0px; display: block; transition: all 1000ms ease 0s; transform: translate3d(0px, 0px, 0px);">
									<div class="owl-item active" style="width: 146px;">
										<div class="item-adv-footer  ">
											<a href="#" class="wobble-horizontal"><img width="150" height="185" src="{{ asset('asset/uploads/2018/01/dog1.png') }}" class="attachment-full size-full" alt=""></a>
											<div class="info-adv-footer">
												<h3 class="title18">Bailey</h3>
												<p class="desc">Husky &amp; Lab</p>
											</div>
										</div>
									</div>
									<div class="owl-item active" style="width: 146px;">
										<div class="item-adv-footer  ">
											<a href="#" class="wobble-horizontal"><img width="150" height="185" src="{{ asset('asset/uploads/2018/01/dog2.png') }}" class="attachment-full size-full" alt=""></a>
											<div class="info-adv-footer">
												<h3 class="title18">Biscuit</h3>
												<p class="desc">Pomeranian</p>
											</div>
										</div>
									</div>
									<div class="owl-item active" style="width: 146px;">
										<div class="item-adv-footer  ">
											<a href="#" class="wobble-horizontal"><img width="150" height="185" src="{{ asset('asset/uploads/2018/01/dog3.png') }}" class="attachment-full size-full" alt=""></a>
											<div class="info-adv-footer">
												<h3 class="title18">Brandy</h3>
												<p class="desc">Tzu Poodle</p>
											</div>
										</div>
									</div>
									<div class="owl-item active" style="width: 146px;">
										<div class="item-adv-footer  ">
											<a href="#" class="wobble-horizontal"><img width="150" height="185" src="{{ asset('asset/uploads/2018/01/dog4.png') }}" class="attachment-full size-full" alt=""></a>
											<div class="info-adv-footer">
												<h3 class="title18">Cannoly</h3>
												<p class="desc">Mixed breed</p>
											</div>
										</div>
									</div>
									<div class="owl-item active" style="width: 146px;">
										<div class="item-adv-footer  ">
											<a href="#" class="wobble-horizontal"><img width="150" height="185" src="{{ asset('asset/uploads/2018/01/dog5.png') }}" class="attachment-full size-full" alt=""></a>
											<div class="info-adv-footer">
												<h3 class="title18">Corbin</h3>
												<p class="desc">Chihuahuas</p>
											</div>
										</div>
									</div>
									<div class="owl-item active" style="width: 146px;">
										<div class="item-adv-footer  ">
											<a href="#" class="wobble-horizontal"><img width="150" height="185" src="{{ asset('asset/uploads/2018/01/dog6.png') }}" class="attachment-full size-full" alt=""></a>
											<div class="info-adv-footer">
												<h3 class="title18">Martini</h3>
												<p class="desc">Havanese</p>
											</div>
										</div>
									</div>
									<div class="owl-item active" style="width: 146px;">
										<div class="item-adv-footer  ">
											<a href="#" class="wobble-horizontal"><img width="150" height="185" src="{{ asset('asset/uploads/2018/01/dog7.png') }}" class="attachment-full size-full" alt=""></a>
											<div class="info-adv-footer">
												<h3 class="title18">Mckenzie</h3>
												<p class="desc">Royal Frenchel</p>
											</div>
										</div>
									</div>
									<div class="owl-item active" style="width: 146px;">
										<div class="item-adv-footer  ">
											<a href="#" class="wobble-horizontal"><img width="150" height="185" src="{{ asset('asset/uploads/2018/01/dog8.png') }}" class="attachment-full size-full" alt=""></a>
											<div class="info-adv-footer">
												<h3 class="title18">Meela</h3>
												<p class="desc">Labrado</p>
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
	<div class="container">
		<div class="vc_row-full-width vc_clearfix"></div>
		<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row main-footer vc_custom_1516171227797 vc_row-has-fill">
			<div class="wpb_column column_container col-sm-6 col-md-3">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">
						<div class="custom-information  ">
							<div class="footer-box">
								<h2 class="title-footer title18 dosis-font text-uppercase font-bold white">Dog Categories</h2>
								<ul class="list-none list-menu-footer">
									@foreach($dogCategories as $dogcat)
									<li><a class="white" href="{{route('home.dog',$dogcat->id) }}">{{$dogcat->name}}</a></li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="wpb_column column_container col-sm-6 col-md-3">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">
						<div class="custom-information  ">
							<div class="footer-box">
								<h2 class="title-footer title18 dosis-font text-uppercase font-bold white">Product Categories</h2>
								<ul class="list-none list-menu-footer">
									  
									  @foreach($productCategories as $dogcat)
									<li><a class="white" href="{{route('home.product',$dogcat->id) }}">{{$dogcat->name}}</a></li>
									@endforeach
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="wpb_column column_container col-sm-6 col-md-3">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">
						<div class="custom-information  ">
							<div class="footer-box">
								<h2 class="title-footer title18 dosis-font text-uppercase font-bold white">Contact</h2>
								<div class="contact-footer">
									<p class="desc white"><i class="icon ion-map"></i>Address: {{ $site_address[0]->value }}</p>
									<p class="desc white"><i class="icon ion-ios-telephone"></i>Mobile: <b>{{ $site_phone[0]->value }}</b>
									<p class="desc white"><i class="icon ion-ios-email"></i><a class="white" href="mailto:contact.7uptheme@gmail.com">Mail: contact.7uptheme@gmail.com</a>
									<br />
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="wpb_column column_container col-sm-12 col-md-3">
				<div class="vc_column-inner ">
					<div class="wpb_wrapper">
						<div class="logo logo-text">
							<div class="text-logo">
								<a href="http://7uptheme.com/wordpress/haustiere">
									<ul class="list-inline-block">
										<li><img class="alignnone size-full wp-image-870" src="asset/uploads/2018/01/logo-2.png" alt="" width="51" height="46"></li>
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
				<div class="custom-information  ">
					<h2 class="title-footer title18 dosis-font text-uppercase font-bold white">Follow Us</h2>
				</div>
				<div class="link-profile  ">
					<a class="color hover-shadow" href="#"><i class="fa fa-facebook-f"></i></a>
					<a class="color hover-shadow" href="#"><i class="fa fa-instagram"></i></i></a>
					<a class="color hover-shadow" href="#"><i class="fa fa-twitter"></i></a>
					<a class="color hover-shadow" href="#"><i class="fa fa-google"></i></a>
				</div>
			</div>
		</div>
		<div class="vc_row-full-width vc_clearfix"></div>
	</div>
	<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row footer-bottom footer-bottom2 vc_custom_1516171781582 vc_row-has-fill">
		<div class="container">
			<p class="desc copyright white text-center">@2018 - Design by: <a class="white" href="http://7uptheme.com/">petsstore.com</a></p>
		</div>
	</div>
</footer>