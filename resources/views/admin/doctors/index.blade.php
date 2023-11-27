<x-app-layout> <!-- Imported app layout from app blade -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Doctors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
<!-- created route to create function in controller, a forelse loops the doctors components and creates functionality with the show view to display the attributers -->
            <a href="{{ route('admin.doctors.create') }}" class="btn-link btn-lg mb-2">Add a Doctor</a>
            @forelse ($doctors as $doctor)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                    <a href="{{ route('admin.doctors.show', $doctor) }}">{{ $doctor->first_name }}{{ $doctor->last_name }}</a>
                    </h2>
                    <p class="mt-2">

                        <h3 class="font-bold text-1x1"> <strong> Hospital Name </strong>
                        {{$doctor->hospital->name}} </h3>
                        {{ $doctor->email }}
                        {{$doctor->phone_number}}
                        {{$doctor->facility}}
                    </p>

                </div>
            @empty
            <p>No doctors</p>
            @endforelse
            
<!-- Activating the pagination premade feature with laravel in the index view through the controller -->

        </div>
    </div>
</x-app-layout>