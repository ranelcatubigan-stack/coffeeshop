<x-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-serif font-bold text-[#3d2b1f]">Join the Club</h2>
        <p class="text-[#706f6c] text-sm">Become a member for exclusive brews and rewards.</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Name')" class="text-[#3d2b1f] font-medium" />
            <x-text-input id="name" class="block mt-1 w-full border-[#e3e3e0] focus:border-[#6f4e37] focus:ring-[#6f4e37] rounded-xl shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" class="text-[#3d2b1f] font-medium" />
            <x-text-input id="email" class="block mt-1 w-full border-[#e3e3e0] focus:border-[#6f4e37] focus:ring-[#6f4e37] rounded-xl shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-[#3d2b1f] font-medium" />
            <x-text-input id="password" class="block mt-1 w-full border-[#e3e3e0] focus:border-[#6f4e37] focus:ring-[#6f4e37] rounded-xl shadow-sm"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-[#3d2b1f] font-medium" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full border-[#e3e3e0] focus:border-[#6f4e37] focus:ring-[#6f4e37] rounded-xl shadow-sm"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="role" :value="__('Register As')" class="text-[#3d2b1f] font-medium" />
            <select name="role" id="role" class="block mt-1 w-full border-[#e3e3e0] focus:border-[#6f4e37] focus:ring-[#6f4e37] rounded-xl shadow-sm bg-white text-[#3d2b1f] py-2 px-3">
                <option value="user">Customer</option>
                <option value="staff">Staff</option>
            </select>
        </div>

        <div class="flex flex-col gap-4 mt-8">
            <x-primary-button class="w-full justify-center py-3 bg-[#3d2b1f] hover:bg-[#2a1d15] rounded-full text-white shadow-lg transition-all border-none">
                {{ __('Create Account') }}
            </x-primary-button>

            <a class="text-center text-xs text-[#706f6c] hover:text-[#3d2b1f] underline underline-offset-4 transition-colors" href="{{ route('login') }}">
                {{ __('Already registered? Sign in instead') }}
            </a>
        </div>
    </form>
</x-guest-layout>