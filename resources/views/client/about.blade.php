@extends('client.layouts.master')
@section('title','About Us')
@section('content')

<h1>About us</h1>
@include('admin.layouts.flash-msg')
<div class="content-wrap content-sidebar-right container col-md-12 col-sm-8 col-xs-12">
    <div class="content-single-blog ">
        <div class="single-post-thumb banner-advs col-md-6">
            @php
                $photo = $about_us->getImage($about_us->id);
            @endphp
            @if($photo != null)
            <img width="870" height="400" src="{{ asset('upload/post/' . $photo[0]) }}" class="attachment-870x400 size-870x400 wp-post-image" alt="">
            @endif
			
            
        </div>
        
        <div class="content-post-default col-md-6">
            
            <div class="date-time">
            	<h2 class="title24 font-bold">
            	{{$about_us->title}}
            </h2>
				<ul class="list-inline-block post-meta-data">
		            <li><i class="fa fa-calendar color"></i><span class="gray">{{ date('Y-m-d',strtotime($about_us->created_at))}}</span></li>
		            
		        </ul>
			</div>
            <div class="detail-content-wrap clearfix">
                <div class="vc_row wpb_row">
                    <div class="wpb_column column_container col-sm-12">
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <div class="wpb_text_column wpb_content_element ">
                                    <div class="wpb_wrapper">
                                        <p class="desc summary">
                                        	{{$about_us->summary}}
                                        </p>
                                        <p class="desc content">
                                        	{!!$about_us->content!!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="clear"></div>
</div>
<div class="clearfix"></div>
<div class="product">
	@include('client.dog.dog_age')

</div>
@endsection