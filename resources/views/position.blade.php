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
            <div class="col-md-6">
                <form action="{{ route('positionfile-import') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                    <div class="custom-file text-left">
                    <input type="file" name="file" id="customFile">
                    <label class="" for="customFile"></label>
                    </div>
                    </div>
                    <button class="btn btn-primary">Import data</button>
                </form>
            </div> 
        </div>
        <div class="row">
            <div style="text-align: right;">
            <a class="btn btn-success" href="{{ route('positionexcel-export')}}">Export data</a>
             <a class="btn btn-success" href="{{ route('positioncsv-export')}}">Export data csv</a>
             <a class="btn btn-primary" href="{{ URL::to('/employee/pdf/position') }}">Export to PDF</a>
            </div>
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