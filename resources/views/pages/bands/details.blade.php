<x-app-layout>
    <x-slot name="header">
        <div class="flex gap-4">
            <div class="inline bg-no-repeat bg-cover rounded-full bg-center border-2 w-14 h-14" style="background-image: url({{ url( '/storage/photos/' . $band->logo) }});"></div>

            <div class="flex-col">
                <h2 class="pt-1 font-semibold text-xl text-gray-800 dark:text-white leading-tight">
                    {{ $band->name }}
                </h2>

                <div>
                    <span class="text-gray-800 dark:text-gray-300">Beheert door:</span>
                    @forelse( $band->users as $user )
                        
                        <a href="{{ route('user.details', [ 'userId' => $user->id ]) }}" target="_blank" class="text-indigo-500">{{ $user->name }}</a>

                    @empty

                        <span class="text-gray-800 dark:text-gray-300">niemand</span>

                    @endforelse
                </div>
            </div>
            @auth
                <span class="flex py-4">
                    <a href="{{ route('band.edit', [ 'bandId' => $band->id ]) }}">
                        <x-icon.edit />
                    </a>
                </span>
            @endauth

            <div class="my-4">
                <a class="bg-indigo-600 hover:bg-indigo-500 rounded-md text-white hover:text-gray-200 p-2 cursor-pointer text-sm" href="{{ route('bands') }}">Terug naar overzicht</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:text-white dark:bg-gray-800 mt-2 shadow-xl sm:rounded-md" wire:loading.class="opacity-50">
                <table class="w-full text-left">
                    <tr>
                        <th class="px-2 py-2">Biografie</th>
                        <td class="px-2 py-2">{{ $band->biography }}</td>
                    </tr>
                    <tr>
                        <th class="px-2 py-2">Beschrijving</th>
                        <td class="px-2 py-2">{{ $band->description }}</td>
                    </tr>
                </table>
            </div>

            <h2 class="text-2xl mt-4 dark:text-white">YouTube videos</h2>
            <div class="grid grid-cols-3 gap-6">
                @forelse( $band->videos as $video )
                    <div class="col-span-1">
                        <iframe class="object-fit" src="https://www.youtube.com/embed/{{ $video->url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                @empty
                    <span class="dark:text-white">Geen videos...</span>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>