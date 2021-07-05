@foreach($filter->options as $key => $option)
    <div class="custom-control custom-checkbox">
        <input
            class="custom-control-input filter-checkbox"
            type="checkbox"
            name="{{ $name }}"
            value="{{ $key }}"
            id="check_option_{{ $key }}"
            {{ $isSelected($key) ? 'checked' : '' }}
        >

        <label class="custom-control-label" for="check_option_{{ $key }}">
            {{ $option }}
        </label>
    </div>
@endforeach
