@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2>Edit Employee</h2>
    <form action="update.php" method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$employee->name}}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$employee->email}}">
        </div>
        <div class="form-group">
            <label for="joining_date">Joining Date:</label>
            <input type="date" class="form-control" id="joining_date" name="joining_date" value="{{$employee->joining_date}}">
        </div>
        <div class="form-group">
            <label for="salary">Salary:</label>
            <input type="text" class="form-control" id="salary" name="salary" value="{{$employee->salary}}">
        </div>
        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="active" name="is_active" value="1" {{$employee->is_active == '1' ? 'checked' : ''}}>
                <label class="form-check-label" for="active">Active</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
