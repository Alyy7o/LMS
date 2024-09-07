@extends('layout.main')

@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Parents</h3>
        <ul>
            <li>
                <a href="{{url('index')}}">Home</a>
            </li>
            <li>Parent Edit Form</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Admit Form Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Edit Parent</h3>
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
        <form action="{{ route('update_parents',$parent->user_id) }}" method="POST" enctype="multipart/form-data">
            @csrf

             {{-- Update method for updation in Laravel --}}
             @method('PUT')

                <div class="row">

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>First Name </label>
                        <input type="text" class="form-control" id="name" name="f_name" value="{{ $parent->f_name }}" required>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Last Name </label>
                        <input type="text" class="form-control" id="name" name="l_name" value="{{ $parent->l_name }}" required>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label for="gender">Gender </label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="">Please Select Gender</option>
                            <option value="Male" {{ $parent->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $parent->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Others" {{ $parent->gender == 'Others' ? 'selected' : '' }}>Others</option>
                        </select>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Occupation </label>
                        <input type="text" class="form-control" id="occupation" name="occupation" value="{{ $parent->occupation  }}" required>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group mt-3">
                        <label for="blood_group">Blood Group </label>
                        <select class="form-control" id="blood_group" name="blood_group" required>
                            <option value="">Please Select Group </option>
                            <option value="A+" {{ $parent->blood_group== 'A+' ? 'selected' : '' }}>A+</option>
                            <option value="A-" {{ $parent->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
                            <option value="B+" {{ $parent->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                            <option value="B-" {{ $parent->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
                            <option value="O+" {{ $parent->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
                            <option value="O-" {{ $parent->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
                            <option value="AB+" {{ $parent->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
                            <option value="AB-" {{ $parent->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
                        </select>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group mt-3">
                        <label for="religion">Religion </label>
                        <input type="text" class="form-control" id="religion" name="religion" value="{{ $parent->religion  }}">
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group mt-3">
                        <label for="email">E-Mail</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $parent->email }}" required>
                    </div>


                    <div class="col-xl-3 col-lg-6 col-12 form-group mt-3">
                        <label for="admission_id">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $parent->address  }}" required>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group mt-3">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $parent->phone  }}" required>
                    </div>
                    <div class="col-lg-6 col-12 form-group mt-3">
                        <label for="about">Short BIO</label>
                        <textarea class="textarea form-control" name="about" id="form-message about" cols="10"
                            rows="9">{{$parent->about }}</textarea>
                        
                    </div>

                    <div class="col-lg-6 col-12 form-group mg-t-30">
                        <label class="text-dark-medium">Upload Student Photo (150px X 150px)</label>
                        <input type="file" class="form-control-file" id="pic" name="pic" value="{{ old('pic') }}">

                    </div>

                    <div class="col-12 form-group mg-t-8">
                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection