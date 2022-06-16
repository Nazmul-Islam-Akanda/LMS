@extends('admin.master')

@section('content')

<div class="container">
<h1>Leave Edit</h1>

<div>




<form action="{{route('admin.leaves.update',$leave->id)}}" method="post">
    @method('put')
 @csrf

 <div class="col-md-3">

 
<div class="mb-3">
    <label for="" class="form-label">Employee Name</label>
    <input name="name" value="{{$leave->name}}"  type="string" class="form-control" id="">
  </div>


  <div class="mb-3">
    <label for="" class="form-label">Employee Email</label>
    <input name="email" value="{{$leave->email}}"  type="string" class="form-control" id="">
  </div>


  <div class="mb-3">
<div class="form-group">
            <label for="exampleFormControlSelect1">Leave Type</label>
            <select name="leave_type" class="form-control" id="exampleFormControlSelect1" >
            @foreach ($leaves_types as $leaves_type)
                    <option
                    @if($leaves_type->id==$leave->leave_type_name)
                    selected
                    @endif
                    value="{{$leaves_type->id}}"> {{$leaves_type->name}} </option>
                    @endforeach
            </select>
    </div>
    </diV>



  <!-- <div class="mb-3">
<div class="form-group">
            <label for="exampleFormControlSelect1">Day Type</label>
            <select name="day_type" class="form-control" id="exampleFormControlSelect1">
            <option {{ ($leave->day) == 'Half' ? 'selected' : '' }}  value="Half">Half</option>
            <option {{ ($leave->day) == 'Full' ? 'selected' : '' }}  value="Full">Full</option>
            </select>
    </div>
</div> -->


  <div class="mb-3">
    <label for="" class="form-label">Start Date</label>
    <input name="start_date" value="{{$leave->start_date}}"  type="date" class="form-control" id="">
  </div>


  <div class="mb-3">
    <label for="" class="form-label">End Date</label>
    <input name="end_date" value="{{$leave->end_date}}"  type="date" class="form-control" id="">
  </div>
 

  <!-- <div class="mb-3">
    <label for="" class="form-label">Days</label>
    <input name="days" value="{{$leave->days}}"  type="number" class="form-control" id="">
  </div> -->
  


  <div class="mb-3">
    <label for="" class="form-label">Reason</label>
    <input name="reason" value="{{$leave->reason}}"  type="text" class="form-control" id="">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Feedback</label>
    <input name="feedback" value="{{$leave->feedback}}"  type="text" class="form-control" id="">
  </div>


    <div class="mb-3">
<div class="form-group">
            <label for="exampleFormControlSelect1">Aprroval</label>
            <select name="status" class="form-control" id="exampleFormControlSelect1">
            <option {{ ($leave->status) == 'Hold' ? 'selected' : '' }}  value="Hold">Hold</option>
            <option {{ ($leave->status) == 'Approved' ? 'selected' : '' }}  value="Approved">Approved</option>
            <option {{ ($leave->status) == 'Denied' ? 'selected' : '' }}  value="Denied">Denied</option>
            </select>
    </div>
</div>


    </div>

  

  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>
</div>
</div>



@endsection