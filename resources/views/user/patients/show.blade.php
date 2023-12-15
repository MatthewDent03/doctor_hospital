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
                                <td class="font-bold ">Name  </td>
                                <td>{{ $patient->name }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold ">Emergency Contact  </td>
                                <td>{{ $patient->emergency_contact }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">Number </td>
                                <td>{{ $patient->phone_number }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold ">Emergency Number </td>
                                <td>{{ $patient->emergency_number }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold ">Age  </td>
                                <td>{{ $patient->age }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold ">Address </td>
                                <td>{{ $patient->address }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold ">gender </td>
                                <td>{{ $patient->gender }}</td>
                            </tr>
                        </tbody>
                    </table>         
                </div>
            </div>
        </div>
    </div>
</x-app-layout>