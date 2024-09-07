@extends('layout.main')

@section('content')
<div class="dashboard-content-one">
    <div class="breadcrumbs-area">
        <h3>Add Teacher</h3>
        <ul>
            <li>
                <a href="{{url('index')}}">Home</a>
            </li>
            <li>Teacher Edit Form</li>
        </ul>
    </div>

    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Edit Teacher</h3>
                </div>
                <div>
                    <button onclick="goBack()" class="fw-btn-fill btn btn-danger" style="padding: 0 30px">Back</button>
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

            <form action="{{ route('update_teacher',$teacher->user_id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Update method for updation in Laravel --}}
                @method('PUT')

                <div class="row">

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>First Name: </label>
                        <input type="text" class="form-control" id="f_name" name="f_name" value="{{ $teacher->f_name }}" required>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Last Name: </label>
                        <input type="text" class="form-control" id="l_name" name="l_name" value="{{ $teacher->l_name }}" required>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="cnic">CNIC: </label>
                        <input type="number" maxlength="13" class="form-control" id="cnic" name="cnic" value="{{ $teacher->cnic }}" required>
                    </div>

                    <div class="col-lg-12 col-12 form-group mt-2">
                        <label class="text-dark-medium">Upload teacher Photo:</label>
                        {{-- <input type="file" class="form-control-file"> --}}
                        <input type="file" class="form-control-file" id="pic" name="pic" value="{{ old('pic') }}">

                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="gender">Gender: </label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="">Please Select Gender</option>
                            <option value="Male" {{ $teacher->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $teacher->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Others" {{ $teacher->gender == 'Others' ? 'selected' : '' }}>Others</option>
                        </select>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="date_of_birth">Date Of Birth: </label>
                            <input type="date" data-position='bottom right' placeholder="dd/mm/yyyy"
                                class="form-control air-datepicker" id="date_of_birth" name="date_of_birth"
                                    value="{{ $teacher->date_of_birth }}" required>
                        
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="blood_group">Blood Group </label>
                        <select class="form-control" id="blood_group" name="blood_group" required>
                            <option value="">Please Select Group </option>
                            <option value="A+" {{ $teacher->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                            <option value="A-" {{ $teacher->blood_group  == 'A-' ? 'selected' : '' }}>A-</option>
                            <option value="B+" {{ $teacher->blood_group  == 'B+' ? 'selected' : '' }}>B+</option>
                            <option value="B-" {{ $teacher->blood_group  == 'B-' ? 'selected' : '' }}>B-</option>
                            <option value="O+" {{ $teacher->blood_group  == 'O+' ? 'selected' : '' }}>O+</option>
                            <option value="O-" {{ $teacher->blood_group  == 'O-' ? 'selected' : '' }}>O-</option>
                            <option value="AB+" {{ $teacher->blood_group  == 'AB+' ? 'selected' : '' }}>AB+</option>
                            <option value="AB-" {{ $teacher->blood_group  == 'AB-' ? 'selected' : '' }}>AB-</option>
                        </select>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="religion">Religion </label>
                        <input type="text" class="form-control" id="religion" name="religion" value="{{ $teacher->religion }}">
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="email">E-Mail:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $teacher->email }}" required>
                    </div>
                    
                    
                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="mob_no">Mobile Number:</label>
                        <input type="text" class="form-control" id="mob_no" name="mob_no" value="{{ $teacher->mob_no  }}" required>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="phone_no">Phone Number: </label>
                        <input type="text" class="form-control" id="phone_no" name="phone_no" value="{{ $teacher->phone_no }}" required>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group mt-3">
                        <label for="salary">Salary: </label>
                        <input type="number" class="form-control" id="salary" name="salary" value="{{ $teacher->salary  }}" required>
                    </div>

                    <div class="col-lg-12 col-12 form-group mt-3">
                        <label for="address">Address:</label>
                        <textarea class="textarea form-control" name="address" id="form-message address" cols="10"
                            rows="9">{{ $teacher->address }}</textarea>
                        
                    </div>

                    <div class="col-lg-12 col-12 form-group my-3">
                        <label class="text-dark-medium">Upload Document Photo:</label>
                        {{-- <input type="file" class="form-control-file"> --}}
                        <input type="file" class="form-control-file" id="doc_pic" name="doc_pic" value="{{ old('doc_pic') }}">

                    </div>

                     <!-- Classes Selection -->
                     <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Select Classes</label>
                        @foreach($classes as $class)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="classes[]" value="{{ $class->id }}" id="class_{{ $class->id }}"
                                {{ $teacher->classes->contains($class->id) ? 'checked' : '' }}>
                                <label class="form-check-label" for="class_{{ $class->id }}">
                                    {{ $class->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <!-- Sections Selection -->
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Select Sections</label>
                        @foreach($sections as $section)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="sections[]" value="{{ $section->id }}" id="section_{{ $section->id }}"
                                {{ $teacher->sections->contains($section->id) ? 'checked' : '' }}>
                                <label class="form-check-label" for="section_{{ $section->id }}">
                                    {{ $section->name }} ({{ $section->classes->name }})
                                </label>
                            </div>
                        @endforeach
                    </div>

                                      
                    <div class="col-12 form-group mg-t-8">
                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
