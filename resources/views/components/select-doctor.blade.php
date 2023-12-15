<select {{ $attributes->merge(['class' => 'form-select']) }}>
    <option value="" disabled selected>Select Doctor</option>
    @foreach ($doctors as $doctor)
        <option value="{{ $doctor->id }}" {{ in_array($doctor->id, (array) $selected) ? 'selected' : '' }}>
            {{ $doctor->first_name }} {{ $doctor->last_name }}
        </option>
    @endforeach
</select>