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
			<td>Voucher No</td>
			<td>User</td>
			<td>Note</td>
			<td>Total</td>
			<td>Action</td>
		</tr>

	</thead>
	<tbody>
		@php $i=1; @endphp
		@foreach($orders as $order)
		<tr>
		<td>{{$order->voucherno}}</td>
		<td>{{$order->user_id}}</td>
		<td>{{$order->note}}</td>
		<td>{{$order->total}}</td>
		<td><a href="{{route('orders.show',$order->id)}}" class="btn btn-success">Detail</a>
		</td>
	</tr>
	@endforeach

	</tbody>
</table>
</div>
@endsection