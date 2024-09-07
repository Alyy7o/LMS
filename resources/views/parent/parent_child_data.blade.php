@extends('layout.main')
@section('content')
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Parents</h3>
        <ul>
            <li>
                <a href="{{url('parent_welcome')}}">Home</a>
            </li>
            <li>All children</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->   
    <!-- Teacher Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>All Parents Data</h3>
                </div>
                <div>
                    <button onclick="goBack()" class="fw-btn-fill btn btn-danger" style="padding: 0 30px">Back</button>
                </div>
                
            </div>
            
            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                        <tr>  
                            <th>Roll no.</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Occupation</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>E-mail</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($students as $student)
                            
                        <tr>
                            <td>{{ $student->roll }}</td>
                            <td class="text-center">
                                @if($student->pic)
                                    <img src="{{ asset('students/' . $student->pic) }}" alt="{{ $student->name }}" style="width: 5em; height: 5em;">
                                @else
                                    No Photo
                                @endif
                            </td>
                            <td>{{ $student->f_name }} {{ $student->l_name }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->parents->occupation}}</td>
                            <td>{{ $student->parents->address }}</td>
                            <td>{{ $student->parents->phone }}</td>
                            <td>{{ $student->parents->email }}</td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

