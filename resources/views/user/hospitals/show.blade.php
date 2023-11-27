<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $hospital->name }} - Hospital
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">

            <h3 class="font-bold text-2xl mb-4">Hospital Details</h3>
            <p class="text-gray-700"><span class="font-bold">ID:</span> {{ $hospital->id }}</p>
            <p class="text-gray-700"><span class="font-bold">Name:</span> {{ $hospital->name }}</p>
            <p class="text-gray-700"><span class="font-bold">Address:</span> {{ $hospital->address }}</p>
            <p class="text-gray-700"><span class="font-bold">Phone Number:</span> {{ $hospital->phone_number }}</p>

            <h3 class="font-bold text-2x1 mt-6 mb-4">Doctors by {{ $hospital->name }}</h3>

            @forelse ($doctors as $doctor)
                <x-card>
                    <a href="{{ route('user.hospitals.show', $doctor) }}" class="font-bold text-2x1">{{ $hospital->name }}</a>
                </x-card>
            @empty
                <p>No doctors for this hospital</p>
            @endforelse

        </div>
    </div>
</x-app-layout>