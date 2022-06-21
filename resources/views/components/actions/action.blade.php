<x-tables::actions.wrapper
    :tag="$url ? 'a' : 'button'"
    :href="$isEnabled() ? $getUrl() : null"
    :target="$shouldOpenUrlInNewTab() ? '_blank' : null"
    :disabled="$isDisabled()"
    class="text-sm font-medium"
>
    {{ $getLabel() }}
</x-tables::actions.wrapper>
