<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Doctors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <button type="submit" class="btn btn-primary">Filter by Ascending</button>
            </form>
            <a href="{{ route('doctors.filterAscending') }}" class="btn btn-primary">Filter by Ascending</a>
            <a href="{{ route('doctors.filterDescending') }}" class="btn btn-primary">Filter by Descending</a>
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                    <a href="{{ route('doctors.show', $doctor) }}">{{ $doctor->first_name }}{{ $doctor->last_name }}</a>
                    </h2>
                    <p class="mt-2">
                        {{ $doctor->email }}
                        {{$doctor->phone_number}}
                        {{$doctor->facility}}
                    </p>

                </div>
            @empty
            <p>No doctors</p>
            @endforelse

        </div>
    </div>
</x-app-layout>

