<x-app-layout>
    <div class="container mx-auto mt-4 p-6 bg-white shadow-md rounded">
        <h2 class="text-xl font-bold mb-4">予約を編集</h2>

        <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- 名前 -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">名前</label>
                <input type="text" name="name" id="name" value="{{ old('name', $reservation->name) }}" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- メールアドレス -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">メールアドレス</label>
                <input type="email" name="email" id="email" value="{{ old('email', $reservation->email) }}" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- 電話番号 -->
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">電話番号</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone', $reservation->phone) }}" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required maxlength="15">
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- 人数 -->
            <div class="mb-4">
                <label for="number_of_guests" class="block text-sm font-medium text-gray-700">人数</label>
                <input type="number" name="number_of_guests" id="number_of_guests" value="{{ old('number_of_guests', $reservation->number_of_guests) }}" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required min="1" max="8">
                @error('number_of_guests')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- 日付 -->
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">日付</label>
                <input type="date" name="date" id="date" value="{{ old('date', $reservation->date) }}" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required min="{{ now()->toDateString() }}">
                @error('date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- 時間 -->
            <div class="mb-4">
                <label for="time" class="block text-sm font-medium text-gray-700">予約時間</label>
                <input type="time" name="time" id="time" value="{{ old('time', \Carbon\Carbon::parse($reservation->time)->format('H:i')) }}" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
                @error('time')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- 料理 -->
            <div class="mb-4">
                <label for="meal_type" class="block text-sm font-medium text-gray-700">料理</label>
                <select name="meal_type" id="meal_type" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
                    <option value="コース" {{ old('meal_type', $reservation->meal_type) == 'コース' ? 'selected' : '' }}>コース</option>
                    <option value="アラカルト" {{ old('meal_type', $reservation->meal_type) == 'アラカルト' ? 'selected' : '' }}>アラカルト</option>
                </select>
                @error('meal_type')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- 予約更新ボタン -->
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-300">
                予約を更新
            </button>
        </form>

        <!-- 予約削除ボタン -->
        <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');" class="mt-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition duration-300">
                予約を削除
            </button>
        </form>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dateInput = document.getElementById("date");
            const timeInput = document.getElementById("time");

            dateInput.addEventListener("change", function() {
                const selectedDate = new Date(dateInput.value);
                const day = selectedDate.getDay(); // 0: 日曜, 1: 月曜, ..., 6: 土曜
                const today = new Date();

                // 過去の日付選択時の警告（値はクリアしない）
                if (selectedDate < today.setHours(0, 0, 0, 0)) {
                    alert("過去の日付は選択できません。");
                }

                // 水曜日選択時の警告（値はクリアしない）
                if (day === 3) {
                    alert("水曜日は定休日です。別の日を選択してください。");
                }

                // 予約可能な時間を設定
                let startHour, endHour;
                if (day === 0) { // 日曜・祝日 12:00〜19:00
                    startHour = 12;
                    endHour = 19;
                } else { // 月曜～土曜（水曜除く）17:00〜20:00
                    startHour = 17;
                    endHour = 20;
                }

                // 時間の範囲設定（値は保持する）
                timeInput.min = `${startHour.toString().padStart(2, '0')}:00`;
                timeInput.max = `${endHour.toString().padStart(2, '0')}:00`;
            });
        });
    </script>
</x-app-layout>
