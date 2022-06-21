<x-tables::actions.wrapper
    :tag="'button'"
    :href="$isEnabled() ? $getUrl() : null"
    :target="$shouldOpenUrlInNewTab() ? '_blank' : null"
    :disabled="$isDisabled()"
    :color="$getColor()"
    :icon="$getIcon()"
    :size="$getSize() ?? 'sm'"
    :icon-position="$getIconPosition()"
    :outlined="$isOutlined()"
    :dark-mode="config('tables.dark_mode')"
    class="text-sm font-medium"
>
    {{ $getLabel() }}
</x-tables::actions.wrapper>
