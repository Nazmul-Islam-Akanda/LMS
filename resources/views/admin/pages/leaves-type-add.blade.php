@extends('admin.master')

@section('content')

<div class="container">
<h1>Add Leaves Type</h1>

<div>

<!-- error message -->
@if($errors->any())
<div class='alert alert-danger' role="alert">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
<!-- error message -->

<form action="{{route('admin.leaves-type.store')}}" method="post">
 @csrf
  <div class="col-md-3">
  <div class="mb-3">
    <label for="" class="form-label">Leaves Type Name</label>
    <input name="name" placeholder='Enter Leaves Type name' type="text" class="form-control" id="" required>
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Leaves Type Description</label>
    <input name="description" placeholder='Somthing about this leaves' type="text" class="form-control" id="" >
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Leaves Credit Per Year</label>
    <input name="credit" placeholder='Total credit of leaves' type="text" class="form-control" id="" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</div>

</div>

@endsection