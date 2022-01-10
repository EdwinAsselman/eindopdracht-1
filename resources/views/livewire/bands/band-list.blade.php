<div>
    {{-- NOTIFICATIONS --}}
    @include('shared.notifications')

    <div class="flex gap-3">
        {{-- SEARCH... --}}
        @include('shared.search', [
            'subject' => 'bands'
        ])
        
        {{-- PAGINATOR --}}
        @include('shared.paginator')

        @auth
            <a class="flex-initial bg-indigo-600 hover:bg-indigo-500 rounded-md text-white hover:text-gray-200 cursor-pointer pt-3 px-2 text-sm" href="{{ route('create.band') }}">
               <x-icon.plus /> Maak band
            </a>
        @endauth
    </div>
    
    <div class="bg-white dark:bg-gray-800 dark:text-white mt-2 shadow-xl sm:rounded-md" wire:loading.class="opacity-50">
        <table class="w-full text-left">
            <thead>
                <tr class="uppercase">
                    <th class="px-2 py-2">#</th>
                    <th class="px-2 py-2">Logo</th>
                    <th class="px-2 py-2">Band naam</th>
                    <th class="px-2 py-2"></th>
                </tr>
            </thead>
            <tbody>
    
                @forelse($bands as $band)
                    <tr class="border-t dark:border-gray-700">
                        <td class="px-2 py-2">{{ $band->id }}</td>
                        <td class="mx-auto py-2">
                            <div class="bg-no-repeat bg-cover rounded-full bg-center border-2 w-14 h-14" style="background-image: url({{ url( '/storage/photos/' . $band->logo) }});"></div>
                        </td>
                        <td class="px-2 py-2">
                            <a href="{{ route('band.details', [ 'bandId' => $band->id ]) }}" class="text-indigo-500">{{ $band->name }}</a>
                        </td>
                        <td class="px-2 py-2">
                            @auth
                                <span class="flex">
                                    <a href="{{ route('band.edit', [ 'bandId' => $band->id ]) }}">
                                        <x-icon.edit />
                                    </a>
                                    <x-icon.delete wire:click="showDeleteModal( {{ $band->id }} )" />
                                </span>
                            @endauth
                        </td>
                    </tr>
                @empty
                    <tr class="border-t border-separate dark:border-gray-700">
                        <td class="px-2 py-2 text-center" colspan="4">
                            <span>Er zijn geen bands gevonden...</span>
                            <br />

                            @auth
                                <a class="bg-indigo-600 my-2 hover:bg-indigo-500 rounded-md text-white hover:text-gray-200 p-2 cursor-pointer text-sm" href="{{ route('create.band') }}">
                                    <x-icon.plus /> Maak band
                                </a>
                            @else
                                <span>login of maak een account om uw eigen band aan te maken.</span>
                                <br />
                                <a class="bg-indigo-600 hover:bg-indigo-500 rounded-md text-white hover:text-gray-200 p-2 cursor-pointer text-sm" href="{{ route('login') }}">Login</a>
                                <a class="bg-indigo-600 hover:bg-indigo-500 rounded-md text-white hover:text-gray-200 p-2 cursor-pointer text-sm ml-1" href="{{ route('register') }}">Registreer</a>
                            @endauth
                        </td>
                    </tr>
                @endforelse
    
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $bands->links() }}
    </div>

    {{-- DELETE MODAL --}}
    @include('shared.delete-modal')
</div>
