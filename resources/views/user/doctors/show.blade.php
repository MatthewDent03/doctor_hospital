<x-app-layout> <!-- imported app layout, activates the success alert with sessions. The table holds the components with data -->
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
                            <tr>
                                <td class="font-bold ">Hospital Name </td>
                                <td>{{ $doctor->hospital->name }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold ">Hospital Phone Number </td>
                                <td>{{ $doctor->hospital->phone_number }}</td>
                            </tr>
                        </tbody>

                        
                        @foreach ($doctor->patients as $patient)
                            <tr>
                                <td class="font-bold"> Patient </td>
                                <td {{ $patient->name }}</td>
                                <td {{ $patient->phone_number }}</td>
                                <td {{ $patient->emergency_contact }}</td>
                                <td {{ $patient->emergency_number }}</td>
                            </tr>
                        @endforeach
                    </table>            
                </div>
            </div>
        </div>
    </div>
</x-app-layout>