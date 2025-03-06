<x-app-layout>
    <div class="container mx-auto mt-4 p-6 bg-white shadow-md rounded">
        <h2 class="text-xl font-bold mb-4">予約を編集</h2>

        <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- 名前 -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">名前</label>
                <input type="text" name="name" id="name" value="{{ $reservation->name }}" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- メールアドレス -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">メールアドレス</label>
                <input type="email" name="email" id="email" value="{{ $reservation->email }}" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- 電話番号 -->
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">電話番号</label>
                <input type="text" name="phone" id="phone" value="{{ $reservation->phone }}" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- 人数 -->
            <div class="mb-4">
                <label for="number_of_guests" class="block text-sm font-medium text-gray-700">人数</label>
                <input type="number" name="number_of_guests" id="number_of_guests" value="{{ $reservation->number_of_guests }}" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
                @error('number_of_guests')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- 日付 -->
            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">日付</label>
                <input type="date" name="date" id="date" value="{{ $reservation->date }}" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
                @error('date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- 時間 -->
            <div class="mb-4">
                <label for="time" class="block text-sm font-medium text-gray-700">時間</label>
                <input type="time" name="time" id="time" value="{{ $reservation->time }}" class="mt-1 block w-full border border-gray-300 rounded px-3 py-2" required>
                @error('time')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">予約を更新</button>
            </div>
        </form>
    </div>
</x-app-layout>