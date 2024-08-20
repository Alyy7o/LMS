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
            <li>Add New Class</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Add Class Area Start Here -->
    <form class="new-added-form" action="{{route('store_section')}}" method="post">
        @csrf
    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Add New Section</h3>
                </div>
              
            </div>
                
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Section Name *</label>
                        <input type="text" placeholder="" name="name" class="form-control" required>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-12 form-group">
                        <label>Class *</label>
                        <select name="class_id" class="form-control" required>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="col-12 form-group mg-t-8">
                        <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Save">
                        {{-- <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button> --}}
                    </div>
                    
                     
                </div>
            </form>
        </div>
    </div>
@endsection