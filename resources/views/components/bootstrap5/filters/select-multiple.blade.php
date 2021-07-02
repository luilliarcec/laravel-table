<select class="form-control" name="{{ $name }}" multiple>
    @foreach($filter->options as $key => $option)
        <option
            value="{{ $key }}"
            {{ $isSelected($key) ? 'selected' : '' }}
        >
            {{ $option }}
        </option>
    @endforeach
</select>
