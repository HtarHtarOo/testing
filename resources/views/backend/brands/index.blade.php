@extends('backendtemplate')
@section('content')

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Brand List</h1>
		<a href="{{route('brands.create')}}" class="btn btn-dark">Add New</a>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered">
			<thead class="thead-dark">
		<tr>
			<td>No</td>
			{{-- <td>Codeno</td> --}}
			<td>Name</td>
			<td>Action</td>
		</tr>

	</thead>
	<tbody>
		@php $i=1; @endphp
		@foreach($brands as $brand)
		<tr>
		<td>{{$i++}}</td>
		<td>{{$brand->name}}</td>
		<td><a href="" class="btn btn-success">Detail</a>
		<a href="{{route('brands.edit',$brand->id)}}" class="btn btn-secondary">Edit</a>
		<a href="" class="btn btn-danger">Delete</a></td>
	</tr>
	@endforeach

	</tbody>
</table>
</div>
@endsection