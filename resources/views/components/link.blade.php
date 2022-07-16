@php
    $classes = "text-xs text-gray-500 hover:text-gray-900 ";
@endphp
<!-- Simplicity is an acquired taste. - Katharine Gerould -->
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
