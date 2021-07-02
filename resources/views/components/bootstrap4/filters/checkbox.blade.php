@foreach($filter->options as $key => $option)
    <div class="form-check">
        <input
            class="form-check-input"
            type="checkbox"
            name="{{ $name }}"
            value="{{ $key }}"
            id="check_option_{{ $key }}"
            {{ $isSelected($key) ? 'checked' : '' }}
        >

        <label class="form-check-label" for="check_option_{{ $key }}">
            {{ $option }}
        </label>
    </div>
@endforeach
