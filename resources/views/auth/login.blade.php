<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class=" shadow-sm">
            <x-text-input class="block mt-1 w-full" type="text" id="username_or_email" name="username_or_email"
                :value="old('username_or_email')" required autofocus autocomplete="username_or_email" placeholder="Masukkan Email Anda" />
            <x-input-error :messages="$errors->get('username_or_email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4  shadow-sm">
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" placeholder="Masukkan Password Anda" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>


        <div class="mt-4">

            <x-primary-button
                class="w-full text-center justify-center cp-1 text-black font-extrabold shadow-sm hover:text-white h-[40px]">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
