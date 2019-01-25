@extends('admin.layouts.master')
@section('title','Detail Order')
 
@section('content')
	<hr>
	<a class="btn btn-success" href="{{ route('order.index') }}"><i class="fa fa-arrow-left"></i>Back to Orders</a>
	<h1>Detail order</h1>
	<table width="100%" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>ID Order</th>
                <th>Dog</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
            
        </thead>
        <tbody>
        	@foreach($detail_order as $detail)
        	<tr>
	        	<td>{{ $detail->id_order }}</td>
	        	<td>
	        		@if(isset($detail->id_dog))
	        		{{ $detail->dog->name }}
	        		@endif
	        	</td>
	        	<td>
	        		@if(isset($detail->id_product))
	        		{{ $detail->product->name }}
	        		@endif
	        	</td>
	        	<td>{{ $detail->quantity }}</td>
	        	<td>{{ $detail->price }}</td>
	        	<td>{{ $detail->created_at }}</td>
	        	<td>
	        		<span class="text-info">{{ ($detail->order->status  == 1) ? "waiting" : "Approved" }}</span>
	        	</td>
	        </tr>
        	@endforeach
        </tbody>
        
    </table>
@endsection