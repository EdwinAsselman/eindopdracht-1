<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            @isset( $band )
                {{ __('Wijzig band') . ' ' . $band->name }}
            @else
                {{ __('Maak band') }}
            @endisset
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @isset( $band )
                @livewire('bands.band-form', [ 
                    'band' => $band
                ])
            @else
                @livewire('bands.band-form')
            @endisset
        </div>
    </div>
</x-app-layout>
