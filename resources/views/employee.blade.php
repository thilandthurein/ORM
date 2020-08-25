@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Add new Employee</h1>
        </div>
        <div class="row">
            <form action="employee" method="post">
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

                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                    <label for="position_name">Position Name</label>

                    <select name="id"  class="form-control">
                    	@foreach($positions as $position)
                    	<option  value="{{$position->id}}">{{$position->position_name}}</option>

                    	@endforeach
                    </select>

                    <label for="email" placeholder="example@gmail.com">Email</label>
                    <input type="email" name="email" class="form-control" id="email">

                    <label for="salary" placeholder="Salary">Salary</label>
                    <input type="integer" name="salary" class="form-control" id="salary">
                    
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
        <div class="row">
            <table class="table table-responsive common-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Position_id</th>
                        <th>Email</th>
                        <th>Salary</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->position['position_name']}}</td>
                            <td>{{ $employee->email}}</td>
                            <td>{{ $employee->salary}}</td>
                            <td>{{ $employee->created_at }}</td>
                            <td>{{ $employee->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
@endsection