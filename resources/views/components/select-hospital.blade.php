@props(['hospitals', 'field' => '','selected' => null])

<select {{ $attributes->merge(['class' => 'form-select']) }}>
    @foreach ($hospitals as $hospital)
        <option value="{{ $hospital->id }}" {{ $selected == $hospital->id ? 'selected' : '' }}>
            {{ $hospital->name }}
        </option>
    @endforeach
</select>

@error($field)
<div class="text-red-600 text-sm">{{ $message }}</div>
@enderror