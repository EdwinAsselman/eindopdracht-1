<div>
    {{-- NOTIFICATIONS --}}
    @include('shared.notifications')

    <div class="flex gap-3">
        {{-- SEARCH... --}}
        @include('shared.search', [
            'subject' => 'gebruikers'
        ])
        
        {{-- PAGINATOR --}}
        @include('shared.paginator')
    </div>
    
    <div class="bg-white dark:bg-gray-800 dark:text-white mt-2 shadow-xl sm:rounded-md" wire:loading.class="opacity-50">
        <table class="w-full text-left">
            <thead>
                <tr class="uppercase">
                    <th class="px-2 py-2">#</th>
                    <th class="px-2 py-2">Gebruikers naam</th>
                    <th class="px-2 py-2">Aantal bands</th>
                    <th class="px-2 py-2">Geregistreerd op</th>
                    <th class="px-2 py-2"></th>
                </tr>
            </thead>
            <tbody>
    
                @forelse($users as $user)
                    <tr class="border-t dark:border-gray-700">
                        <td class="px-2 py-2">{{ $user->id }}</td>
                        <td class="px-2 py-2">
                            <a href="{{ route('user.details', [ 'userId' => $user->id ]) }}" class="text-indigo-500">
                                {{ $user->name }}
                            </a>

                            @auth
                                @if( Auth::user()->name == $user->name )

                                    <span class="italic text-xs dark:text-gray-300">Dit bent u</span>

                                @endif
                            @endauth
                        </td>
                        <td class="px-2 py-2">
                            {{ $user->bands->count() }}
                        </td>
                        <td class="px-2 py-2">
                            {{ $user->joined }}
                        </td>
                        <td>
                            @auth
                                @if( Auth::user()->id == $user->id )

                                <a href="{{ route('profile.show') }}" class="text-indigo-500">
                                    profiel
                                </a>

                                @endif
                            @endauth
                        </td>
                    </tr>
                @empty
                    <tr class="border-t border-separate dark:border-gray-700">
                        <td class="px-2 py-2 text-center" colspan="5">
                            <span>Er zijn geen gebruikers gevonden...</span>
                            <br />
                        </td>
                    </tr>
                @endforelse
    
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
