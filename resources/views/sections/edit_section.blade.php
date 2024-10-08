@extends('layout.main')
@section('content')
<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Sections</h3>
        <ul>
            <li>
                <a href="{{url('index.php')}}">Home</a>
            </li>
            <li>Edit Section</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Add Class Area Start Here -->
    <form class="new-added-form" action="{{route('update_section',$sections->id)}}" method="post">
        @csrf

        {{-- Update method for updation in Laravel --}}
        @method('PUT')

    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Edit Section</h3>
                </div>
                <div>
                    <button onclick="goBack()" class="fw-btn-fill btn btn-danger" style="padding: 0 30px">Back</button>
                </div>
                
            </div>
                
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Section Name *</label>
                        <input type="text" value="{{$sections->name}}" name="name" class="form-control" required>
                    </div>
                    
                    <div class="col-12 form-group mg-t-8">
                        <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Save">
                    </div>
                    
                     
                </div>
            </form>
        </div>
    </div>
@endsection