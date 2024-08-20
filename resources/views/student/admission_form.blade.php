@extends('layout.main')

@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Students</h3>
        <ul>
            <li>
                <a href="{{url('index')}}">Home</a>
            </li>
            <li>Student Admit Form</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Admit Form Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Add New Students</h3>
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
        <form action="{{ route('store_students') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>First Name </label>
                        <input type="text" class="form-control" id="f_name" name="f_name" value="{{ old('f_name') }}" required>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Last Name </label>
                        <input type="text" class="form-control" id="l_name" name="l_name" value="{{ old('l_name') }}" required>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label for="gender">Parent </label>
                        <select id="parent_id" name="parent_id" class="js-states form-control">
                            <option value="">Select Parent</option>
                            @foreach ($parents as $parent)      
                            <option value="{{ $parent->id }} {{ old('parent_id') == ' $parent->reg_no ' ? 'selected' : '' }}"> {{ $parent->reg_no }} </option>
                            @endforeach
                            
                          </select>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label for="gender">Gender </label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="">Please Select Gender</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Others" {{ old('gender') == 'Others' ? 'selected' : '' }}>Others</option>
                        </select>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group mt-3">
                        <label for="date_of_birth">Date Of Birth </label>
                            <input type="date" data-position='bottom right' placeholder="dd/mm/yyyy" class="form-control air-datepicker" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                        
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group mt-3">
                        <label for="roll">Roll </label>
                        <input type="number" class="form-control" id="roll" name="roll" value="{{ old('roll') }}" required>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group mt-3">
                        <label for="blood_group">Blood Group </label>
                        <select class="form-control" id="blood_group" name="blood_group" required>
                            <option value="">Please Select Group </option>
                            <option value="A+" {{ old('blood_group') == 'A+' ? 'selected' : '' }}>A+</option>
                            <option value="A-" {{ old('blood_group') == 'A-' ? 'selected' : '' }}>A-</option>
                            <option value="B+" {{ old('blood_group') == 'B+' ? 'selected' : '' }}>B+</option>
                            <option value="B-" {{ old('blood_group') == 'B-' ? 'selected' : '' }}>B-</option>
                            <option value="O+" {{ old('blood_group') == 'O+' ? 'selected' : '' }}>O+</option>
                            <option value="O-" {{ old('blood_group') == 'O-' ? 'selected' : '' }}>O-</option>
                            <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected' : '' }}>AB+</option>
                            <option value="AB-" {{ old('blood_group') == 'AB-' ? 'selected' : '' }}>AB-</option>
                        </select>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group mt-3">
                        <label for="religion">Religion </label>
                        <input type="text" class="form-control" id="religion" name="religion" value="{{ old('religion') }}">
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group mt-3">
                        <label for="email">E-Mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group mt-3">
                        <label>Class </label>
                        <select class="form-control class_id" id="class-dd" name="class_id">
                            <option value="">Please Select Class</option>
                        <!-- Options for classes -->
                        @foreach($classes as $class)
                            <option value="{{ $class->id }} {{ old('class-dd') == '$class->name' ? 'selected' : '' }}">{{ $class->name }}</option>
                        @endforeach
                    </select>

                        
                    </div>
                   
                    <div class="col-xl-3 col-lg-6 col-12 form-group mt-3">
                        <label>Section </label>
                        <select id="section-dd" name="section_id" class="form-control section_id">
                            <option value="">Please Select Section</option>
                        </select>
                    </div>

                    
                    <div class="col-xl-3 col-lg-6 col-12 form-group mt-3">
                        <label for="admission_id">Admission ID</label>
                        <input type="number" class="form-control" id="admission_id" name="admission_id" value="{{ old('admission_id') }}" required>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group mt-3">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                    </div>
                    <div class="col-lg-6 col-12 form-group mt-3">
                        <label for="about">Short BIO</label>
                        <textarea class="textarea form-control" name="about" id="form-message about" cols="10"
                            rows="9">{{ old('about') }}</textarea>
                        
                    </div>

                    <div class="col-lg-6 col-12 form-group mg-t-30">
                        <label class="text-dark-medium">Upload Student Photo (150px X 150px)</label>
                        {{-- <input type="file" class="form-control-file"> --}}
                        <input type="file" class="form-control-file" id="pic" name="pic" value="{{ old('pic') }}">

                    </div>

                    <div class="col-12 form-group mg-t-8">
                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                        {{-- <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection