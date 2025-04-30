<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form class="space-y-6" action="{{ route('login') }}" method="POST">
    @csrf
        <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
            <div class="mt-2">
                <input type="email" name="email" id="email" autocomplete="email" required placeholder="masukan email"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-red-600 sm:text-sm/6" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>
        <div>
            <div class="flex items-center justify-between">
                <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                <div class="text-sm">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="font-semibold text-red-600 hover:text-red-500">Lupa password?</a>
                    @endif
                </div>
            </div>
            <div class="mt-2">
                <input type="password" name="password" id="password" autocomplete="current-password" required
                    placeholder="masukan password"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-red-600 sm:text-sm/6" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
        </div>

        <div>
            <button class="flex w-full justify-center rounded-full bg-red-600 px-3 py-2 text-sm/6 font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                Log in
            </button>
        </div>
    </form>
</x-guest-layout>