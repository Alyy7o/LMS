@extends('layout.main')

@section('content')
<div class="dashboard-content-one">
    <div class="breadcrumbs-area">
        <h3>Add Teacher</h3>
        <ul>
            <li>
                <a href="{{url('index')}}">Home</a>
            </li>
            <li>Teacher Admit Form</li>
        </ul>
    </div>

    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Add New Teacher</h3>
                </div>
                <div>
                    <a class="btn btn-danger btn-lg" href="{{route('all_teachers')}}">All Teachers</a>
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

            <form action="{{ route('store_teacher') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <input type="number" value="{{ auth()->user()->id }}" name="owner_id" hidden>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>First Name: </label>
                        <input type="text" class="form-control" id="f_name" name="f_name" value="{{ old('f_name') }}" required>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Last Name: </label>
                        <input type="text" class="form-control" id="l_name" name="l_name" value="{{ old('l_name') }}" required>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="cnic">CNIC: </label>
                        <input type="number" maxlength="13" class="form-control" id="cnic" name="cnic" value="{{ old('cnic') }}" required>
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
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Others" {{ old('gender') == 'Others' ? 'selected' : '' }}>Others</option>
                        </select>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="date_of_birth">Date Of Birth: </label>
                            <input type="date" data-position='bottom right' placeholder="dd/mm/yyyy" class="form-control air-datepicker" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                        
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
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

                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="religion">Religion </label>
                        <input type="text" class="form-control" id="religion" name="religion" value="{{ old('religion') }}">
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="email">E-Mail:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    
                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="email">Password:</label>
                        <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}" required>
                    </div>
                    
                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="mob_no">Mobile Number:</label>
                        <input type="text" class="form-control" id="mob_no" name="mob_no" value="{{ old('mob_no') }}" required>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group mt-3">
                        <label for="phone_no">Phone Number: </label>
                        <input type="text" class="form-control" id="phone_no" name="phone_no" value="{{ old('phone_no') }}" required>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group mt-3">
                        <label for="salary">Salary: </label>
                        <input type="number" class="form-control" id="salary" name="salary" value="{{ old('salary') }}" required>
                    </div>

                    <div class="col-lg-12 col-12 form-group mt-3">
                        <label for="address">Address:</label>
                        <textarea class="textarea form-control" name="address" id="form-message address" cols="10"
                            rows="9">{{ old('address') }}</textarea>
                        
                    </div>

                    <div class="col-lg-12 col-12 form-group my-3">
                        <label class="text-dark-medium">Upload Document Photo:</label>
                        {{-- <input type="file" class="form-control-file"> --}}
                        <input type="file" class="form-control-file" id="doc_pic" name="doc_pic" value="{{ old('doc_pic') }}">

                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Select Classes</label>
                        @foreach($classes as $class)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="classes[]" value="{{ $class->id }}" id="class_{{ $class->id }}">
                                <label class="form-check-label" for="class_{{ $class->id }}">
                                    {{ $class->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Select Sections</label>
                        @foreach($sections as $section)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="sections[]" value="{{ $section->id }}" id="section_{{ $section->id }}">
                                <label class="form-check-label" for="section_{{ $section->id }}">
                                    {{ $section->name }}({{ $section->classes->name }})
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
