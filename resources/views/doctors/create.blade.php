<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Doctor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('doctors.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-text-input
                        type="text"
                        name="first_name"
                        field="first_name"
                        placeholder="First Name..."
                        class="w-full"
                        autocomplete="off"
                        :value="@old('first_name')"></x-text-input>

                    <x-text-input
                        type="text"
                        name="last_name"
                        field="last_name"
                        placeholder="Last Name..."
                        class="w-full mt-6"
                        :value="@old('last_name')"></x-text-input>

                    <!-- I created a new component called textarea, you will need to do the same to using the x-textarea component -->
                    <x-textarea
                        name="facility"
                        field="facility"
                        placeholder="Facility..."
                        class="w-full mt-6"
                        :value="@old('facility')">
                    </x-textarea>

                    <x-textarea
                        name="email"
                        field="email"
                        placeholder="Email..."
                        class="w-full mt-6"
                        :value="@old('email')">
                    </x-textarea>
                  
                    <x-textarea
                        type="text"
                        name="phone_number"
                        placeholder="Phone Number..."
                        class="w-full mt-6"
                        field="phone_number"
                        :value="@old('phone_number')">>
                    </x-textarea>

                    <x-primary-button class="mt-6">Create Doctor</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>