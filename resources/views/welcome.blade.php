<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center">
        <div class="text-4xl font-serif text-gray-700 tracking-widest mb-6">
            ようこそ
        </div>
        @if(session('success'))
            <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 border border-green-400 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        <div class="flex space-x-4">
            <a href="{{ url('/reservations/create') }}" class="px-6 py-3 bg-gray-700 text-white text-lg font-serif rounded-lg shadow-md hover:bg-gray-800 transition">予約する</a>
        </div>
        <div class="absolute m-3 top-5 right-5 flex space-x-4 text-lg">
            @auth
                <a href="{{ route('admin.reservations.index') }}" class="text-gray-700 hover:text-gray-900">従業員ログイン</a>
            @else
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900">Register</a>
                @endif
            @endauth
        </div>
    </div>
</x-guest-layout>
















