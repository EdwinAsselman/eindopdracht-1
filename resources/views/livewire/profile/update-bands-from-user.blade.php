<x-jet-form-section submit="save">
    <x-slot name="title">
        {{ __('Gekoppelde Bands') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Bewerk hier de bands die u beheert.') }}
    </x-slot>

    <x-slot name="form">
        
        <!-- Bands -->
        <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="bands" value="{{ __('Bands') }}" />

                @foreach( $addedBands as $key => $addedBand )
                    <div class="flex">
                        <span class="font-semibold text-xl m-4 dark:text-gray-300">{{ $loop->iteration }}.</span>
                        <x-input.select class="mt-1 block w-full" wire:model="addedBands.{{ $key }}">

                            <option selected value="">Selecteer een band...</option>
                            @foreach( $bands as $band )
                                <option value="{{ $band->id }}">{{ $band->name }}</option>
                            @endforeach

                        </x-input.select>
                        <x-icon.delete wire:click="removeBand({{ $key }})" class="m-4" />
                    </div>
                @endforeach

                <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Add new band -->
        <div class="col-span-6 sm:col-span-4">
            <input type="button" wire:click="addNewBand" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition dark:bg-gray-700 dark:hover:bg-gray-500" value="voeg nieuwe band toe" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Opgeslagen.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Opslaan') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
