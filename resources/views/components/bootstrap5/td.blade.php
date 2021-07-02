@if($show())
    <td {{ $attributes }}>
        {{ $slot }}
    </td>
@endif
