@extends('backendtemplate')
@section('content')

<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Order Detail List</h1>
  </div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
   Voucherno : {{$order->voucherno}}
  </div>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    Order_date : {{$order->created_at}}
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered">
      <thead class="thead-dark bg-success">
    <tr>
      <td>No</td>
      <td>Item Name</td>
      <td>Price</td>
      <td>Qty</td>
      <td>Subtotal</td>
    </tr>

  </thead>
  <tbody>
    @php $i=1; $total=0 @endphp
    @foreach($order->items as $row)
    @php
    $subtotal= $row->price*$row->pivot->qty;
    $total+=$subtotal;
    @endphp
    <tr>
      <td>{{$i++}}</td>
      <td>{{$row->name}}</td>
      <td>{{$row->price}}</td>
      <td>{{$row->pivot->qty}}</td>
      <td>{{$subtotal}}</td>
      
  </tr>
  @endforeach
  <tr>
    <td colspan="4">Total</td>
    <td>{{$total}}MMK</td>
  </tbody>
</table>
</div>
@endsection