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

    @if (session('status'))
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>
        <div class="px-3 pt-1">

            {{ session('status') }}
        </div>
      </div>
@endif

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

    <!-- Class Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>All Classes</h3>
                </div>
                <div>
                    <a class="fw-btn-fill btn-gradient-yellow" href="{{route('admin.add_classes')}}">Add New Class</a>
                </div>
            </div>

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

                                                @if ( Auth::user()->role === 'owner')
                                                    
                                                <form action="{{route('admin.destroy_class',$class->id)}}" method="POST">
                                                    
                                                    @csrf
                                                    
                                                    {{-- Delete method for Deletion in laravel --}}
                                                    @method('DELETE')
                                                    
                                                    <button class="dropdown-item btn-hover-yellow" type="submit" ><i class="fas fa-times text-orange-red pl-2 pr-3" ></i>Delete</button>
                                                </form>
                                                @endif
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