<div class="col-9 col-md-8 mt-2">
    <input
        {{ $attributes->merge(['class' => 'form-control']) }}
        name="filter[global]"
        type="text"
        placeholder="Search..."
        aria-label="Global search"
        value="{{ request('filter.global') }}"
    >
</div>
