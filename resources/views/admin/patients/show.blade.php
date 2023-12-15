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
                                <td rowspan="6">
                                    @if ($patient_image_name)
                                        <img src="{{ asset($patient_image_name) }}" alt="{{ $patient->name }}" width="100">  <!-- displaying image and hardcoded default image -->
                                    @else
                                        <!-- Hardcoded default image path -->
                                        <img src="{{ asset('images/default-image.jpg') }}" alt="Default Image" width="100">
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td class="font-bold ">Name  </td>
                                <td>{{ $patient->name }}</td>
                            </td>
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
                            
                            </tr>

                            <tr>
                                <td class="font-bold ">Address </td>
                                <td>{{ $patient->address }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold ">gender </td>
                                <td>{{ $patient->gender }}</td>  <!-- displaying data and attributes -->
                            </tr>
                            @forelse ($doctors as $doctor)
                                <x-card>
                                    <a href="{{ route('admin.doctors.show', $doctor) }}" class="font-bold text-2x1">{{ $doctor->last_name }}</a>  <!-- routing to the show function in the controller -->
                                </x-card>
                            @empty
                                <p>No doctors for this hospital</p>
                            @endforelse
                        </tbody>
                    
                    </table>
                    <table>
                        <tr>
                            <td><x-primary-button><a href="{{ route('admin.patients.edit', $patient) }}">Edit</a> </x-primary-button></td>
                            <!-- created a button for route for the edit function in the controller and the destroy function -->
                            <td><form method="POST" action="{{ route('admin.patients.destroy', $patient->id) }}"> @csrf @method('DELETE') <x-tertiary-button onclick="return confirm('Are you sure you want to delete?')">DELETE</x-tertiary-button></form></td>
                        </tr>
                    </table>               
                </div>
            </div>
        </div>
    </div>
</x-app-layout>