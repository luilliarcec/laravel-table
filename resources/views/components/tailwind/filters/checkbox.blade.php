@foreach($filter->options as $key => $option)
    <div class="form-check">
        <input
            class="focus:ring-0 focus:ring-offset-0 h-4 w-4 text-blue-900 border-gray-300 rounded"
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
