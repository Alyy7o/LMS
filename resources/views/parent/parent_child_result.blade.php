@extends('layout.main')

<style>
    /* General card styling */
.card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

/* Breadcrumb */
.breadcrumbs-area {
    margin-bottom: 20px;
}

.breadcrumbs-area ul {
    list-style: none;
    padding: 0;
}

.breadcrumbs-area ul li {
    display: inline;
    margin-right: 10px;
    color: #1c75bc;
}

/* Student Information Container */
.student-info-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.student-info-box {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.05);
}

.student-info-box h3 {
    font-size: 24px;
    color: #149fb2;
}

.student-info-box p {
    font-size: 18px;
    color: #333;
}

.student-info-box hr {
    margin-top: 20px;
    border: none;
    border-top: 1px solid #ddd;
}

/* Text styling */
h4 {
    font-size: 20px;
    margin-top: 15px;
    color: #1c75bc;
}

strong {
    font-weight: 600;
}

/* Responsive styling */
@media (max-width: 768px) {
    .student-info-box {
        padding: 15px;
    }
}

</style>

@section('content')
<div class="dashboard-content-one">
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>Parents</h3>
        <ul>
            <li>
                <a href="{{url('parent_welcome')}}">Home</a>
            </li>
            <li>Children Result</li>
        </ul>
    </div>
    <!-- Breadcrumb Area End Here -->
        
    <!-- Students Table Area Start Here -->
    
        <div class="card-body height-auto">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Children Information</h3>
                </div>
                <div>
                    <button onclick="goBack()" class="fw-btn-fill btn btn-danger" style="padding: 0 30px">Back</button>
                </div>
            </div>
            
            <div class="student-info-container">

                @foreach ($students as $student)

                <div class="student-info-box">

                   <h3>{{ $student->f_name }} {{ $student->l_name }}'s Information</h3>

                   <p><strong>Class:</strong> {{ $student->classes->name }} ({{ $student->sections->name }})</p>

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
                            @foreach ($student->result as $result)
                            <tr>
                                <td><strong>Total</strong></td>
                                <td><strong>{{ $result->total_obtained_marks }}</strong></td>
                                <td><strong> {{ $result->total_marks }}</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Percentage</strong></td>
                                <td colspan="2"><strong>{{ $result->percentage }}%</strong></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                   <hr>
               
                @endforeach
            </div>
        </div>
</div>
@endsection

