@extends('admin.master')

@section('content')

<div class="container">
<h1>Approval for leave</h1>

<div>




<form action="{{route('admin.leaves.approve.store',$leave->id)}}" method="post">
    @method('put')
 @csrf

 <div class="col-md-3">

 <div class="mb-3">
  <p><b>Employee ID: </b>{{$leave->e_id}}</p>
  </div>


 <div class="mb-3">
  <p><b>Employee Name: </b>{{$leave->name}}</p>
  </div>

  <div class="mb-3">
  <p><b>Employee Email: </b>{{$leave->email}}</p>   
  </div>

  <div class="mb-3">
  <p><b>Leave Type: </b>{{$leave->leaveType->name}}</p>   
  </div>


  <div class="mb-3">
  <p><b>Start Date: </b>{{$leave->start_date}}</p>
  </div>

  <div class="mb-3">
  <p><b>End Date: </b>{{$leave->end_date}}</p>
  </div>
 
  <div class="mb-3">
  <p><b>Days: </b>{{$leave->days}}</p>
  </div>
  
  <div class="mb-3">
  <p><b>Reason: </b>{{$leave->reason}}</p>
  </div>

  <div class="mb-3">
  <div class="form-group">
            <label for="exampleFormControlSelect1">Aprroval</label>
            <select name="approval" class="form-control" id="exampleFormControlSelect1">
               
                    <option>Approved</option>
                    <option>Denied</option>
                    
            </select>
    </div>
    </div>


    </div>

    <div class="mb-3">
    <label for="" class="form-label">Feedback</label>
    <div class="col-md-8 col-xs-8 col-sm-8 col-lg-8 col-8">
<div class="form-group">
<textarea name="feedback" class="form-control"></textarea>
</div>
</div>
</div>
  

  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>
</div>
</div>



@endsection