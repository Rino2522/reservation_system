<x-app-layout>
    <div class="container mx-auto mt-4">
        <h1 class="text-3xl font-bold">予約一覧</h1>
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">名前</th>
                    <th class="px-4 py-2">メールアドレス</th>
                    <th class="px-4 py-2">電話番号</th>
                    <th class="px-4 py-2">人数</th>
                    <th class="px-4 py-2">日</th>
                    <th class="px-4 py-2">時間</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td class="border px-4 py-2">{{ $reservation->name }}</td>
                        <td class="border px-4 py-2">{{ $reservation->email }}</td>
                        <td class="border px-4 py-2">{{ $reservation->phone}}</td>
                        <td class="border px-4 py-2">{{ $reservation->number_of_guests }}</td>
                        <td class="border px-4 py-2">{{ $reservation->date }}</td>
                        <td class="border px-4 py-2">{{ $reservation->time }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>