<x-app-layout> <!-- Implementing an app layout from the layouts folder and calling the app.blade.php -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Doctor') }}
        </h2>
    </x-slot>
<!-- Creating a button for the store function in the controller to be active -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.doctors.store') }}" method="post" enctype="multipart/form-data">    <!-- creating a route to the store function -->
                    @csrf
                    <x-text-input
                        type="text"
                        name="first_name"
                        field="first_name"
                        placeholder="First Name..."
                        class="w-full"
                        autocomplete="off"
                        :value="@old('first_name')"></x-text-input>   <!-- calling old data inputs -->

                    <x-text-input
                        type="text"
                        name="last_name"    
                        field="last_name"
                        placeholder="Last Name..."
                        class="w-full mt-6"
                        :value="@old('last_name')"></x-text-input>

                    <!-- Created text inputs and text areas to input data into the variables for the components -->
                    <x-textarea
                        name="facility"
                        field="facility"
                        placeholder="Facility..."
                        class="w-full mt-6"
                        :value="@old('facility')">
                    </x-textarea>   <!--creating text areas through components to create attributes and their formatting -->

                    <x-textarea
                        name="email"
                        field="email"
                        placeholder="Email..."
                        class="w-full mt-6"
                        :value="@old('email')">
                    </x-textarea>
                  
                    <x-text-input
                        type="number"
                        name="phone_number"
                        placeholder="Phone Number..."
                        class="w-full mt-6"
                        field="phone_number"
                        :value="@old('phone_number')">>
                    </x-text-input>

                    <div class="mt-6">
                        <x-select-patient name="patients[]" :patients="$patients" :selected="old('patients', [])"/>   <!-- creating selection options through component for foreign table attributes -->
                    </div>
                    <div class="mt-6">
                        <x-select-hospital name="hospital_id" :hospitals="$hospitals" :selected="old('hospital_id')"/>
                    </div>
<!-- Creating a button for the create function -->
                    <x-primary-button class="mt-6">Create Doctor</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>