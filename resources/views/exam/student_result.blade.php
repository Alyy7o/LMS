@extends('layout.main')

@section('content')

<div class="dashboard-content-one">
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Teachers</h3>
        <ul>
            <li>
                <a href="{{url('index')}}">Home</a>
            </li>
            <li>Student Result</li>
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
                    <h3>Result of: {{ $student->f_name }} {{ $student->l_name }}</h3>
                </div>

                <div>
                    <button onclick="goBack()" class="fw-btn-fill btn btn-danger" style="padding: 0 30px">Back</button>
                </div>
                
            </div>
            
            <div class="table-responsive">
                <table class="table display data-table text-nowrap">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Obtained Marks</th>
                            <th>Total Marks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student->marks as $mark)
                        <tr>
                            <td>{{ $mark->subjects->name }}</td>
                            <td>{{ $mark->obtained_marks }}</td>
                            <td>{{ $mark->total_marks }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>{{ $student->result->total_obtained_marks }}</strong></td>
                        <td><strong>{{ $student->result->total_marks }}</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Percentage</strong></td>
                        <td colspan="2"><strong>{{ $student->result->percentage }}%</strong></td>
                    </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection


