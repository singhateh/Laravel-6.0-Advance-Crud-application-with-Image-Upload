@extends('layouts.master')
@section('content')

<style>
        .container{
            padding:0.5%;
        }
    </style>
<div class="container">
<h2 class="alert alert-dark text-center " style="color:red; text:bold"><span class="fab fa-laravel"> LARAVEL 6.0 ADVANCE CRUD APPLICATION WITH IMAGE UPLOAD</span></h2>

@if($message = Session::get('Success'))
<div class="alert alert-success">
<p align="center">{{$message}}</p>
</div>
@endif

@if($message = Session::get('error'))
<div class="alert alert-danger">
<p align="center">{{$message}}</p>
</div>
@endif

</div>
<div align="right">
 <a href="{{ route('employee.create') }}" class="btn btn-default">
 <span class="fa fa-plus-circle"> Add New Employee</span></a>
</div>
<table class="table table-bordered table-striped bg-dark" style="color:white; border:none">
 <tr class="text-center">
  <th width="10%">Image</th>
  <th >First Name</th>
  <th >Last Name</th>
  <th >Gender</th>
  <th >Email</th>
  <th >Phone</th>
  <th >Action</th>
 </tr>
 @foreach($data as $employee)
 <tbody style="color:black; font:blod; background:#ffff">
  <tr class="text-center">
   <td><img src="{{ URL::to('/') }}/images/{{ $employee->image }}" class="rounded-circle" width="60" height="50" /></td>
   <td>{{ $employee->first_name }}</td>
   <td>{{ $employee->last_name }}</td>
   <td>{{ $employee->gender }}</td>
   <td>{{ $employee->email }}</td>
   <td>{{ $employee->phone }}</td>
   <td width="25%">
   <!-- here is the button action side where you can edit . view and delete the employee record -->
   <form action="{{ route('employee.destroy', $employee->id) }}" method="post">
	<a href="{{ route('employee.show', $employee->id) }}" class="btn btn-sm btn-warning"><span class="fa fa-eye"></span> Show</a>
	<a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-sm btn-info"><span class="fa fa-edit"></span> Edit</a>
	@csrf
	@method('DELETE')
	<button type="submit" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span> Delete</button>
	</form>
                <!-- ends here -->
   </td>
  </tr>
  </tbody>
 @endforeach
</table>
{!! $data->links() !!}
@endsection