<x-jet-action-section>
    <x-slot name="title">
        {{ __('Twee Factor Authenticatie') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Een extra optionele beveiligings optie voor een extra validatie elke wanneer u inlogt.') }}
    </x-slot>

    <x-slot name="content">
        <h3 class="text-lg font-medium text-gray-900 dark:text-white">
            @if ($this->enabled)
                {{ __('Twee Factor Authenticatie staat aan.') }}
            @else
                {{ __('Twee Factor Authenticatie staat niet aan.') }}
            @endif
        </h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600 dark:text-white">
            <p>
                {{ __('Wanneer verificatie met twee factoren is ingeschakeld, wordt u tijdens de verificatie gevraagd om een veilig, willekeurig token. U kunt dit token ophalen uit de Google Authenticator-applicatie van uw telefoon.') }}
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-gray-600 dark:text-white">
                    <p class="font-semibold">
                        {{ __('Twee factor authenticatie is nu ingeschakeld. Scan de volgende QR-code met de authenticatietoepassing van uw telefoon.') }}
                    </p>
                </div>

                <div class="mt-4">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-gray-600 dark:text-white">
                    <p class="font-semibold">
                        {{ __('Bewaar deze herstelcodes in een veilige wachtwoordmanager. Ze kunnen worden gebruikt om de toegang tot uw account te herstellen als uw twee-factor authenticatie-apparaat verloren gaat.') }}
                    </p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 dark:text-white dark:bg-gray-800 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-jet-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-jet-button type="button" wire:loading.attr="disabled">
                        {{ __('Zet aan') }}
                    </x-jet-button>
                </x-jet-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-jet-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            {{ __('Hergenereer Herstel Codes') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @else
                    <x-jet-confirms-password wire:then="showRecoveryCodes">
                        <x-jet-secondary-button class="mr-3">
                            {{ __('Toon Herstel Codes') }}
                        </x-jet-secondary-button>
                    </x-jet-confirms-password>
                @endif

                <x-jet-confirms-password wire:then="disableTwoFactorAuthentication">
                    <x-jet-danger-button wire:loading.attr="disabled">
                        {{ __('Zet uit') }}
                    </x-jet-danger-button>
                </x-jet-confirms-password>
            @endif
        </div>
    </x-slot>
</x-jet-action-section>
