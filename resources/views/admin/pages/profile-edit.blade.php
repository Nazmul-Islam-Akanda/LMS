@extends('admin.master')

@section('content')

<div class="container">
<h1>Welcome to your profile</h1>

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


<!--temporary success message start-->
@if(session()->has('msg'))
<p class="alert alert-success">{{session()->get('msg')}}</p>
@endif
<!--temporary success message end-->


<form action="{{route('profile.update',$user->id)}}" method="post" enctype="multipart/form-data">
    @method('put')
 @csrf


 <p>  <img src="{{url('/uploads/'.$user->image)}}" width='100px'></p>

 <p> <b>Employee ID:</b> {{$user->id}} </p>



  <div class="col-md-3">
  <div class="mb-3">
    <label for="" class="form-label">Name</label>
    <input name="name" value="{{$user->name}}" placeholder='Enter your name' type="text" class="form-control" id="" required>
  </div>
 





  <div class="mb-3">
    <label for="" class="form-label">Date of Birth</label>
    <input name="dob" value="{{$user->dob}}" placeholder='' type="date" class="form-control" id="" required>
  </div>


 
  <div class="mb-3">
    <label for="" class="form-label">Contact no.</label>
    <input name="contact" value="0{{$user->contact}}" placeholder='Phone number' type="text" class="form-control" id="" required>
  </div>
  

  
  <div class="mb-3">
    <label for="" class="form-label">Address</label>
    <input name="address" value="{{$user->address}}" placeholder='Enter employee address' type="text" class="form-control" id="" required>
  </div>
 

  
  <div class="mb-3">
    <label for="" class="form-label">Email</label>
    <input name="email" value="{{$user->email}}" placeholder='Give employee email' type="text" class="form-control" id="" required>
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Password:</label>
    <input name="password" placeholder='This Password will be reset' type="password" class="form-control" id="" required>
  </div>

  
  <div class="mb-3">
    <label for="" class="form-label">Image</label>
    <input name="image" placeholder='' type="file" class="form-control" id="" >
  </div>
  

  <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>
</div>
</div>



@endsection