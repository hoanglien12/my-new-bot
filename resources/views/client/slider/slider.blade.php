<!-- slider  -->
	<div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-no-padding" style="position: relative; left: -74.5px; box-sizing: border-box; width: 1349px; height: 500px">
        <div class="wpb_column column_container col-sm-12">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                    <div class="banner-slider banner-slider2 bg-slider parallax-slider ">
                        <div class="wrap-item sv-slider   owl-carousel owl-theme" data-item="1" data-speed="" data-itemres="0:1" data-animation="fade" data-navigation="" data-pagination="" data-prev="" data-next="" style="opacity: 1; display: block;">
                            <div class="owl-wrapper-outer">
                                <div class="owl-wrapper" style="width: 2698px; left: 0px; display: block;">
                                    <div class="owl-item active" style="width: 1349px; height: 500px">
                                        @php
                                            $photos = $slider->getImage($slider->id);
                                        @endphp
                                        <div class="item-slider item-slider2  " >
                                            <div class="banner-thumb">
                                                <a href="#">
                                                    @if($photos != null)
                                                    <img src="{{ asset('upload/post/' . $photos[0]) }}" class="attachment-full">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="banner-info">
                                                <div class="container">
                                                    <div class="slider-content-text white text-center text-uppercase animated bounceIn" data-animated="bounceIn">
                                                        <h3 class="title30 dosis-font font-bold">
                                                            {{$slider->title}}
                                                        </h3>
                                                        <h4 class="title18 dosis-font">
                                                            {{$slider->summary}}
                                                        </h4>
                                                        <p><a class="shop-button bg-color arrow-right" href="{{ route('home.detail_blog',$slider->id) }}">Read more</a></p>
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
    </div>