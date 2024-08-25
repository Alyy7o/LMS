@extends('layout.main')

@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Teacher</h3>
        <ul>
            <li>
                <a href="{{url('index')}}">Home</a>
            </li>
            <li>All Teachers</li>
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
        
    <!-- Student Table Area Start Here -->
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>All Teachers Data</h3>
                </div>  
            </div>
           
            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                        <tr>
                            <th>PHOTO</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>CNIC</th>
                            <th>GENDER</th>
                            <th>CLASSES</th>
                            <th>MOB:NUMBER</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                            
                       
                        <tr>
                            <td class="text-center">
                                @if($teacher->pic)
                                    <img src="{{ asset('teacher/' . $teacher->pic) }}" alt="{{ $teacher->f_name }}" style="width: 5em; height: 5em;">
                                @else
                                    No Photo
                                @endif
                            </td>
                            <td>{{ $teacher->f_name }} {{ $teacher->l_name }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->cnic }}</td>
                            <td>{{ $teacher->gender }}</td>
                            <td>
                            
                            <!-- Display Teacher's Sections -->
                            
                                <ul>
                                    @foreach($teacher->sections as $section)
                                        <li>{{ $section->classes->name }}({{ $section->name }})  </li>
                                    @endforeach
                                </ul>
                            
                            </td>
                            <td>{{ $teacher->mob_no }} </td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span class="flaticon-more-button-of-three-dots"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right">

                                    {{-- con --}}
                                    @if ( Auth::user()->role === 'owner')
                                        <form action="{{route('destroy_teacher',$teacher->user_id)}}" method="POST">
                            
                                            @csrf
                                            
                                            {{-- Delete method for Deletion in laravel --}}
                                            @method('DELETE')
                                            
                                            <button class="dropdown-item btn-hover-yellow" type="submit" ><i class="fas fa-times text-orange-red pl-2 pr-3" ></i>Delete</button>
                                        </form>
                                        @endif

                                        <a class="dropdown-item btn-hover-yellow" href="{{route('edit_teacher',$teacher->user_id)}}"><i class="fas fa-cogs text-dark-pastel-green pl-2 pr-3"></i>Edit</a> 
                                        <a class="dropdown-item btn-hover-yellow" href="{{route('teacher_details',$teacher->user_id)}}"><i class="fas fa-redo-alt text-orange-peel pl-2 pl-2 pr-3"></i>View Details</a> 
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