@extends('layout.main')

@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Owners</h3>
        <ul>
            <li>
                <a href="{{url('super_admin/dashboard')}}">Home</a>
            </li>
            <li>Edit Owner</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->

    @if (session('success'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Success:">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
                <div class="px-3 pt-1">

                    {{ session('success') }}
                </div>
            </div>
        @endif

    <!-- Admit Form Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Edit Owner</h3>
                </div>
                <div>
                    <button onclick="goBack()" class="fw-btn-fill btn btn-danger" style="padding: 0 30px">Back</button>
                </div>

                @if (Auth::user()->role == 'superadmin')
                    
                <div>
                    <a class="btn btn-danger btn-lg" href="{{route('all_owners')}}">All Owners</a>
                </div> 
                
                @endif

            </div>

             @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('update_owner',$owner->user_id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Update method for updation in Laravel --}}
            @method('PUT')
            
            <div class="row">

                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                            <label>Name: </label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $owner->name }}" required>
                        </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Email: </label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $owner->email }}" required>
                    </div>  

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Password: </label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Update Password">
                    </div>  

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label class="text-dark-medium">Logo: </label>
                        {{-- <input type="file" class="form-control-file"> --}}
                        <input type="file" class="form-control-file" id="logo" name="logo" value="{{ old('logo') }}">
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Telephone Number: </label>
                        <input type="text" class="form-control" id="tele_no" name="tele_no" value="{{ $owner->tele_no }}" required>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Mobile  Number: </label>
                        <input type="text" class="form-control" id="mob_no" name="mob_no" value="{{ $owner->mob_no }}" required>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>School Name: </label>
                        <input type="text" class="form-control" id="school_name" name="school_name" value="{{ $owner->school_name }}" required>
                    </div>

                    <div class="col-lg-12 col-12 form-group mt-3">
                        <label for="about">Address:</label>
                        <textarea class="textarea form-control" name="address" id="form-message address" cols="10"
                            rows="9">{{ $owner->address }}</textarea>
                    </div>

                    <div class="col-lg-12 col-12 form-group mt-3">
                        <label for="about">Short Description:</label>
                        <textarea class="textarea form-control" name="description" id="form-message description" cols="10"
                            rows="9">{{ $owner->description }}</textarea>
                    </div>



                    <div class="col-12 form-group mg-t-8">
                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection