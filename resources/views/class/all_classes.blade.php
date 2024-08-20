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
                    <h3>All Class</h3>
                </div>
                
            </div>
            <form class="mg-b-20">

                <div class="row gutters-8">
                    <div class="col-3-xxxl col-xl-3 col-lg-3 col-12 form-group">
                        <input type="text" placeholder="Search by ID ..." class="form-control">
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
                                    <label class="form-check-label">ID</label>
                                </div>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Class Name</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classes as $class)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input">
                                        <label class="form-check-label">#{{$class->id}}</label>
                                    </div>
                                </td>
                                

                                    <td>{{$class->name}}</td>

                                    <td>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <span class="flaticon-more-button-of-three-dots"></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <form action="{{route('admin.destroy_class',$class->id)}}" method="POST">
                                            
                                                    @csrf
                                                    
                                                    {{-- Delete method for Deletion in laravel --}}
                                                    @method('DELETE')
                                                    
                                                    <button class="dropdown-item btn-hover-yellow" type="submit" ><i class="fas fa-times text-orange-red pl-2 pr-3" ></i>Delete</button>
                                                </form>
                                                 <a class="dropdown-item btn-hover-yellow" href="{{route('admin.edit_class',$class->id)}}""><i class="fas fa-cogs text-dark-pastel-green pl-2 pr-3"></i>Edit</a>
                                                <a class="dropdown-item btn-hover-yellow" href="{{route('show_sections',['id' => $class->id])}}"><i class="fas fa-redo-alt text-orange-peel pl-2 pr-3"></i>View Sections</a>
                                            </div>
                                        </div>
                                    </td>
                                    
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Pagination --}}
                    {{-- <div class="my-4 d-flex justify-content-center">
                        {{$users->links()}}
                    </div> --}}

               
                        
            </div>
        </div>
    </div>
@endsection