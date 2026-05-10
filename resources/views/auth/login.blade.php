<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
       <div class="flex justify-center">
            <a href="/"> 
             <img src="{{ asset('logo.svg') }}" alt="" class="h-16">
            </a>
       </div>
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Lembre de mim') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit"  class="bg-gradient-to-tr from-[#1A2856] to-[#334EA9] h-12 rounded-md px-4 text-white font-semibold text-base flex items-center justify-center w-full">
                Entrar
            </button>
        </div>
    </form>
</x-guest-layout>
