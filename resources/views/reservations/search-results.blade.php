<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center px-4">
        <div class="py-16 px-10 bg-white/90 shadow-lg rounded-lg max-w-5xl w-full text-center">
            <h2 class="text-4xl text-[#4B382A] font-serif mb-6 leading-loose tracking-wide">予約一覧</h2>
            <h6 class="text-lg text-[#4B382A] font-serif mb-6">変更・キャンセルはお電話にてお問い合わせください。</h6>

            @if($reservations->isEmpty())
                <p class="text-red-500 text-lg">一致する予約が見つかりませんでした。</p>
            @else
                <div class="w-full overflow-x-auto">
                    <table class="table-auto w-full border-collapse border border-[#B08D57] shadow-md rounded-lg">
                        <thead>
                            <tr class="bg-[#B08D57] text-white text-sm md:text-base">
                                <th class="px-4 py-3 border border-[#B08D57]">名前</th>
                                <th class="px-4 py-3 border border-[#B08D57]">メールアドレス</th>
                                <th class="px-4 py-3 border border-[#B08D57]">電話番号</th>
                                <th class="px-4 py-3 border border-[#B08D57]">人数</th>
                                <th class="px-4 py-3 border border-[#B08D57]">日付</th>
                                <th class="px-4 py-3 border border-[#B08D57]">時間</th>
                                <th class="px-4 py-3 border border-[#B08D57]">料理</th>
                            </tr>
                        </thead>

                        <tbody class="bg-gray-100 text-sm md:text-base">
                            @foreach($reservations as $reservation)
                                <tr class="hover:bg-gray-200 transition duration-200">
                                    <td class="border border-[#B08D57] px-4 py-3 text-center">{{ $reservation->name }}</td>
                                    <td class="border border-[#B08D57] px-4 py-3 text-center">{{ $reservation->email }}</td>
                                    <td class="border border-[#B08D57] px-4 py-3 text-center">{{ $reservation->phone }}</td>
                                    <td class="border border-[#B08D57] px-4 py-3 text-center">{{ $reservation->number_of_guests }}</td>
                                    <td class="border border-[#B08D57] px-4 py-3 text-center">{{ $reservation->date }}</td>
                                    <td class="border border-[#B08D57] px-4 py-3 text-center">{{ $reservation->time }}</td>
                                    <td class="border border-[#B08D57] px-4 py-3 text-center">{{ $reservation->meal_type }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <div class="mt-6">
                <a href="{{ url('/') }}" 
                   class="px-12 py-4 bg-[#B08D57] text-white text-xl font-serif rounded-lg shadow-lg hover:bg-[#8C6F45] 
                          border-2 border-[#B08D57] transition inline-block">
                    戻る
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
