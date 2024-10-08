@extends('layout.main')

@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Teachers</h3>
        <ul>
            <li>
                <a href="{{url('index')}}">Home</a>
            </li>
            <li>Profile</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- teacher Details Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">

                <div>
                    <button onclick="goBack()" class="fw-btn-fill btn btn-danger" style="padding: 0 30px">Back</button>
                </div>
                
            </div>

            <div class="single-info-details">
                <div class="item-img">
                    @if($teacher->pic)
                    <img src="{{ asset('teacher/' . $teacher->pic) }}" alt="{{ $teacher->f_name }}" style="width: 300px; height: 300px;">
                @else
                    No Photo
                @endif
                {{-- </div>
                <div class="item-img"> --}}
                    @if($teacher->doc_pic)
                    <img src="{{ asset('teacher/' . $teacher->doc_pic) }}" alt="document-pic" style="width: 300px; height: 300px;">
                @else
                    No Photo
                @endif
                </div>
                <div class="item-content">
                    <div class="header-inline item-header">
                        <h3 class="text-dark-medium font-medium">{{$teacher->f_name}} {{$teacher->l_name}}</h3>
                
                    </div>

                    <div class="info-table table-responsive">
                        <table class="table text-nowrap">
                            <tbody>
                                <tr>
                                    <td>Name:</td>
                                    <td class="font-medium text-dark-medium">{{$teacher->f_name}} {{$teacher->l_name}}</td>
                                </tr>
                                <tr>
                                    <td>Gender:</td>
                                    <td class="font-medium text-dark-medium">{{ $teacher->gender }}</td>
                                </tr>

                                <tr>
                                    <td>Date Of Birth:</td>
                                    <td class="font-medium text-dark-medium">{{ $teacher->date_of_birth }}</td>
                                </tr>
                                <tr>
                                    <td>Religion:</td>
                                    <td class="font-medium text-dark-medium">{{ $teacher->religion }}</td>
                                </tr>
                                <tr>
                                    <td>E-mail:</td>
                                    <td class="font-medium text-dark-medium">{{ $teacher->email }}</td>
                                </tr>
                                <tr>
                                    <td>Mobile Number:</td>
                                    <td class="font-medium text-dark-medium">{{ $teacher->mob_no }}</td>
                                </tr>
                                <tr>
                                    <td>Phone Number:</td>
                                    <td class="font-medium text-dark-medium">{{ $teacher->phone_no }}</td>
                                </tr>
                                <tr>
                                    <td>Salary</td>
                                    <td class="font-medium text-dark-medium">{{ $teacher->salary }}</td>
                                </tr>
                                <tr>
                                    <td>Address:</td>
                                    <td class="font-medium text-dark-medium">{{ $teacher->address }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection