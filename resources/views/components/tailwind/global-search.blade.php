<div class="relative">
    <input
        {{ $attributes->merge(['class' => 'border-gray-300 focus:ring-1 focus:ring-blue-900 focus:border-blue-900 block w-full text-sm rounded-md']) }}
        name="filter[global]"
        type="search"
        placeholder="Search..."
        aria-label="Global search"
        value="{{ request('filter.global') }}"
    >
</div>
