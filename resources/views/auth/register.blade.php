<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="flex-col justify-center items-center content-center mb-4">
            <div class="flex justify-center">
                <img src="{{ asset('logo.svg') }}" alt="" class="h-16 flex">
            </div>
            <h2 class="text-center font-bold text-2xl text-[#020817] mt-4">Gestão de Certificados</h2>
       </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirme a senha')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex-col items-center justify-center mt-4">
            <button type="submit"  class="bg-gradient-to-tr from-[#1A2856] to-[#334EA9] h-12 rounded-md px-4 text-white font-semibold text-base flex items-center justify-center w-full">
                Cadastrar
            </button>
           <div class="flex items-center justify-center mt-4 w-full">
             <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Já registrado?') }}
            </a>
           </div>
        </div>
    </form>
</x-guest-layout>
