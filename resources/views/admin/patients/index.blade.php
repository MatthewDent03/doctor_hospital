<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Patients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
        
            <x-primary-button>
                <a href="{{ route('admin.patients.create') }}">Add a patient</a>  <!-- routing to create function in controller -->
            </x-primary-button>

            @forelse ($patients as $patient)
                <x-card>
                  
                        <a href="{{ route('admin.patients.show', $patient) }}" class="font-bold text-2xl">{{ $patient->name }}</a>
            
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">ID:</span> {{ $patient->id }}   <!-- displaying data and attributes -->
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Emergency Contact:</span> {{ $patient->emergency_contact }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Emergency Phone Number:</span> {{ $patient->emergency_number }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Phone Number:</span> {{ $patient->phone_number }}
                        </p>
                        @if ($patient->patient_image)
                            <img src="{{ asset($patient->patient_image) }}" alt="{{ $patient->name }}" width="100">   <!-- displaying image -->
                        @else
                            No Image
                        @endif
                </x-card>   
            @empty
                <p>No patients</p>
            @endforelse
            
        </div>
    </div>
</x-app-layout>