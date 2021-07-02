<div class="relative">
    <input
        class="border-gray-300 focus:ring-1 focus:ring-blue-900 focus:border-blue-700 block w-full pr-10 text-sm rounded-md"
        name="filter[global]"
        type="text"
        placeholder="Search..."
        aria-label="Global search"
        value="{{ request('filter.global') }}"
    >

    <x-table::icons.search class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-400"/>
</div>
