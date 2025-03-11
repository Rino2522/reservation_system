<x-app-layout>
    <div class="container mx-auto mt-12 p-10 bg-white shadow-2xl rounded-lg max-w-xl text-gray-900">
        <h2 class="text-3xl font-extrabold text-center mb-6 text-gray-800">予約確認</h2>

        <form action="{{ route('reservations.search') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">電話番号</label>
                <input type="text" name="phone" id="phone" class="mt-1 block w-full border border-gray-300 bg-gray-100 text-gray-900 rounded-lg px-4 py-3 focus:ring-[#8B5A2B] focus:border-[#8B5A2B]" required>
                @error('phone')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-[#8B5A2B] to-[#A0522D] text-white font-bold rounded-lg shadow-lg hover:opacity-90 transition duration-300 text-lg">
                    検索
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
