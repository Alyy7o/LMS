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
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">...</a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#"><i
                                class="fas fa-times text-orange-red"></i>Close</a>
                        <a class="dropdown-item" href="#"><i
                                class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                        <a class="dropdown-item" href="#"><i
                                class="fas fa-redo-alt text-orange-peel"></i>Refresh</a>
                    </div>
                </div>
            </div>
            <form class="mg-b-20">
                <div class="row gutters-8">
                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <input type="text" placeholder="Search by Roll ..." class="form-control">
                    </div>
                    <div class="col-4-xxxl col-xl-4 col-lg-3 col-12 form-group">
                        <input type="text" placeholder="Search by Name ..." class="form-control">
                    </div>
                    <div class="col-4-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <input type="text" placeholder="Search by Class ..." class="form-control">
                    </div>
                    <div class="col-1-xxxl col-xl-2 col-lg-3 col-12 form-group">
                        <button type="submit" class="fw-btn-fill btn-gradient-yellow">SEARCH</button>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table display data-table text-nowrap table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input checkAll">
                                    <label class="form-check-label">Roll</label>
                                </div>
                            </th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Section</th>
                            <th>Parents</th>
                            <th>Address</th>
                            <th>Date Of Birth</th>
                            <th>Phone</th>
                            <th>E-mail</th>
                            <th>About</th>
                            <th></th>
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
                            <td class="text-center">
                                @if($student->pic)
                                    <img src="{{ asset('students/' . $student->pic) }}" alt="{{ $student->name }}" style="width: 5em; height: 5em;">
                                @else
                                    No Photo
                                @endif
                            </td>
                            <td>{{$student->f_name}} {{$student->l_name}}</td>
                            <td>{{$student->gender}}</td>
                            <td>{{$section->name}}</td>
                            <td>{{ $student->parents->f_name }} {{ $student->parents->l_name }} </td>
                            <td>{{ $student->parents->address }}</td>
                            <td>{{$student->date_of_birth}}</td>
                            <td>{{$student->phone}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->about}}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="flaticon-more-button-of-three-dots"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <form action="{{route('destroy_students',$student->id)}}" method="POST">
                            
                                            @csrf
                                            
                                            {{-- Delete method for Deletion in laravel --}}
                                            @method('DELETE')
                                            
                                            <button class="dropdown-item btn-hover-yellow" type="submit" ><i class="fas fa-times text-orange-red pl-2 pr-3" ></i>Delete</button>
                                        </form>
                                        <a class="dropdown-item btn-hover-yellow" href="{{route('edit_students',$student->id)}}"><i class="fas fa-cogs text-dark-pastel-green pl-2 pr-3"></i>Edit</a> 
                                        <a class="dropdown-item btn-hover-yellow" href="{{route('student_details',$student->id)}}"><i class="fas fa-redo-alt text-orange-peel pl-2 pl-2 pr-3"></i>View Details</a> 
                                    </div>
                                </div>
                            </td>
                        </tr>

                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
@endsection