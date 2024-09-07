@extends('layout.main')
@section('content')
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Subjects</h3>
        <ul>
            <li>
                <a href="{{url('index.php')}}">Home</a>
            </li>
            <li>Add New Subject</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->

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
        
    <!-- Add Class Area Start Here -->
    <div class="row">
     <div class="col-4-xxxl col-12">

        <form class="new-added-form" action="{{route('store_subject')}}" method="post">
             @csrf
                
                        <div class="card height-auto">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Add New Subject</h3>
                                    </div>
                                    <div>
                                        <a class="btn btn-danger btn-lg" href="{{route('all_subjects')}}">All Subjects</a>
                                    </div> 
                                </div>
  
                                    <div class="row">
                                        <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                            <label>Subject Name *</label>
                                            <input type="text" placeholder="" class="form-control" name="name">
                                        </div>
                                        
                                        <div class="col-xl-4 col-lg-4 col-12 form-group">
                                            <label>Class </label>
                                            <select class="form-control class_id" id="class-dd" name="class_id">
                                                <option value="">Please Select Class</option>
                                            <!-- Options for classes -->
                                            @foreach($classes as $class)
                                                <option value="{{ $class->id }} {{ old('class-dd') == '$class->name' ? 'selected' : '' }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                    
                                            
                                        </div>
                                       
                                        <div class="col-xl-4 col-lg-4 col-12 form-group">
                                            <label>Section </label>
                                            <select id="section-dd" name="section_id" class="form-control section_id">
                                                <option value="">Please Select Section</option>
                                            </select>
                                        </div>

                                        <div class="col-12 form-group mg-t-8">
                                                <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Save">
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </form>
     </div>
                    
    </div>
        
@endsection