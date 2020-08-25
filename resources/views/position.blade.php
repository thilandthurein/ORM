@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Add new Position</h1>
        </div>
        <div class="row">
            <form action="position" method="post">
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
                    
                    <label for="position_name">Department Name</label>
                    <select name="id">
                    	@foreach($departments as $department)
                    	<option  value="{{$department->id}}">{{$department->department_name}}</option>

                    	@endforeach
                    </select>
                    
                    <input type="text" class="form-control @error('position_name') is-invalid @enderror" id="position_name" name="position_name" placeholder="Position">
                    
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
        <div class="row">
            <table class="table table-responsive common-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Position Name</th>
                        <th>Department id</th>
                        <th>Created Date</th>
                        <th>Updated Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($positions as $position)
                        <tr>
                            <td>{{ $position->id }}</td>
                            <td>{{ $position->position_name }}</td>
                            
                            <td>{{ $position->department['department_name']}}</td>
                            <td>{{ $position->created_at }}</td>
                            <td>{{ $position->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection