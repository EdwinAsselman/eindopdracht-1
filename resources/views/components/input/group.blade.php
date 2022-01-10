@props([
    'label',
])

<div class="flex flex-col my-4 w-1/2">
    <label class="dark:text-white">{{ $label }}</label>
    {{ $slot }}
</div>