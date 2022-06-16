@extends('admin.master')

@section('content')

<div class='container'>
<h><b>Leaves Type List</b></h>
</div>

<br>

<!--temporary success message start-->
@if(session()->has('msg'))
<p class="alert alert-success">{{session()->get('msg')}}</p>
@endif
<!--temporary success message end-->



<table class="table table-bordered table-striped">
  <thead>
    <tr style='background-color:#00ffff'>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Days Per year</th>
      <th scope="col">Status</th>
      @if(auth()->user()->role=='admin')
      <th scope="col">action</th>
      @endif
    </tr>
  </thead>
  <tbody>
  @foreach($leaves_types as $key=>$leaves_type)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$leaves_type->name}}</td>
      <td>{{$leaves_type->description}}</td>
      <td>{{$leaves_type->credit}}</td>
      <td>{{$leaves_type->status}}</td>

      @if(auth()->user()->role=='admin')
      <td>
        <a href="{{route('admin.leaves-type.edit',$leaves_type->id)}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M16.757 3l-2 2H5v14h14V9.243l2-2V20a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12.757zm3.728-.9L21.9 3.516l-9.192 9.192-1.412.003-.002-1.417L20.485 2.1z" fill="rgba(230,126,34,1)"/></svg></a>
    <a href="{{route('admin.leaves-type.delete',$leaves_type->id)}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M7 4V2h10v2h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5zM6 6v14h12V6H6zm3 3h2v8H9V9zm4 0h2v8h-2V9z" fill="rgba(231,76,60,1)"/></svg></a>
      </td>
      @endif

    </tr>
    @endforeach
  </tbody>
</table>

@endsection