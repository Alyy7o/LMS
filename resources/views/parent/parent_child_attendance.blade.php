@extends('layout.main')

@section('content')
<div class="dashboard-content-one">
    <div class="breadcrumbs-area">
        <h3>Attendance</h3>
        <ul>
            <li><a href="{{ url('parent_welcome') }}">Home</a></li>
            <li>Student Attendance</li>
        </ul>
    </div>

    <div class="card height-auto">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Attendance of Your Children</h3>
                </div>
            </div>

            @foreach ($students as $student)
                <h4>{{ $student->f_name }} {{ $student->l_name }}</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Day</th>
                                @foreach ($attendanceData[$student->id] as $month => $days)
                                    <th colspan="{{ count($days) }}">{{ $month }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Days</td>
                                @foreach ($attendanceData[$student->id] as $month => $days)
                                    @foreach ($days as $day => $status)
                                        <td>{{ $day }}</td>
                                    @endforeach
                                @endforeach
                            </tr>
                            <tr>
                                <td>Attendance Status</td>
                                @foreach ($attendanceData[$student->id] as $month => $days)
                                    @foreach ($days as $status)
                                        <td>{{ $status }}</td>
                                    @endforeach
                                @endforeach
                            </tr>
                        </tbody>
                    </table>

                    <hr class="my-5">

                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
