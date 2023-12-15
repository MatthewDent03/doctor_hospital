<x-app-layout> <!-- Implementing an app layout from the layouts folder and calling the app.blade.php -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Patient') }}
        </h2>
    </x-slot>
<!-- Creating a button for the store function in the controller to be active -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.patients.store') }}" method="post" enctype="multipart/form-data">

                    @csrf
                    <x-text-input
                        type="text"
                        name="name"
                        field="name"
                        placeholder="Name..."
                        class="w-full"
                        autocomplete="off"
                        :value="@old('name')"></x-text-input>

                    <x-text-input
                        type="text"
                        name="emergency_contact"
                        field="emergency_contact"
                        placeholder="Emergency Contact..."
                        class="w-full mt-6"
                        :value="@old('emergency_contact')"></x-text-input>

                    <!-- Created text inputs and text areas to input data into the variables for the components -->
                    <x-text-input
                        type="number"
                        name="phone_number"
                        placeholder="Phone Number..."
                        class="w-full mt-6"
                        field="phone_number"
                        :value="@old('phone_number')">>
                    </x-text-input>

                    <x-text-input
                        type="number"
                        name="emergency_number"
                        placeholder="Emergency Number..."
                        class="w-full mt-6"
                        field="emergency_number"
                        :value="@old('emergency_number')">>
                    </x-text-input>

                    <x-text-input
                        type="number"
                        name="age"
                        placeholder="Age..."
                        class="w-full mt-6"
                        field="age"
                        :value="@old('age')">>
                    </x-text-input>

                    <x-text-input
                        type="text"
                        name="address"
                        placeholder="Address..."
                        class="w-full mt-6"
                        field="address"
                        :value="@old('address')">>
                    </x-text-input>

                    <x-text-input
                        type="text"
                        name="gender"
                        placeholder="Gender..."
                        class="w-full mt-6"
                        field="gender"
                        :value="@old('gender')">>
                    </x-text-input>

<!-- Creating a button for the create function -->
                    <x-primary-button class="mt-6">Create Patient</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>