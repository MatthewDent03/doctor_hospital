<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Hospitals') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            @forelse ($hospitals as $hospital)
                <x-card>
                  
                        <a href="{{ route('user.hospitals.show', $hospital) }}" class="font-bold text-2xl">{{ $hospital->name }}</a>
            
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">ID:</span> {{ $hospital->id }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Name:</span> {{ $hospital->name }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Address:</span> {{ $hospital->address }}
                        </p>
                        <p class="mt-2 text-gray-700">
                            <span class="font-bold">Phone Number:</span> {{ $hospital->phone_number }}
                        </p>
            
                </x-card>   
            @empty
                <p>No Hospitals</p>
            @endforelse
            
        </div>
    </div>
</x-app-layout>