@php
    $oldValue = old(strtolower($use));
    if (is_array($oldValue)) {
        $oldValue = '';
    }
@endphp

<label for={{ 'comic-'. strtolower($use) }} class="font-bold">{{ $use }} </label><br>
<input 
    class="border border-gray-500"
    type="text" 
    id={{ 'comic-'. strtolower($use) }}
    name="{{ strtolower($use) }}" 
    value="{{ $oldValue }}"
>
<br>
@if (!empty($help))
    <p class="text-gray-500 text-sm" id="input-help">{{ $help }}</p>
@endif
