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
            <li>All Students</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Student Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h2>Students in Section: {{ $section->name }} (Class: {{ $section->classes->name }})</h2>
                </div>

                <div>
                    <button onclick="goBack()" class="fw-btn-fill btn btn-danger" style="padding: 0 30px">Back</button>
                </div>
                
            </div>

            <div class="table-responsive">
                <table class="table display data-table text-nowrap table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Roll no.</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Section</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($students as $student)
                            
                        <tr>
                            
                            <td>{{$student->roll}}</td>
                            <td>{{$student->f_name}} {{$student->l_name}}</td>
                            <td>{{$student->gender}}</td>
                            <td>{{$section->name}}</td>
                            <td>                                
                                <a class="btn btn-lg btn-warning btn-hover-yellow" href="{{route('student_result',$student->id)}}">Result</a> 

                            </td>
                        </tr>

                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
@endsection