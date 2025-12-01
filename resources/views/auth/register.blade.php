<x-guest-layout>
    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Sign Up</h2>
        <p class="text-gray-500 text-sm mt-1">Buat Akun</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4">
            <input id="name" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:border-textile-primary focus:ring-2 focus:ring-textile-primary outline-none text-sm" 
                   type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Nama Lengkap">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-4">
            <input id="email" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:border-textile-primary focus:ring-2 focus:ring-textile-primary outline-none text-sm" 
                   type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Alamat Email">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-4">
            <input id="password" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:border-textile-primary focus:ring-2 focus:ring-textile-primary outline-none text-sm" 
                   type="password" name="password" required autocomplete="new-password" placeholder="Password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mb-4">
            <input id="password_confirmation" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-300 focus:border-textile-primary focus:ring-2 focus:ring-textile-primary outline-none text-sm" 
                   type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center mb-6">
            <input id="terms" type="checkbox" class="rounded border-gray-300 text-textile-primary focus:ring-textile-primary" required>
            <label for="terms" class="ml-2 text-xs text-gray-600">
                I agree <a href="#" class="text-textile-primary hover:underline">privacy policy & terms</a>
            </label>
        </div>

        <button class="w-full bg-textile-primary hover:bg-[#3E2723] text-white font-bold py-3 rounded-lg shadow-lg transition duration-200 uppercase tracking-widest text-sm">
            SIGN UP
        </button>

        <div class="mt-6 text-center text-sm text-gray-600">
             
            <a href="{{ route('login') }}" class="text-textile-primary font-bold hover:underline ml-1">
                Saya Sudah Punya Akun
            </a>
        </div>
    </form>
</x-guest-layout>