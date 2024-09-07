@extends('layout.main')
@section('content')
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Notice Board</h3>
        <ul>
            <li>
                <a href="{{url('index.php')}}">Home</a>
            </li>
            <li>Notice Details</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <div class="row">
        <!-- All Notice Area Start Here -->
        <div class="col-8-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div>
                            <button onclick="goBack()" class="fw-btn-fill btn btn-danger" style="padding: 0 30px">Back</button>
                        </div>
                        <div class="item-title">
                            <h3>Notice Details</h3>
                        </div>
                         <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" 
                            data-toggle="dropdown" aria-expanded="false">...</a>
    
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item btn-hover-yellow" href="{{ route('edit_notice',$notice->id) }}"><i class="fas fa-cogs text-dark-pastel-green"></i>Edit</a>
                                @if ( Auth::user()->role === 'owner')
                                            
                                        <form action="{{route('destroy_notice',$notice->id)}}" method="POST">
                                            
                                            @csrf
                                            
                                            {{-- Delete method for Deletion in laravel --}}
                                            @method('DELETE')
                                            
                                            <button class="dropdown-item btn-hover-yellow" type="submit" ><i class="fas fa-times text-orange-red pl-2 pr-3" ></i>Delete</button>
                                        </form>
                                        @endif
                            </div>
                        </div>
                    </div>
                        
                    <div class="notice-board-wrap">
                        <div class="notice-list">
                            <div class="post-date bg-skyblue">{{ $notice->date }}</div>
                            <h6 class="notice-title">{{ $notice->title }}</h6>
                            <hr>
                            <p>{{ $notice->details }}</p>
                            <div class="entry-meta">  {{ $notice->post_by }} / <span>5 min ago</span></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
@endsection