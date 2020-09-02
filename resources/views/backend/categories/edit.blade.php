@extends('backendtemplate')
@section('content')
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Categories Edit Form</h1>
	</div>
</div>
<div class="container">
<div class="row">
	<div class="col-md-12">
		<form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')
 
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-5">
      <input type="text" name="name" class="form-control" id="inputPassword3" value="{{$category->name}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Photo</label>
    <div class="col-sm-5">
      <input type="file" name="photo" id="inputPassword3" >
      <img src="{{asset($category->photo)}}" class="img-fluid w-25">
      <input type="hidden" name="oldphoto" value="{{$category->photo}}">
    </div>
  </div>
  
  <div class="form-group row">
    <div class="col-sm-5">
      <button type="submit" class="btn btn-danger">Update</button>
    </div>
  </div>
</form>
	</div>
</div>
			
</div>
		
@endsection