@php
use App\Models\Leaves;

$lv='';
@endphp

@extends('admin.master')

@section('content')
<div class="container">

 <div >
 <h1>Employee Available Leave <a href="{{route('admin.leaves.list')}}" class="btn" style="background-color:#EFD8AE; border-radius:10px">Back</a></h1>

 


 @foreach($leaves as $key=>$leave)


 @foreach($leaves_types as $leaves_type)

 @if ($lv == $leave->leave_type_name) @break @endif

  @if($leaves_type->name == $leave->leaveType->name  && $leave1->leaveType->name == $leave->leaveType->name)

  @php
 
  $sum=Leaves::where('status','Approved')->where('email',$leave1->email)->where('leave_type_name',$leave->leave_type_name)->sum('days');
  $diff=$leaves_type->credit - $sum;

  $lv=$leave->leave_type_name;
  @endphp
  
  <p> <b>Employee ID: </b> {{$leave->e_id}} </p>
      <p> <b>Employee Name: </b> {{$leave->name}} </p>
      <p> <b>Employee Email: </b> {{$leave->email}} </p>
      <p> <b>Leave Type: </b> {{$leave->leaveType->name}} </p>
      <p> <b>Taken Leave: </b> {{$sum}} </p>
      <p> <b>Remain Leave: </b> {{$diff}} </p> 
<br>

      @endif

      
      
    @endforeach
    
    @endforeach

 </div>

      

</div>
     


    
@endsection