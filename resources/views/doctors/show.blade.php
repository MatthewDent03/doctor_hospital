@extends('layouts.app')
@section('content')

<div class="container">
    <h1>VIEW Doctor</h1>
    <table class="table table-hover">
        <tbody>
            <tr>
                <th><strong> First Name </strong></th>
                <td>{{ $doctor->first_name }}</td>
                <th><strong> Last Name </strong></th>
                <td>{{ $doctor->last_name }}</td>
            </tr>

            <tr>
                <th><strong> Email </strong></th>
                <td>{{ $doctor->email }}</td>
            </tr>
                <th><strong> Phone Number </strong></th>
                <td>{{ $doctor->phone_number }}</td>
            
            <tr>
                <th><strong> Facility </strong></th>
                <td>{{ $doctor->facility }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
