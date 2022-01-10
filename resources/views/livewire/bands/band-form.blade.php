<div>
    <form wire:submit.prevent="save" method="post">
        <x-input.group label="Naam" :error="$errors->first('name')">
            <x-input.text name="name" wire:model="band.name" :error="$errors->first('name')" />
        </x-input.group>

        <x-input.group label="Biografie" :error="$errors->first('biography')">
            <x-input.textarea name="biography" wire:model.lazy="band.biography" :error="$errors->first('biography')" />
        </x-input.group>
        
        <x-input.group label="Beschrijving" :error="$errors->first('description')">
            <x-input.textarea rows="5" name="description" wire:model.lazy="band.description" :error="$errors->first('description')" />
        </x-input.group>

        <x-input.group label="Logo" :error="$errors->first('logo')">
            <div class="flex">
                <div class="items-center justify-center bg-grey-lighter">
                    <label class="w-64 flex flex-col items-center px-4 py-6 bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg shadow-lg tracking-wide uppercase cursor-pointer hover:text-gray-200">
                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 text-base leading-normal">Select a file</span>
                        <input wire:model="logo" type='file' class="hidden" />
                    </label>
                </div>

                @if( $logo )
                    @if( Storage::disk('photos')->exists($logo) )
                        <div class="flex-none ml-2 my-auto bg-no-repeat bg-cover rounded-full bg-center border-2 w-24 h-24" style="background-image: url({{ url( '/storage/photos/' . $logo) }});"></div>
                    @else
                        <div class="flex-none ml-2 my-auto bg-no-repeat bg-cover rounded-full bg-center border-2 w-24 h-24" style="background-image: url({{ $logo->temporaryUrl() }});"></div>
                    @endif
                @endif
            </div>
        </x-input.group>

        <x-input.group label="YouTube video's" :error="$errors->first('videos.*')">
            <span class="text-xs italic text-gray-700 dark:text-gray-300">
                Belangrijke opmerking: inplaats van een hele YouTube video URL, 
                hoeft alleen maar de video ID gegeven te worden (de 11 tekens aan het einde van een YouTube URL.)
            </span>

            <div class="flex">
                <x-input.text class="w-full" name="video-0" wire:model="videos.0.url" :error="$errors->first('videos.0.url')" />
            </div>
            <div class="flex">
                <x-input.text class="w-full" name="video-1" wire:model="videos.1.url" :error="$errors->first('videos.1.url')" />
            </div>
            <div class="flex">
                <x-input.text class="w-full" name="video-2" wire:model="videos.2.url" :error="$errors->first('videos.2.url')" />
            </div>
        </x-input.group>

        <x-input.submit>Opslaan</x-input.submit>

        <x-input.cancel href="{{ route('bands') }}">Annuleren</x-input.cancel>

        <x-icon.loading />
    </form>
</div>