@php
    $isRtl = __('table::layout.direction') === 'rtl';
    $previousArrowIcon = $isRtl ? 'heroicon-o-chevron-right' : 'heroicon-o-chevron-left';
    $nextArrowIcon = $isRtl ? 'heroicon-o-chevron-left' : 'heroicon-o-chevron-right';
@endphp

@if ($paginator->hasPages())
    <nav
        role="navigation"
        aria-label="{{ __('tables::table.pagination.label') }}"
        class="flex items-center justify-between blade-tables-pagination"
    >
        <x-tables::pagination.mobile
            :table-name="$tableName"
            :paginator="$paginator"
            :previous-arrow-icon="$previousArrowIcon"
            :next-arrow-icon="$nextArrowIcon"
            :records-per-page-select-options="$recordsPerPageSelectOptions"
        />

        <x-tables::pagination.desktop
            :table-name="$tableName"
            :paginator="$paginator"
            :elements="$elements"
            :previous-arrow-icon="$previousArrowIcon"
            :next-arrow-icon="$nextArrowIcon"
            :records-per-page-select-options="$recordsPerPageSelectOptions"
        />
    </nav>
@endif
