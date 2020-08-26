<!DOCTYPE html>
<html>
 <head>
 	<meta charset="utf-8">
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initialscale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>PDF Demo in Laravel 7</title>
 <link rel="stylesheet"
href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.m
in.css">
 </head>
 <body>
 <table class="table table-bordered">
 <thead>
 <tr class="table-danger">
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
 </body>
</html>
