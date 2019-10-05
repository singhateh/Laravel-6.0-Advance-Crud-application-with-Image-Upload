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
<h2 class="alert alert-success text-center color:red">WELCOME!! CREATE YOUR NEW EMPLOYEE HERE</h2>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

<form method="post" action="{{ route('employee.store') }}" enctype="multipart/form-data">

 @csrf

<!-- Extended default form grid -->
<form>
  <!-- Grid row -->
  <div class="form-row">
    <!-- Default input -->
    <div class="form-group col-md-6">
      <input mdbInput type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <input mdbInput type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
    </div>

  <!-- Default input -->
  <div class="form-group col-md-6">
    <input mdbInput type="text" class="form-control" name="gender" id="gender" placeholder="Gender">
  </div>
  <!-- Default input -->
  <div class="form-group col-md-6">
    <input mdbInput type="email" class="form-control" name="email" id="email" placeholder="Email">
  </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <input mdbInput type="text" class="form-control" name="phone" id="phone" placeholder="(+) Phone">
    </div>
    <div class="form-group col-md-3">
        <input type="file" name="image" id="image" class="form-control">
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