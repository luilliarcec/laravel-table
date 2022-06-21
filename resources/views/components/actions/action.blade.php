<x-tables::actions.wrapper
    :tag="$url ? 'a' : 'button'"
    :href="$isEnabled() ? $getUrl() : null"
    :target="$shouldOpenUrlInNewTab() ? '_blank' : null"
    :disabled="$isDisabled()"
    :color="$getColor()"
    :icon="$getIcon()"
    :dark-mode="config('tables.dark_mode')"
    class="text-sm font-medium"
>
    {{ $getLabel() }}
</x-tables::actions.wrapper>
