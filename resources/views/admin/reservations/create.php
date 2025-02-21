<x-app-layout>
    <div class="container mx-auto mt-4">
        <h2 class="text-xl font-bold mb-4">新しい予約を作成</h2>
        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">名前</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">メールアドレス</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-700">電話番号</label>
                <input type="text" name="phone" id="phone" class="mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="number_of_guests" class="block text-sm font-medium text-gray-700">人数</label>
                <input type="number" name="number_of_guests" id="number_of_guests" class="mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="date_time" class="block text-sm font-medium text-gray-700">日時</label>
                <input type="datetime-local" name="date_time" id="date_time" class="mt-1 block w-full" required>
            </div>
            <div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">予約を作成</button>
            </div>
        </form>
    </div>
</x-app-layout>