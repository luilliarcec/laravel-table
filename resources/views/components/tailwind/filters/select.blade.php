<select
    class="block focus:ring-1 focus:ring-blue-900 focus:border-blue-900 w-full shadow-sm text-sm border-gray-300 rounded-md"
    name="{{ $name }}"
>
    @foreach($filter->options as $key => $option)
        <option
            value="{{ $key }}"
            {{ $isSelected($key) ? 'selected' : '' }}
        >
            {{ $option }}
        </option>
    @endforeach
</select>
