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
            <li>Notice</li>
        </ul>
    </div>
    <!-- Breadcubs Area End Here -->
    <div class="row">
        <!-- Add Notice Area Start Here -->
        <div class="col-4-xxxl col-12">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1">
                        <div class="item-title">
                            <h3>Create A Notice</h3>
                        </div>
                        <div>
                            <a class="btn btn-danger btn-lg" href="{{route('all_notices')}}">All Notices</a>
                        </div> 
                    </div>

                    <form class="new-added-form" action="{{route('store_notice')}}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Title</label>
                                <input type="text" placeholder="" class="form-control" name="title" value="{{ old('title') }}" required>
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Details</label>
                                <input type="text" placeholder="" class="form-control" name="details" value="{{ old('details') }}" required>
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label>Posted By </label>
                                <input type="text" placeholder="" class="form-control" name="post_by" value="{{ old('post_by') }}" required>
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-12 form-group mt-3">
                                <label for="date">Date Of Birth </label>
                                    <input type="date" data-position='bottom right' placeholder="dd/mm/yyyy" class="form-control air-datepicker" id="date" name="date" value="{{ old('date') }}" required>
                            </div> 

                            <div class="col-12 form-group mg-t-8">
                                <input type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark" value="Save">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Add Notice Area End Here -->
    </div>
</div>
@endsection