@extends('admin.layouts.master')
@section('title','Pets Store Admin ')
@section('content')
	<hr>
	<h1>Welcome to Pets Store Admin</h1>
	<hr>
	<h2>There are  <span class="text-danger">{{ $orders_waiting }}</span> orders waiting approval</h2> <a href="{{ route('order.index') }}"><button class="btn btn-success">Go to Orders  <i class="fa fa-arrow-right"></i></i></button></a>

	
@endsection