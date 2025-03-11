<x-app-layout>
    <div class="container mx-auto mt-12 p-10 bg-white shadow-2xl rounded-lg max-w-5xl text-gray-900">
        <h2 class="text-3xl font-extrabold text-center mb-6 text-gray-800">予約結果</h2>

        @if($reservations->isEmpty())
            <p class="text-red-500 text-center text-lg">一致する予約が見つかりませんでした。</p>
        @else
            <div class="w-full">
                <table class="table-auto w-full border-collapse border border-gray-300 shadow-md rounded-lg">
                    <thead>
                        <tr class="bg-[#8B5A2B] text-white">
                            <th class="px-6 py-3 border border-gray-300">名前</th>
                            <th class="px-6 py-3 border border-gray-300">メールアドレス</th>
                            <th class="px-6 py-3 border border-gray-300">電話番号</th>
                            <th class="px-6 py-3 border border-gray-300">人数</th>
                            <th class="px-6 py-3 border border-gray-300">日付</th>
                            <th class="px-6 py-3 border border-gray-300">時間</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100">
                        @foreach($reservations as $reservation)
                            <tr class="hover:bg-gray-200 transition duration-200">
                                <td class="border px-6 py-3 text-center">{{ $reservation->name }}</td>
                                <td class="border px-6 py-3 text-center">{{ $reservation->email }}</td>
                                <td class="border px-6 py-3 text-center">{{ $reservation->phone }}</td>
                                <td class="border px-6 py-3 text-center">{{ $reservation->number_of_guests }}</td>
                                <td class="border px-6 py-3 text-center">{{ $reservation->date }}</td>
                                <td class="border px-6 py-3 text-center">{{ $reservation->time }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="mt-6 text-center">
            <a href="{{ url('/') }}" class="px-6 py-3 bg-gradient-to-r from-[#8B5A2B] to-[#A0522D] text-white font-bold rounded-lg shadow-lg hover:opacity-90 transition duration-300 text-lg">
                戻る
            </a>
        </div>
    </div>
</x-app-layout>
