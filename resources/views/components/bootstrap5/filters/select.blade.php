<select class="form-control" name="{{ $name }}">
    @foreach($filter->options as $key => $option)
        <option
            value="{{ $key }}"
            {{ $isSelected($key) ? 'selected' : '' }}
        >
            {{ $option }}
        </option>
    @endforeach
</select>
