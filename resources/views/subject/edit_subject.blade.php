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
            <li>Edit Subject</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
        
    <!-- Add Class Area Start Here -->
    <div class="row">
     <div class="col-4-xxxl col-12">

        <form class="new-added-form" action="{{route('update_subject',$subject->id)}}" method="post">
             @csrf

             {{-- Update method for updation in Laravel --}}
            @method('PUT')
                
                        <div class="card height-auto">
                            <div class="card-body">
                                <div class="heading-layout1">
                                    <div class="item-title">
                                        <h3>Edit Subject</h3>
                                    </div>
                                    <div>
                                        <button onclick="goBack()" class="fw-btn-fill btn btn-danger" style="padding: 0 30px">Back</button>
                                    </div>
                                </div>
  
                                    <div class="row">
                                        <div class="col-12-xxxl col-lg-4 col-12 form-group">
                                            <label>Subject Name *</label>
                                            <input type="text" placeholder="" class="form-control" name="name" value="{{ $subject->name }}">
                                        </div>
                                        
                                        <div class="col-xl-4 col-lg-4 col-12 form-group">
                                            <label>Class </label>
                                            <select class="form-control class_id" id="class-dd" name="class_id">
                                                <option value="">{{ $subject->class->name }}</option>
                                            <!-- Options for classes -->
                                            @foreach($classes as $class)
                                                <option value="{{ $class->id }} {{ old('class-dd') == '$class->name' ? 'selected' : '' }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                    
                                            
                                        </div>
                                       
                                        <div class="col-xl-4 col-lg-4 col-12 form-group">
                                            <label>Section </label>
                                            <select id="section-dd" name="section_id" class="form-control section_id">
                                                <option value="">{{ $subject->section->name }}</option>
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