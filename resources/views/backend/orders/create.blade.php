@extends('backendtemplate')
@section('content')
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Item Create Form</h1>
	</div>
</div>
<div class="container">
<div class="row">
	<div class="col-md-12">
		<form action="{{route('items.store')}}" method="post" enctype="multipart/form-data">
			@csrf
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Code NO</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="codeno">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-5">
      <input type="text" name="name" class="form-control" id="inputPassword3">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Photo</label>
    <div class="col-sm-5">
      <input type="file" name="photo" id="inputPassword3">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-5">
      <input type="number" name="price" class="form-control" id="inputPassword3">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Discount</label>
    <div class="col-sm-5">
      <input type="number" name="discount" class="form-control" id="inputPassword3" value="0">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-5">
      <input type="textarea" name="description" class="form-control" id="inputPassword3">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2">Brand</label>
  	<select class="form-control-md" id="" name="brand">
  		<optgroup label="Choose Brand">
  			@foreach($brands as $brand)
  			<option value="{{$brand->id}}">{{$brand->name}}</option>
  			@endforeach
  		</optgroup>
  	</select>
  	{{-- <span class="text-danger">{{$errors->first('brand')}}</span> --}}
  </div>

  <div class="form-group">
    <label class="col-sm-2">Subcategory</label>
  	<select class="form-control-md" id="" name="subcategory">
  		<optgroup label="Choose Subcategory">
  			@foreach($subcategories as $subcategory)
  			<option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
  			@endforeach
  		</optgroup>
  	</select>
  	{{-- <span class="text-danger">{{$errors->first('subcategory')}}</span> --}}
  </div>
  
  
  <div class="form-group row">
    <div class="col-sm-5">
      <button type="submit" class="btn btn-danger">Create</button>
    </div>
  </div>
</form>
	</div>
</div>
			
</div>
		
@endsection