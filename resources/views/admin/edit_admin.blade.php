@extends('layout.main')

@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Admins</h3>
        <ul>
            <li>
                <a href="{{url('index')}}">Home</a>
            </li>
            <li>Admins Edit Form</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Admit Form Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Edit Admin</h3>
                </div>
                
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
        <form action="{{ route('update_admin',$admin->user_id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Update method for updation in Laravel --}}
            @method('PUT')

                <div class="row">

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>First Name: </label>
                        <input type="text" class="form-control" id="f_name" name="f_name" value="{{ $admin->f_name }}" required>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Last Name: </label>
                        <input type="text" class="form-control" id="l_name" name="l_name" value="{{ $admin->l_name }}" required>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="cnic">CNIC: </label>
                        <input type="number" maxlength="13" class="form-control" id="cnic" name="cnic" value="{{ $admin->cnic }}" required>
                    </div>

                    <div class="col-lg-12 col-12 form-group mt-2">
                        <label class="text-dark-medium">Upload Admin Photo:</label>
                        {{-- <input type="file" class="form-control-file"> --}}
                        <input type="file" class="form-control-file" id="pic" name="pic" value="{{ old('pic') }}">

                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="gender">Gender: </label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="">Please Select Gender</option>
                            <option value="Male" {{ $admin->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $admin->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Others" {{ $admin->gender == 'Others' ? 'selected' : '' }}>Others</option>
                        </select>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="date_of_birth">Date Of Birth: </label>
                            <input type="date" data-position='bottom right' placeholder="dd/mm/yyyy" class="form-control air-datepicker" id="date_of_birth" name="date_of_birth" value="{{ $admin->date_of_birth }}" required>
                        
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="blood_group">Blood Group </label>
                        <select class="form-control" id="blood_group" name="blood_group" required>
                            <option value="">Please Select Group </option>
                            <option value="A+" {{ $admin->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                            <option value="A-" {{ $admin->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
                            <option value="B+" {{ $admin->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                            <option value="B-" {{ $admin->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
                            <option value="O+" {{ $admin->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
                            <option value="O-" {{ $admin->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
                            <option value="AB+" {{ $admin->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
                            <option value="AB-" {{ $admin->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
                        </select>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="religion">Religion </label>
                        <input type="text" class="form-control" id="religion" name="religion" value="{{ $admin->religion }}">
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="email">E-Mail:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}" required>
                    </div>
                    
                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="mob_no">Mobile Number:</label>
                        <input type="text" class="form-control" id="mob_no" name="mob_no" value="{{ $admin->mob_no }}" required>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="phone_no">Phone Number: </label>
                        <input type="text" class="form-control" id="phone_no" name="phone_no" value="{{ $admin->phone_no }}" required>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group mt-3">
                        <label for="salary">Salary: </label>
                        <input type="number" class="form-control" id="salary" name="salary" value="{{ $admin->salary }}" required>
                    </div>

                    <div class="col-lg-12 col-12 form-group mt-3">
                        <label for="address">Address:</label>
                        <textarea class="textarea form-control" name="address" id="form-message address" cols="10"
                            rows="9">{{ $admin->address }}</textarea>
                        
                    </div>

                    <div class="col-lg-12 col-12 form-group my-3">
                        <label class="text-dark-medium">Upload Document Photo:</label>
                        {{-- <input type="file" class="form-control-file"> --}}
                        <input type="file" class="form-control-file" id="doc_pic" name="doc_pic" value="{{ old('doc_pic') }}">

                    </div>

                    <div class="col-12 form-group mg-t-20">
                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                        {{-- <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection