@extends('backendtemplate')
@section('content')
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Subcategories Create Form</h1>
	</div>
</div>
<div class="container">
<div class="row">
	<div class="col-md-12">
		<form action="{{route('subcategories.store')}}" method="post" enctype="multipart/form-data">
			@csrf
  
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-5">
      <input type="text" name="name" class="form-control" id="inputPassword3">
    </div>
  </div>
  

  <div class="form-group">
    <label class="col-sm-2">Category</label>
  	<select class="form-control-md" id="" name="category">
  		<optgroup label="Choose category">
  			@foreach($categories as $category)
  			<option value="{{$category->id}}">{{$category->name}}</option>
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