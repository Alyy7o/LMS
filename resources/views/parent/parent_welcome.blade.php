@extends('layout.main')

@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Parent</h3>
        <ul>
            <li>
                <a href="{{url('parent_welcome')}}">Home</a>
            </li>
            <li>Parent Welcome</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Student Details Area Start Here -->
    <div class="card height-auto">
        <div class="card-header">Welcome, {{ Auth::user()->name }}!</div>

        <div class="card-body">
            <p>You have successfully logged in as a parent.</p>
            <p>Here you can manage your child’s progress, check fees, and communicate with the teachers.</p>

            <div class="btn-group mt-3">
                {{-- <a href="{{ route('parent.dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
                <a href="{{ route('parent.courses') }}" class="btn btn-secondary">View Courses</a>
                <a href="{{ route('parent.profile') }}" class="btn btn-info">Update Profile</a> --}}
            </div>
        </div>
    </div>
    
@endsection