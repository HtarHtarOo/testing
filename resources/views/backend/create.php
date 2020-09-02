@extends('backendtemplate')
@section('content')

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Order List</h1>
		<a href="{{route('items.create')}}" class="btn btn-dark">Add New</a>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered">
			<thead class="thead-dark">
		<tr>
			<td>No</td>
			<td>Item Name</td>
			<td>Price</td>
			<td>Qty</td>
			<td>Subtotal</td>
		</tr>

	</thead>
	<tbody>
		@php $i=1; @endphp
		@foreach($order as $order)
		<tr>
		<td>{{$i++}}</td>
		<td>{{$order->voucherno}}</td>
		<td>{{$order->user_id}}</td>
		<td>{{$order->note}}</td>
		<td>{{$order->total}}</td>
		<td><a href="{{asset('order_detail.php')}}" class="btn btn-success">Detail</a>
		</td>
	</tr>
	@endforeach

	</tbody>
</table>
</div>
@endsection