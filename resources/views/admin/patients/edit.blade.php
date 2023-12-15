<x-app-layout> <!-- Inputting layout from app blade for edit page -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Patient') }}
        </h2>
    </x-slot>
<!-- Created a route through a button to the update function in the controller as well as text inputs and areas for data with old values as temp data to be edited -->
    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.patients.update', $patient) }}" method="post" enctype="multipart/formdata">
                @method('put')
                @csrf
                <x-text-input
                    type="text"
                    name="name"
                    field="name"
                    placeholder="Name..."
                    class="w-full"
                    :value="@old('name', $patient->name)">
                </x-text-input>

                <x-text-input
                    type="text"
                    name="emergency_contact"
                    field="emergency_contact"
                    placeholder="Emergency Contact..."
                    class="w-full"
                    :value="@old('emergency_contact', $patient->emergency_contact)">
                </x-text-input>

                <x-text-input
                    type="text"
                    name="phone_number"
                    field="phone_number"
                    placeholder="Phone Number..."
                    class="w-full"
                    :value="@old('phone_number', $patient->phone_number)">
                </x-text-input>

                <x-text-input
                    type="text"
                    name="emergency_number"
                    field="emergency_number"
                    placeholder="Emergency Number..."
                    class="w-full"
                    :value="@old('emergency_number', $patient->emergency_number)">
                </x-text-input>

                <x-text-input
                    type="number"
                    name="age"
                    field="age"
                    placeholder="Age..."
                    class="w-full"
                    :value="@old('age', $patient->age)">
                </x-text-input>

                <x-text-input
                    type="text"
                    name="address"
                    field="address"
                    placeholder="Address..."
                    class="w-full"
                    :value="@old('address', $patient->address)">
                </x-text-input>

                <x-text-input
                    type="text"
                    name="gender"
                    field="gender"
                    placeholder="Gender..."
                    class="w-full"
                    :value="@old('gender', $patient->gender)">
                </x-text-input>
                <x-select-doctor name="doctor_id" :doctors="$doctors" :selected="$patient->doctor_id"/>

                <x-primary-button class="mt-6">Save Edit</x-primary-button> <!-- Created a save button to route to store function -->
                </form>
            </div>
        </div>
    </div>
</x-app-layout>