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
                        <td class="border px-4 py-2">
                            <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">編集</a>
                            <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" class="inline-block" id="form_{{ $reservation->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="deleteReservation({{ $reservation->id }})">
                                    <svg class="h-6 w-6 text-red-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />  <line x1="9" y1="9" x2="15" y2="15" />  <line x1="15" y1="9" x2="9" y2="15" /></svg>
                                </button>
                            </form>
                        </td>   
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
</x-app-layout>
<script>
    function deleteReservation(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>