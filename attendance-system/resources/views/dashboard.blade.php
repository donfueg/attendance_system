@extends('layouts.app')

@section('content')
    <h2>Attendance Dashboard</h2>
    
    <form action="{{ route('attendance.checkin') }}" method="POST">
        @csrf
        <button type="submit">Check In</button>
    </form>
    
    <form action="{{ route('attendance.checkout') }}" method="POST">
        @csrf
        <button type="submit">Check Out</button>
    </form>

    <table>
        <tr>
            <th>Date</th>
            <th>Check In</th>
            <th>Check Out</th>
        </tr>
        @foreach($attendances as $attendance)
            <tr>
                <td>{{ $attendance->date }}</td>
                <td>{{ $attendance->check_in }}</td>
                <td>{{ $attendance->check_out }}</td>
            </tr>
        @endforeach
    </table>
@endsection
