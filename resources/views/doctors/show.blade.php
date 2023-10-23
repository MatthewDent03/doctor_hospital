@extends('layouts.app')
@section('content')

<div class="container">
    <h1>VIEW Doctor</h1>
    <table class="table table-hover">
        <tbody>
            <tr>
                <th><strong> Id </strong></th>
                <td>{{ $doctor->id }}</td>
            </tr>
            <tr>
                <th><strong> first_name </strong></th>
                <td>{{ $doctor->first_name }}</td>
                <th><strong> last_name </strong></th>
                <td>{{ $doctor->last_name }}</td>
            </tr>

            <tr>
                <th><strong> email </strong></th>
                <td>{{ $doctor->email }}</td>
            </tr>
                <th><strong> phone_number </strong></th>
                <td>{{ $doctor->phone_number }}</td>
            
            <tr>
                <th><strong> facility </strong></th>
                <td>{{ $doctor->facility }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
