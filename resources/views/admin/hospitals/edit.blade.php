<x-app-layout> <!-- Inputting layout from app blade for edit page -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Hospital') }}
        </h2>
    </x-slot>
<!-- Created a route through a button to the update function in the controller as well as text inputs and areas for data with old values as temp data to be edited -->
    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">  <!-- Added a form action to change route to update function in controller once button is clicked -->
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.hospitals.update', $hospital) }}" method="post" enctype="multipart/formdata">
                @method('put')
                @csrf
                <x-text-input
                    type="text"
                    name="name"
                    field="name"
                    placeholder="Name..."
                    class="w-full"
                    :value="@old('name', $hospital->name)">
                </x-text-input>
<!-- retrieving old data inputs incase of page failure to prevent excessive time spent on form -->
                <x-text-input
                    type="text"
                    name="address"
                    field="address"
                    placeholder="Address..."
                    class="w-full"
                    :value="@old('address', $hospital->address)">
                </x-text-input>

                <x-text-input
                    type="number"
                    name="phone_number"
                    field="phone_number"
                    placeholder="Phone Number..."
                    class="w-full"
                    :value="@old('phone_number', $hospital->phone_number)">
                </x-text-input>
                <x-primary-button class="mt-6">Save Edit</x-primary-button> <!-- Created a save button to route to store function -->
                </form>
            </div>
        </div>
    </div>
</x-app-layout>