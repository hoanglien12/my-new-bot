@extends('client.layouts.master')
@section('title','Pets Store')
@section('content')
	@include('admin.layouts.flash-msg')
	@include('client.slider.slider')

    @include('client.dog.dog_age')
    
	@include('client.about.about_home')
	
	@include('client.dog.dog_home')
	
	@include('client.blog.blog_home')
   
@endsection