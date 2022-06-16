@extends('admin.master')

@section('content')

<div class="container">
<h1>Apply for leave</h1>

<div>

<!--temporary success message start-->
@if(session()->has('msg'))
<p class="alert alert-success">{{session()->get('msg')}}</p>
@endif
<!--temporary success message end-->


<form action="{{route('admin.leaves.store')}}" method="post">
 @csrf

 <div class="col-md-3">
  <div class="mb-3">
    <label for="" class="form-label">Employee ID</label>
    <input name="id" value="{{auth()->user()->id}}" placeholder='Enter your name' type="text" class="form-control" id="" required>
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Employee Name</label>
    <input name="name" value="{{auth()->user()->name}}" placeholder='Enter your name' type="text" class="form-control" id="" required>
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Employee Email</label>
    <input name="email" value="{{auth()->user()->email}}" placeholder='Enter your Email' type="text" class="form-control" id="" required>
  </div>


  <div class="form-group">
            <label for="exampleFormControlSelect1">Leave type</label>
            <select name="leave_type" class="form-control" id="exampleFormControlSelect1">
                @foreach ($leaves_types as $leaves_type)
                    <option value="{{$leaves_type->id}}">{{$leaves_type->name}}</option>
                    @endforeach
            </select>
    </div>

  <!-- <div class="form-group">
            <label for="exampleFormControlSelect1">Day Type</label>
            <select name="day_type" class="form-control" id="exampleFormControlSelect1">
               
                    <option>Half</option>
                    <option>Full</option>
                    
            </select>
    </div> -->


 
  <div class="mb-3">
    <label for="" class="form-label">Start Date</label>
    <input name="start_date" placeholder='' type="date" class="form-control" id="" required>
  </div>
  

  
  <div class="mb-3">
    <label for="" class="form-label">End Date</label>
    <input name="end_date" placeholder='' type="date" class="form-control" id="" required>
  </div>
 

  
  <!-- <div class="mb-3">
    <label for="" class="form-label">Days</label>
    <input name="days" placeholder='Give Total Days of Leave You Need' type="number" class="form-control" id="" required>
  </div> -->
 

  </div>


 
  <div class="mb-3">
    <label for="" class="form-label">Reason</label>
    <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8 col-8">
<div class="form-group">
<textarea name="reason" class="form-control"></textarea>
</div>
</div>
</div>
  

  <button type="submit" class="btn btn-primary">Apply</button>
  
</form>
</div>
</div>



@endsection