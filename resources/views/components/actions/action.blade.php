<x-tables::actions.wrapper
    :tag="$url ? 'a' : 'button'"
{{--    :href="$isEnabled() ? $getUrl() : null"--}}
    :target="$shouldOpenUrlInNewTab() ? '_blank' : null"
    class="text-sm font-medium"
>
    Acción
</x-tables::actions.wrapper>
