@extends('layouts.app')
@section('content')

<div class="container">
    <h1>ALL Doctors</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctors as $doctor)
            <tr>
                <td>{{ $doctor->first_name }}</td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->phone_number }}</td>
                <td>
                    @if ($doctor->doctor_image)
                        <img src="{{ $doctor->doctor_image }}"
                        alt="{{ $doctor->title }}" width="100">
                    @else
                        No Image
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
