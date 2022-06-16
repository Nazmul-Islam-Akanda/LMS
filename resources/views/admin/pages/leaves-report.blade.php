@extends('admin.master')
    @section('content')
        
            <h1>Reports</h1> 
            <br>

            
       

    <form action="{{route('admin.leaves.report')}}"  method="GET" style="text-align:center;">

      <div class="row" >

        <div class="col-4 mt-3" >
          <label for="fromdate" class="form-label"><h5>From</h5></label>
          <input name="fromdate" type="date" class="form-control" id="fromdate" >
        </div>

        <div class="col-4 mt-3">
          <label for="todate" class="form-label"><h5>To</h5></label>
          <input name="todate" type="date" class="form-control" id="todate" >
        </div>
          
          <div class="col-3 mt-5 pt-2">
              <button  type="submit" class="btn btn-success btn-sm">Search</button>
          </div>
      </div>
    </form>




<div id="ReportPrint">
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
      <th scope="col">Feedback</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($reports as $key=>$item)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->e_id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->leaveType->name ?? ""}}</td>
                        <td>{{$item->start_date}}</td>
                        <td>{{$item->end_date}}</td>
                        <td>{{$item->days}}</td>
                        <td>{{$item->reason}}</td>
                        <td>{{$item->feedback}}</td>
                        <td>{{$item->status}}</td>

                    
                        @endforeach 
  </tbody>
</table>
</div>




<button class="btn btn-primary m-3" type="submit" onClick="PrintDiv('ReportPrint');" value="Print">Print</button>


@endsection

    
<script language="javascript">
  function PrintDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
  }
  </script>