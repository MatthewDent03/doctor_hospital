@props(['patients', 'field' => '','selected' => null])

<select {{ $attributes->merge(['class' => 'form-select']) }}>
    @foreach ($patients as $patient)
        <option value="{{ $patient->id }}" {{ $selected == $patient->id ? 'selected' : '' }}>
            {{ $patient->name }}
        </option>
    @endforeach
</select>

@error($field)
<div class="text-red-600 text-sm">{{ $message }}</div>
@enderror