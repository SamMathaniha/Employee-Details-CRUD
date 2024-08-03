@extends('layouts.app')
@section('content')


<div class="container mt-5">
    <h2>Create New Employee</h2>
    <form action="{{ route('employees.store') }}" method="POST" novalidate>
        @csrf

        <!-- Name Field -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name" required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Email Field -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Joining Date Field -->
        <div class="form-group">
            <label for="joining_date">Joining Date</label>
            <input type="date" name="joining_date" class="form-control @error('joining_date') is-invalid @enderror" id="joining_date" required>
            @error('joining_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Salary Field -->
        <div class="form-group">
            <label for="salary">Salary</label>
            <input type="number" name="salary" class="form-control @error('salary') is-invalid @enderror" id="salary" placeholder="Enter salary" required>
            @error('salary')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Is Active Field -->
        <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" id="active" name="is_active">
        <label class="form-check-label" for="active">Active</label>
            @error('is_active')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Employee</button>
    </form>
</div>

@endsection
