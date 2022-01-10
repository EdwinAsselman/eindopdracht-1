@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-lg dark:text-white">
            {{ $title }}
        </div>

        <div class="mt-4 dark:text-gray-300">
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 dark:bg-gray-600 text-right">
        {{ $footer }}
    </div>
</x-jet-modal>
