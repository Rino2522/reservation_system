<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center px-4">
        <div class="py-16 px-10 bg-white/90 shadow-lg rounded-lg max-w-lg w-full text-center">
            <h2 class="text-4xl text-[#4B382A] font-serif mb-6 leading-loose tracking-wide">予約確認</h2>

            <form action="{{ route('reservations.search') }}" method="POST" class="space-y-6 text-left">
                @csrf

                <div>
                    <label for="phone" class="block text-xl font-medium text-[#4B382A]">電話番号</label>
                    <input type="text" name="phone" id="phone" 
                           class="mt-2 block w-full border border-[#B08D57] bg-gray-100 text-[#4B382A] rounded-lg px-6 py-4 
                                  text-xl focus:ring-[#8C6F45] focus:border-[#8C6F45] transition"
                           required>
                    @error('phone')
                        <p class="text-red-500 text-lg mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" 
                            class="w-full px-12 py-4 bg-[#B08D57] text-white text-2xl font-serif rounded-lg shadow-lg 
                                   hover:bg-[#8C6F45] border-2 border-[#B08D57] transition">
                        検索
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="footer mt-16 text-lg text-[#6D5A49]">
        <p>&copy; 2025 鮨 | すべての権利を保有</p>
    </div>
</x-guest-layout>
