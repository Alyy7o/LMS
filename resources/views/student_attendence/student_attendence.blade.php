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
            <li>Student Attendence</li>
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

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Student Table Area Start Here -->
    <form action="{{ route('store_attendance') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="teacher_id" value="{{ $teachers->first()->id }}">
        <input type="hidden" name="section_id" value="{{ $section->id }}">

    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Attendence Sheet Of Class {{ $section->classes->name }}: Section {{ $section->name }}</h3>
                </div>
                
                @if (Auth::user()->role === 'owner' || Auth::user()->role === 'admin' )   
                <div>
                    <a class="btn btn-danger btn-lg" href="{{route('all_students')}}">All Students</a>
                </div> 
                
                @else
                
                <div>
                    <button onclick="goBack()" class="fw-btn-fill btn btn-danger" style="padding: 0 30px">Back</button>
                </div>

                @endif

            </div>


            <div class="table-responsive">
                <table class="table display data-table text-nowrap table-striped table-bordered">
                    <thead>
                        <tr>
                            <div class="col-xl-3 col-lg-6 col-12 form-group mt-3">
                                <label for="date">Date: </label>
                                    <input type="date" data-position='bottom right' placeholder="dd/mm/yyyy" class="form-control air-datepicker" id="date" name="date" value="{{ old('date') }}" required>
                            </div>
                        </tr>
                        <tr>
                            <th>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkAll">
                                    <label class="form-check-label">Roll</label>
                                </div>
                            </th>
                            <th>Name</th>
                            <th>Present</th>
                            <th>Absent</th>
                            <th>Leave</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($students as $student)
                            
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input">
                                    <label class="form-check-label">#{{$student->roll}}</label>
                                </div>
                            </td>
                            <td>{{$student->f_name}} {{$student->l_name}}</td>
                             
                            <!-- Hidden input to store student ID -->
                             <input type="hidden" name="students[{{ $student->id }}][student_id]" value="{{ $student->id }}">

                            <td>
                                <label>
                                    <input type="radio" name="students[{{ $student->id }}][status]" value="P"> 
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input type="radio" name="students[{{ $student->id }}][status]" value="A"> 
                                </label>
                            </td>
                            <td>
                                <label>
                                    <input type="radio" name="students[{{ $student->id }}][status]" value="L"> 
                                </label>
                            </td>
                            {{-- <td><input type="checkbox" name="students[{{ $student->id }}][]" value="A"></td>
                            <td><input type="checkbox" name="students[{{ $student->id }}][]" value="L"></td> --}}
                            
                        </tr>

                        @endforeach
                       
                    </tbody>
                </table>
            </div>
            <div class="col-12 form-group mg-t-8">
                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                {{-- <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button> --}}
            </div>
        </form>
        </div>
    </div>

    
@endsection