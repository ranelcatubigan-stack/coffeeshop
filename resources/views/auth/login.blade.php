<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-serif font-bold text-[#3d2b1f]">Welcome Back</h2>
        <p class="text-[#706f6c] text-sm">Grab a cup and sign in to your account.</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-[#3d2b1f] font-medium" />
            <x-text-input id="email" 
                class="block mt-1 w-full border-[#e3e3e0] focus:border-[#6f4e37] focus:ring-[#6f4e37] rounded-xl shadow-sm" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autofocus 
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-[#3d2b1f] font-medium" />
            <x-text-input id="password" 
                class="block mt-1 w-full border-[#e3e3e0] focus:border-[#6f4e37] focus:ring-[#6f4e37] rounded-xl shadow-sm"
                type="password"
                name="password"
                required 
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" 
                    class="rounded-md border-gray-300 text-[#6f4e37] shadow-sm focus:ring-[#6f4e37]" 
                    name="remember">
                <span class="ms-2 text-sm text-[#706f6c]">{{ __('Stay logged in') }}</span>
            </label>
        </div>

        <div class="flex flex-col gap-4 mt-6">
            <x-primary-button class="w-full justify-center py-3 bg-[#3d2b1f] hover:bg-[#2a1d15] active:bg-[#3d2b1f] rounded-full text-white shadow-lg transition-all border-none">
                {{ __('Sign In') }}
            </x-primary-button>

            @if (Route::has('password.request'))
                <a class="text-center text-xs text-[#706f6c] hover:text-[#3d2b1f] underline underline-offset-4 transition-colors" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>
    </form>
</x-guest-layout>