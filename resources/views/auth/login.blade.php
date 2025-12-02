<x-guest-layout>
    <div class="text-center mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Welcome to Textile!</h2>
        <p class="text-gray-500 text-sm mt-1">Please sign in to your account.</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label class="block font-bold text-gray-700 text-sm mb-2" for="email">Username</label>
            <input id="email" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:border-textile-primary focus:ring-2 focus:ring-textile-primary outline-none transition text-sm" 
                   type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email/username">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-2">
            <label class="block font-bold text-gray-700 text-sm mb-2" for="password">Password</label>
            <input id="password" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:border-textile-primary focus:ring-2 focus:ring-textile-primary outline-none transition text-sm"
                   type="password" name="password" required autocomplete="current-password" placeholder="••••••••">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mb-6">
            @if (Route::has('password.request'))
                <a class="text-xs text-gray-500 hover:text-textile-primary font-bold hover:underline" href="{{ route('password.request') }}">
                    Forgot Password?
                </a>
            @endif
        </div>

        <button class="w-full bg-textile-primary hover:bg-[#3E2723] text-white font-bold py-3 rounded-lg shadow-lg transition duration-200 uppercase tracking-widest text-sm">
            LOGIN
        </button>

        <div class="mt-6 text-center text-sm text-gray-600">
            Don't have an account? 
            <a href="{{ route('register') }}" class="text-textile-primary font-bold hover:underline ml-1">
                Sign up
            </a>
        </div>
    </form>
</x-guest-layout>