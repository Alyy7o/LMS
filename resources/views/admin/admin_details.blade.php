@extends('layout.main')

@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Admins</h3>
        <ul>
            <li>
                <a href="{{url('index')}}">Home</a>
            </li>
            <li>Admin Details</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- admin Details Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div>
                    <button onclick="goBack()" class="fw-btn-fill btn btn-danger" style="padding: 0 30px">Back</button>
                </div>
                
               <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" 
                    data-toggle="dropdown" aria-expanded="false">...</a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#"><i class="fas fa-times text-orange-red"></i>Close</a>
                        <a class="dropdown-item btn-hover-yellow" href="{{route('edit_admin',$admin->user_id)}}"><i class="fas fa-cogs text-dark-pastel-green pl-2 pr-3"></i>Edit</a> 
                    </div>
                </div>
            </div>
            <div class="single-info-details">
                <div class="item-img">
                    @if($admin->pic)
                    <img src="{{ asset('admin/' . $admin->pic) }}" alt="{{ $admin->f_name }}" style="width: 300px; height: 300px;">
                @else
                    No Photo
                @endif
                {{-- </div>
                <div class="item-img"> --}}
                    @if($admin->doc_pic)
                    <img src="{{ asset('admin/' . $admin->doc_pic) }}" alt="document-pic" style="width: 300px; height: 300px;">
                @else
                    No Photo
                @endif
                </div>
                <div class="item-content">
                    <div class="header-inline item-header">
                        <h3 class="text-dark-medium font-medium">{{$admin->f_name}} {{$admin->l_name}}</h3>
                    </div>

                    <div class="info-table table-responsive">
                        <table class="table text-nowrap">
                            <tbody>
                                <tr>
                                    <td>Name:</td>
                                    <td class="font-medium text-dark-medium">{{$admin->f_name}} {{$admin->l_name}}</td>
                                </tr>
                                <tr>
                                    <td>Gender:</td>
                                    <td class="font-medium text-dark-medium">{{ $admin->gender }}</td>
                                </tr>

                                <tr>
                                    <td>Date Of Birth:</td>
                                    <td class="font-medium text-dark-medium">{{ $admin->date_of_birth }}</td>
                                </tr>
                                <tr>
                                    <td>Religion:</td>
                                    <td class="font-medium text-dark-medium">{{ $admin->religion }}</td>
                                </tr>
                                <tr>
                                    <td>E-mail:</td>
                                    <td class="font-medium text-dark-medium">{{ $admin->email }}</td>
                                </tr>
                                <tr>
                                    <td>Mobile Number:</td>
                                    <td class="font-medium text-dark-medium">{{ $admin->mob_no }}</td>
                                </tr>
                                <tr>
                                    <td>Phone Number:</td>
                                    <td class="font-medium text-dark-medium">{{ $admin->phone_no }}</td>
                                </tr>
                                <tr>
                                    <td>Salary</td>
                                    <td class="font-medium text-dark-medium">{{ $admin->salary }}</td>
                                </tr>
                                <tr>
                                    <td>Address:</td>
                                    <td class="font-medium text-dark-medium">{{ $admin->address }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection