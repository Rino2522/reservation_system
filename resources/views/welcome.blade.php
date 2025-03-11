<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center px-4">
        @if(session('success'))
            <div class="mb-4 px-6 py-3 bg-green-100 text-green-700 border border-green-400 rounded-lg shadow-md">
                {{ session('success') }}
            </div>
        @endif
        <div class="flex-grow flex items-center justify-center w-full">
            <div class="hero py-20 px-10 bg-white/90 shadow-lg rounded-lg max-w-2xl text-center">
                <h1 class="text-5xl text-[#4B382A] font-serif mb-4 leading-loose tracking-wide">鮨</h1>
                <p class="text-2xl text-[#4B382A] mb-6 leading-relaxed">極上の鮨を、気軽に楽しむ贅沢</p>
                <p class="text-lg text-[#4B382A] mb-10 leading-loose">選び抜いた旬の素材を、一貫ずつ心を込めて握ります。</p>
                <div class="flex space-x-6 justify-center mb-6">
                    <a href="{{ url('/reservations/create') }}" 
                       class="px-12 py-6 bg-[#B08D57] text-white text-2xl font-serif rounded-lg shadow-lg hover:bg-[#8C6F45] 
                              border-2 border-[#B08D57] transition inline-block">
                        ご予約はこちら
                    </a>
                    <a href="{{ url('/reservations/input-phone') }}" 
                       class="px-12 py-6 bg-[#8C6F45] text-white text-2xl font-serif rounded-lg shadow-lg hover:bg-[#B08D57] 
                              border-2 border-[#B08D57] transition inline-block">
                        ご予約の確認
                    </a>
                </div>
                <div class="flex justify-center">
                    <a href="#" 
                       class="flex items-center justify-center w-14 h-14 bg-white text-[#4B382A] text-3xl font-serif rounded-full shadow-lg hover:bg-gray-200 
                              border-2 border-[#4B382A] transition">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="footer mt-16 text-sm text-[#6D5A49]">
            <p>&copy; 2025 鮨 | すべての権利を保有</p>
        </div>
    </div>
</x-guest-layout>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

