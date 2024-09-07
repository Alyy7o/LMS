@extends('layout.main')
@section('content')
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Classes</h3>
        <ul>
            <li>
                <a href="{{url('index.php')}}">Home</a>
            </li>
            <li>All Classes</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->

    <!-- Class Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Classes</h3>
                </div>
                <div>
                    <button onclick="goBack()" class="fw-btn-fill btn btn-danger" style="padding: 0 30px">Back</button>
                </div>
            </div>

            <div class="table-responsive">
                
                <table class="table display data-table text-nowrap table-striped table-bordered">
                    <thead>
                                
                            <tr>
                           
                                <th scope="col">Class Name</th>
                                <th scope="col">Actions</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classes as $class)
                            <tr>
                                    <td>{{$class->name}}</td>
                                    
                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <span class="flaticon-more-button-of-three-dots"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right"> 
                                                <a class="dropdown-item btn-hover-yellow" href="{{route('all_sections_of_teacher', ['id' => Auth::user()->id, 'class_id' => $class->id])}}"><i class="fas fa-redo-alt text-orange-peel pl-2 pr-3"></i>View Sections</a>
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