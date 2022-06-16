@extends('admin.master')

@section('content')
<div class="container">

 <div id="divToPrint">
 <h1>Employee Leave Details</h1>

 <p> <b>Employee ID: </b> {{$leave->e_id}} </p>
      <p> <b>Employee Name: </b> {{$leave->name}} </p>
      <p> <b>Employee Email: </b> {{$leave->email}} </p>
      <p> <b>Leave Type: </b> {{$leave->leaveType->name}} </p>
      <p> <b>Start Date: </b> {{$leave->start_date}} </p>
      <p> <b>End Date: </b> {{$leave->end_date}} </p> 
      <p> <b>Days: </b> {{$leave->days}}</p>
      <p> <b>Reason: </b> {{$leave->reason}}</p>
      <p> <b>Feedback: </b>{{$leave->feedback}} </p>
      <p> <b>Status: </b> {{$leave->status}}</p>

 </div>

 
      <a onClick="PrintDiv('divToPrint')" value="Print" class="btn" style="background-color:#FDB748; border-radius:10px">Print</a>
      &nbsp;
      <a href="{{route('admin.leaves.list')}}" class="btn" style="background-color:#EFD8AE; border-radius:10px">Back</a>

</div>
     


      <script language="javascript">
    function PrintDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
@endsection