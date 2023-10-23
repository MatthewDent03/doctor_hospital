@extends('layouts.app')

@section('content')
    <h3 class="text-center">Create Doctor</h3>
    <form action="{{ route('doctors.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="first_name">Doctor First Name</label>
            <input type="text" name="first_name" id="first_name" class="
            form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" 
            value="{{ old('first_name') }}" placeholder="Enter First Name">
            @if($errors->has('first_name'))
                <span class="invalid-feedback">
                    {{ $errors->first('first_name') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="body">Doctor Last Name</label>
            <input type="text" name="last_name" id="last_name" class="
            form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" 
            value="{{ old('last_name') }}" placeholder="Enter Last Name">
            @if($errors->has('last_name'))
                <span class="invalid-feedback">
                    {{ $errors->first('last_name') }}
                </span>
            @endif
        </div>
        <div class=
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
