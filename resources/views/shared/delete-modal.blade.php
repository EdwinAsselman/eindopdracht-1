@if( $showDeleteModal )
    <div class="absolute top-0 flex justify-center items-center h-screen left-0 right-0 bg-black bg-opacity-50">
        <div class="sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 dark:border-gray-800 dark:text-white shadow-xl rounded-md border p-4">
                <form wire:submit.prevent="deleteSelected">
                    <h2 class="text-xl">Weet je zeker dat je band {{ $selected->name }} wilt verwijderen?</h2>

                    <br />
                    <br />

                    <x-input.danger type="submit">Verwijderen</x-input.danger>
                    <x-input.cancel wire:click="$set('showDeleteModal', false)" type="button" value="Annuleren">Annuleren</x-input.cancel>
                </form>
            </div>
        </div>
    </div>
@endif