<x-app-layout>
    <div class="container mx-auto mt-4 p-6 bg-white shadow-md rounded">
        <h2 class="text-xl font-bold mb-4">新しい予約を作成</h2>

        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf

            <!-- 名前 -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">名前</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- メールアドレス -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">メールアドレス</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- 電話番号 -->
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">電話番号</label>
                <input type="text" name="phone" id="phone" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- 人数 -->
            <div class="mb-4">
                <label for="number_of_guests" class="block text-sm font-medium text-gray-700">人数</label>
                <input type="number" name="number_of_guests" id="number_of_guests" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required min="1">
                @error('number_of_guests')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- 日付選択 -->
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">予約日</label>
                <input type="date" name="date" id="date" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <!-- 時間選択 -->
            <div class="mb-4">
                <label for="time" class="block text-sm font-medium text-gray-700">予約時間</label>
                <select name="time" id="time" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
                    <option value="">時間を選択してください</option>
                </select>
            </div>

            <div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-200">
                    予約を作成
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dateInput = document.getElementById("date");
            const timeSelect = document.getElementById("time");

            dateInput.addEventListener("change", function() {
                const selectedDate = new Date(dateInput.value);
                const day = selectedDate.getDay(); // 0: 日曜, 1: 月曜, ..., 6: 土曜
                const today = new Date();
                
                // 過去の日付を選択できないようにする
                if (selectedDate < today.setHours(0, 0, 0, 0)) {
                    alert("過去の日付は選択できません。");
                    dateInput.value = "";
                    timeSelect.innerHTML = '<option value="">時間を選択してください</option>';
                    return;
                }

                // 水曜日を選択不可にする
                if (day === 3) {
                    alert("水曜日は定休日です。別の日を選択してください。");
                    dateInput.value = "";
                    timeSelect.innerHTML = '<option value="">時間を選択してください</option>';
                    return;
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

                // 15分刻みで時間を生成
                timeSelect.innerHTML = '<option value="">時間を選択してください</option>';
                for (let hour = startHour; hour <= endHour; hour++) {
                    for (let minute of ["00", "15", "30", "45"]) {
                        if (hour === endHour && minute !== "00") continue; // 閉店時間を超えないようにする
                        let timeString = `${hour}:${minute}`;
                        let option = document.createElement("option");
                        option.value = timeString;
                        option.textContent = timeString;
                        timeSelect.appendChild(option);
                    }
                }
            });
        });
    </script>
</x-app-layout>
