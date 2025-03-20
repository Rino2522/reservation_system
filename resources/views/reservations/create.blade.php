<x-guest-layout>
    <div class="container mx-auto mt-12 p-10 bg-white shadow-2xl rounded-lg max-w-xl text-gray-900">
        <h2 class="text-3xl font-extrabold text-center mb-6 text-gray-800">新しい予約を作成</h2>

        <form action="{{ route('reservations.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">名前</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full border border-gray-300 bg-gray-100 text-gray-900 rounded-lg px-4 py-3 focus:ring-[#8B5A2B] focus:border-[#8B5A2B]" required>
                @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">メールアドレス（任意）</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full border border-gray-300 bg-gray-100 text-gray-900 rounded-lg px-4 py-3 focus:ring-[#8B5A2B] focus:border-[#8B5A2B]" >
                @error('email')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">電話番号</label>
                <input type="text" name="phone" id="phone" class="mt-1 block w-full border border-gray-300 bg-gray-100 text-gray-900 rounded-lg px-4 py-3 focus:ring-[#8B5A2B] focus:border-[#8B5A2B]" required>
                @error('phone')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="number_of_guests" class="block text-sm font-medium text-gray-700">人数</label>
                <input type="number" name="number_of_guests" id="number_of_guests" class="mt-1 block w-full border border-gray-300 bg-gray-100 text-gray-900 rounded-lg px-4 py-3 focus:ring-[#8B5A2B] focus:border-[#8B5A2B]" required min="1" max="8">
                @error('number_of_guests')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="date" class="block text-sm font-medium text-gray-700">予約日</label>
                <input type="date" name="date" id="date" class="mt-1 block w-full border border-gray-300 bg-gray-100 text-gray-900 rounded-lg px-4 py-3 focus:ring-[#8B5A2B] focus:border-[#8B5A2B]" required>
            </div>

            <div>
                <label for="time" class="block text-sm font-medium text-gray-700">予約時間</label>
                <select name="time" id="time" class="mt-1 block w-full border border-gray-300 bg-gray-100 text-gray-900 rounded-lg px-4 py-3 focus:ring-[#8B5A2B] focus:border-[#8B5A2B]" required>
                    <option value="">時間を選択してください</option>
                </select>
            </div>

            <div>
                <label for="meal_type" class="block text-sm font-medium text-gray-700">料理</label>
                <select name="meal_type" id="meal_type" class="mt-1 block w-full border border-gray-300 bg-gray-100 text-gray-900 rounded-lg px-4 py-3 focus:ring-[#8B5A2B] focus:border-[#8B5A2B]" required>
                    <option value="">選択してください</option>
                    <option value="コース">コース</option>
                    <option value="アラカルト">アラカルト</option>
                </select>
                @error('meal_type')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-[#8B5A2B] to-[#A0522D] text-white font-bold rounded-lg shadow-lg hover:opacity-90 transition duration-300 text-lg">
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
                const day = selectedDate.getDay();
                const today = new Date();
                
                if (selectedDate < today.setHours(0, 0, 0, 0)) {
                    alert("過去の日付は選択できません。");
                    dateInput.value = "";
                    timeSelect.innerHTML = '<option value="">時間を選択してください</option>';
                    return;
                }

                if (day === 3) {
                    alert("水曜日は定休日です。別の日を選択してください。");
                    dateInput.value = "";
                    timeSelect.innerHTML = '<option value="">時間を選択してください</option>';
                    return;
                }

                let startHour, endHour;
                if (day === 0) {
                    startHour = 12;
                    endHour = 19;
                } else {
                    startHour = 17;
                    endHour = 20;
                }

                timeSelect.innerHTML = '<option value="">時間を選択してください</option>';
                for (let hour = startHour; hour <= endHour; hour++) {
                    for (let minute of ["00", "15", "30", "45"]) {
                        if (hour === endHour && minute !== "00") continue;
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
</x-guest-layout>