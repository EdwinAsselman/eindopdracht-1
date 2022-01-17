<x-app-layout>
    <x-slot name="header">
        <div class="flex gap-4">
            <div class="flex-col">
                <h2 class="py-4 font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                    {{ $user->name }}
                </h2>
                <span class="text-gray-800 dark:text-gray-300">Geregistreerd op: {{ $user->joined }}</span>
            </div>

            <div class="my-4">
                <a class="bg-indigo-600 hover:bg-indigo-500 rounded-md text-white hover:text-gray-200 p-2 cursor-pointer text-sm" href="{{ route('users') }}">Terug naar overzicht</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h2 class="text-2xl mt-4 dark:text-white">Bands</h2>
            <div class="grid grid-cols-3 gap-6">
                @forelse( $user->bands as $band )
                    <div class="shadow bg-white dark:bg-gray-800 rounded-md p-4 flex flex-col text-center items-center">
                        <div class="bg-no-repeat bg-cover rounded-full bg-center border-2 w-14 h-14" style="background-image: url({{ url( '/storage/photos/' . $band->logo) }});"></div>
                        <a class="text-indigo-500 pt-2" href="{{ route('band.details', [ 'bandId' => $band->id ]) }}" target="_blank">{{ $band->name }}</a>

                        <span class="text-gray-800 dark:text-gray-300">Aantal beheerders: {{ $band->users->count() }}</span>
                    </div>
                @empty
                    <span class="dark:text-white">Geen bands...</span>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>