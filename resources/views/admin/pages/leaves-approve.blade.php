@extends('admin.master')

@section('content')

<div class='container'>
<h><b>Leaves Approval</b></h>
</div>

<!--temporary success message start-->
@if(session()->has('msg'))
<p class="alert alert-success">{{session()->get('msg')}}</p>
@endif
<!--temporary success message end-->


<table class="table table-bordered table-striped">
  <thead>
    <tr style='background-color:#00ffff'>
      <th scope="col">#</th>
      <th scope="col">Employee ID</th>
      <th scope="col">Employee Name</th>
      <th scope="col">Employee Email</th>
      <th scope="col">Leave Type</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      <th scope="col">Days</th>
      <th scope="col">Reason</th>
      <th scope="col">Status</th>

      @if(auth()->user()->role=='admin')
      <th scope="col">Approval</th>
      @endif

    </tr>
    
  </thead>
  <tbody>
  @foreach($leaves as $key=>$leave)
    <tr>
    @if(auth()->user()->email==$leave->email || auth()->user()->role=='admin')
      <td>{{$key+1}}</td>
      <td>{{$leave->e_id}}</td>
      <td>{{$leave->name}}</td>
      <td>{{$leave->email}}</td>
      <td>{{$leave->leaveType->name ?? ""}}</td>
      <td>{{$leave->start_date}}</td>
      <td>{{$leave->end_date}}</td>
      <td>{{$leave->days}}</td>
      <td>{{$leave->reason}}</td>
      <td>{{$leave->status}}</td>
    
      @if(auth()->user()->role=='admin')
      <td>
      <a href="{{route('admin.leaves.aprrove.give',$leave->id)}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-2 2H5v14h14V9.243l2-2V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z" fill="rgba(230,126,34,1)"/></svg>Approval</a>
      </td>
      @endif
    

    @endif
  </tr>
    @endforeach
  </tbody>
</table>

@endsection