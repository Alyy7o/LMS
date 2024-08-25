@extends('layout.main')

@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Owners</h3>
        <ul>
            <li>
                <a href="{{url('index')}}">Home</a>
            </li>
            <li>Add Owner</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Admit Form Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Add New Owner</h3>
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
        <form action="{{ route('store_owner') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">

                        <div class="col-xl-4 col-lg-6 col-12 form-group">
                            <label>Name: </label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Email: </label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Password: </label>
                        <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}" required>
                    </div>


                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label class="text-dark-medium">Logo: </label>
                        {{-- <input type="file" class="form-control-file"> --}}
                        <input type="file" class="form-control-file" id="logo" name="logo" value="{{ old('logo') }}">
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Telephone Number: </label>
                        <input type="text" class="form-control" id="tele_no" name="tele_no" value="{{ old('tele_no') }}" required>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>Mobile  Number: </label>
                        <input type="text" class="form-control" id="mob_no" name="mob_no" value="{{ old('mob_no') }}" required>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-12 form-group">
                        <label>School Name: </label>
                        <input type="text" class="form-control" id="school_name" name="school_name" value="{{ old('school_name') }}" required>
                    </div>

                    <div class="col-lg-12 col-12 form-group mt-3">
                        <label for="about">Address:</label>
                        <textarea class="textarea form-control" name="address" id="form-message address" cols="10"
                            rows="9">{{ old('address') }}</textarea>
                    </div>

                    <div class="col-lg-12 col-12 form-group mt-3">
                        <label for="about">Short Description:</label>
                        <textarea class="textarea form-control" name="description" id="form-message description" cols="10"
                            rows="9">{{ old('description') }}</textarea>
                    </div>



                    <div class="col-12 form-group mg-t-8">
                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection

 