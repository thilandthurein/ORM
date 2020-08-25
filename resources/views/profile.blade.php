@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Add new Employee Profile</h1>
        </div>
        <div class="row">
            <form action="profile" method="post">
                @csrf


                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Please fix the following errors
                    </div>
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif


                <div class="form-group">
                    
                    <label for="employee_id">Employee Name</label>
                    <select name="id" class="form-control">
                        @foreach($employees as $employee)
                        <option  value="{{$employee->id}}" >{{$employee->name}}</option>
                        @endforeach
                    </select>
                    
                    <label for="age" placeholder="enter your age">Age</label>
                    <input type="integer" name="age" class="form-control" id="age">

                    <label for="height" placeholder="Height">Height</label>
                    <input type="float" name="height" class="form-control" id="height">

                    <label for="father_name">Father Name</label>
                    <input type="text" name="father_name" class="form-control" id="father_name">
                    
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
        <div class="row">
            <table class="table table-responsive common-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Employee Id</th>
                        <th>Age</th>
                        <th>Height</th>
                        <th>Father Name</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td><a href="{{url('/profile',$profile->id)}}">{{ $profile->id }}</a></td>
                            <td>{{ $profile->employee['name']}}</td>
                            <td>{{ $profile->age}}</td>
                            <td>{{ $profile->height}}</td>
                            <td>{{ $profile->father_name}}</td>
                            <td>{{ $profile->created_at }}</td>
                            <td>{{ $profile->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection