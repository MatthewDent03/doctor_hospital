<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <!-- Page Content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td class="font-bold ">First Name  </td>
                                <td>{{ $doctor->first_name }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold ">Last Name  </td>
                                <td>{{ $doctor->last_name }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Email </td>
                                <td>{{ $doctor->email }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold ">Facility </td>
                                <td>{{ $doctor->facility }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold ">Phone Number  </td>
                                <td>{{ $doctor->phone_number }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table>
                        <tr>
                            <td><x-primary-button><a href="{{ route('doctors.edit', $doctor) }}">Edit</a> </x-primary-button></td>
                            
                            <td><form method="POST" action="{{ route('doctors.destroy', $doctor->id) }}"> @csrf @method('DELETE') <x-tertiary-button onclick="return confirm('Are you sure you want to delete?')">DELETE</x-tertiary-button></form></td>
                        </tr>
                    </table>               
                </div>
            </div>
        </div>
    </div>
</x-app-layout>