@extends('layouts.master')
@extends('layouts.style')

@section('content')
@if($errors->any())
<div class="alert alert-danger">
 <ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif
<style>
        .container{
            padding:0.5%;
        }
    </style>
<div class="container">
<h2 class="alert alert-dark text-center " style="color:red; text:bold"><span class="fab fa-laravel"> LARAVEL 6.0 ADVANCE CRUD APPLICATION WITH IMAGE UPLOAD</span></h2>
<br>
<h2 class="alert alert-success " > EDIT EMPLOYEE #{{$data->id}} <span class="fa fa-user" style="float:right"> {{$data->first_name}}  {{$data->last_name}}</span> </h2>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

<form method="post" action="{{ route('employee.update', $data->id) }}" enctype="multipart/form-data">
@csrf
@method('PUT')
<!-- Extended default form grid -->
<form>
  <!-- Grid row -->
  <div class="form-row">
    <!-- Default input -->
    <div class="form-group col-md-6">
      <input mdbInput type="text" class="form-control" name="first_name" id="first_name" value="{{ $data->first_name }}" placeholder="First Name">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <input mdbInput type="text" class="form-control" name="last_name" id="last_name" value="{{ $data->last_name }}" placeholder="Last Name">
    </div>

  <!-- Default input -->
  <div class="form-group col-md-6">
    <input mdbInput type="text" class="form-control" name="gender" id="gender" value="{{ $data->gender}}" placeholder="Gender">
  </div>
  <!-- Default input -->
  <div class="form-group col-md-6">
    <input mdbInput type="email" class="form-control" name="email" id="email" value="{{ $data->email }}" placeholder="Email">
  </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <input mdbInput type="text" class="form-control" name="phone" id="phone" value="{{ $data->phone }}" placeholder="(+) Phone">
    </div>
    <div class="row">
    <div class="form-group col-md-4">
        <input type="file" name="image" id="image" class="form-control">
        </div>
    <div class="form-group col-md-3">
        <img src="{{ URL::to('/') }}/images/{{ $data->image }}" class="rounded-circle" width="60" />
        <input type="hidden" name="hidden_image" value="{{ $data->image }}" />
    </div>
    </div>
  </div>
  <!-- Grid row -->
 <a href="{{ route('employee.index') }}" class="btn btn-warning">Cancel</a>
 <button type="submit"  name="add" class="btn btn-info input-lg">Create Employee</button>
</form>
<!-- Extended default form grid -->
</div>
 </div>
</form>
</div>
</div>
</div>

@endsection

@section('scripts')

<script>
 //---------------------Browse image----------------
 $('#browse_file').on('click',function(){
                            $('#image').click();                 
                        })
                        $('#image').on('change', function(e){
                            showFile(this, '#showImage');
                        })

</script>

@endsection