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
            <li>Student Details</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Student Details Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>About Me</h3>
                </div>
               <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" 
                    data-toggle="dropdown" aria-expanded="false">...</a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                        <a class="dropdown-item btn-hover-yellow" href="{{route('edit_students',$student->id)}}"><i class="fas fa-cogs text-dark-pastel-green pl-2 pr-3"></i>Edit</a> 
                    </div>
                </div>
            </div>
            <div class="single-info-details">
                <div class="item-img">
                    @if($student->pic)
                    <img src="{{ asset('students/' . $student->pic) }}" alt="{{ $student->name }}" style="width: 300px; height: 300px;">
                @else
                    No Photo
                @endif
                </div>
                <div class="item-content">
                    <div class="header-inline item-header">
                        <h3 class="text-dark-medium font-medium">{{$student->f_name}} {{$student->l_name}}</h3>
                        <div class="header-elements">
                            
                        </div>
                    </div>
                    <p>{{ $student->about }}</p>
                    <div class="info-table table-responsive">
                        <table class="table text-nowrap">
                            <tbody>
                                <tr>
                                    <td>Name:</td>
                                    <td class="font-medium text-dark-medium">{{$student->f_name}} {{$student->l_name}}</td>
                                </tr>
                                <tr>
                                    <td>Gender:</td>
                                    <td class="font-medium text-dark-medium">{{ $student->gender }}</td>
                                </tr>
                                <tr>
                                    <td>Father Name:</td>
                                    <td class="font-medium text-dark-medium">{{ $student->parents->f_name }} {{ $student->parents->l_name }}</td>
                                </tr>
                                
                                <tr>
                                    <td>Date Of Birth:</td>
                                    <td class="font-medium text-dark-medium">{{ $student->date_of_birth }}</td>
                                </tr>
                                <tr>
                                    <td>Religion:</td>
                                    <td class="font-medium text-dark-medium">{{ $student->religion }}</td>
                                </tr>
                                <tr>
                                    <td>Father Occupation:</td>
                                    <td class="font-medium text-dark-medium">{{ $student->parents->occupation }}</td>
                                </tr>
                                <tr>
                                    <td>E-mail:</td>
                                    <td class="font-medium text-dark-medium">{{ $student->email }}</td>
                                </tr>

                                <tr>
                                    <td>Class:</td>
                                    <td class="font-medium text-dark-medium">{{ $student->classes->name }}</td>
                                </tr>
                                <tr>
                                    <td>Section:</td>
                                    <td class="font-medium text-dark-medium">{{ $student->sections->name }}</td>
                                </tr>
                                <tr>
                                    <td>Roll:</td>
                                    <td class="font-medium text-dark-medium">{{ $student->roll }}</td>
                                </tr>
                                <tr>
                                    <td>Address:</td>
                                    <td class="font-medium text-dark-medium">{{ $student->parents->address }}</td>
                                </tr>
                                <tr>
                                    <td>Phone:</td>
                                    <td class="font-medium text-dark-medium">{{ $student->phone }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection