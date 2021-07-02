<select
    class="border-gray-300 focus:ring-1 focus:ring-blue-900 focus:border-blue-700 block w-full pr-10 text-sm rounded-md"
    name="{{ $name }}"
    multiple
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
