@extends('layouts.app')
@section('content') 
<h1>Employee Details</h1>
<form>
@foreach($profiles as $profile)
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $profile->employee['name']}}">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Age</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="" value="{{$profile->age}}">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Height</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="" value="{{$profile->height}}">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Father Name</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="" value="{{$profile->father_name}}">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Postition Id</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="" value="{{$profile->employee['position_id']}}">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="" value="{{$profile->employee['email']}}">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Salary</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="" value="{{$profile->employee['salary']}}">
    </div>
  </div>
@endforeach
</form>
@endsection