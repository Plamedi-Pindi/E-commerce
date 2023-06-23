<div class="register-container">
    <x-guest-layout>
        <x-jet-authentication-card>
            <x-slot name="logo">
                <h2>Registar-se</h2>
            </x-slot>

            <x-jet-validation-errors class="mb-4 reg-alert" />

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="half">
                    <div class="mt-4">
                        <x-jet-label for="firstName" value="{{ __('Primeiro Nome') }}" />
                        <x-jet-input id="firstName" class="block mt-1 w-full" type="text" name="firstName"
                            :value="old('firstName')" required autofocus autocomplete="firstName" placeholder="Primeiro nome" />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="lastName" value="{{ __('Último Nome') }}" />
                        <x-jet-input id="lastName" class="block mt-1 w-full" type="text" name="lastName"
                            :value="old('lastName')" required autofocus autocomplete="lastName" placeholder="Último Nome" />
                    </div>
                </div>

                <div class="half">
                    <div class="mt-4">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required placeholder="Email" />
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="genero" value="{{ __('Genero') }}" />
                        <select name="gemero" id="gemero" :value="old('gener')" class="block mt-1 w-full">
                            <option value="#" class="selected"> Seleciona uma opção</option>
                            <option value="#">Masculino</option>
                            <option value="#">Femenino</option>
                        </select>
                    </div>

                </div>

                <div class="half">
                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Senha') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Senha" />

                        <p><span>*</span>Deve possuir no mínimo 8 caracteres!</p>
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirmar senha') }}" />
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Confirmar senha" />
                    </div>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms" />

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' =>
                                            '<a target="_blank" href="' .
                                            route('terms.show') .
                                            '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                            __('Terms of Service') .
                                            '</a>',
                                        'privacy_policy' =>
                                            '<a target="_blank" href="' .
                                            route('policy.show') .
                                            '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                            __('Privacy Policy') .
                                            '</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Já possui uma conta?') }}
                    </a>

                    <x-jet-button class="ml-4">
                        {{ __('Registar') }}
                    </x-jet-button>
                </div>

                <a class="reg-back" href="{{ route('login') }}">
                    <?xml version="1.0" encoding="utf-8"?>
                    <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                    <svg width="30px" height="30px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#000000" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z" />
                        <path fill="#000000"
                            d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z" />
                    </svg>
                </a>

            </form>
        </x-jet-authentication-card>
    </x-guest-layout>
</div>
