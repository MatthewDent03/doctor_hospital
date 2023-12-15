<x-app-layout> <!-- Inputting layout from app blade for edit page -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Doctor') }}
        </h2>
    </x-slot>
<!-- Created a route through a button to the update function in the controller as well as text inputs and areas for data with old values as temp data to be edited -->
    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
            <form action="{{ route('admin.doctors.update', $doctor) }}" method="post" enctype="multipart/form-data">   <!--routing to update function -->

                @method('put')
                @csrf
                <x-text-input
                    type="text"
                    name="first_name"
                    field="first_name"
                    placeholder="First Name..."
                    class="w-full"
                    :value="@old('first_name', $doctor->first_name)">  <!-- calling old data inputs -->
                </x-text-input>


                <x-text-input
                    type="text"
                    name="last_name"
                    field="last_name"
                    placeholder="Last Name..."
                    class="w-full"
                    :value="@old('last_name', $doctor->last_name)">
                </x-text-input>

                <x-text-input
                    type="text"
                    name="email"
                    field="email"
                    placeholder="Email..."
                    class="w-full"
                    :value="@old('email', $doctor->email)">
                </x-text-input>

                <x-text-input
                    type="text"
                    name="facility"
                    field="facility"
                    placeholder="Facility..."
                    class="w-full"
                    :value="@old('facility', $doctor->facility)">
                </x-text-input>

                <x-text-input
                    type="number"
                    name="phone_number"
                    field="phone_number"
                    placeholder="Phone Number..."
                    class="w-full"
                    :value="@old('phone_number', $doctor->phone_number)">
                </x-text-input>

                <div class="form-group">
        <label for="patients"><strong>Patients</strong><br></label>
        @foreach ($patients as $patient)
            <div class="form-check">
                <input
                    type="checkbox"
                    value="{{ $patient->id }}"
                    name="patients[]"
                    {{ in_array($patient->id, $doctor->patients->pluck('id')->toArray()) ? 'checked' : '' }}    <!--creating checkboxes and dropdowns for foreign table atttributes -->
                >
                <label class="form-check-label">{{ $patient->name }}</label>
            </div>
        @endforeach
    </div>

    <div class="form-group">
        <label for="hospital_id"><strong>Hospital</strong><br></label>
        <select name="hospital_id" class="form-control">
            @foreach ($hospitals as $hospital)
                <option value="{{ $hospital->id }}" {{ $hospital->id == $doctor->hospital_id ? 'selected' : '' }}>
                    {{ $hospital->name }}
                </option>
            @endforeach
        </select>
    </div>



                <x-primary-button class="mt-6">Save Edit</x-primary-button> <!-- Created a save button to route to store function -->
                </form>
            </div>
        </div>
    </div>
</x-app-layout>