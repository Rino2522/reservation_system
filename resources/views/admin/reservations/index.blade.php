<x-app-layout>

    <!-- カレンダー表示 -->
    <div class="bg-white shadow rounded-lg p-4">
        <div id="calendar-container">
            <div id="calendar"></div>
        </div>
    </div>
</x-app-layout>

<!-- FullCalendarを読み込む -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>

<style>
    /* カレンダーのレスポンシブ対応 */
    #calendar-container {
        width: 100%;
        max-width: 1200px; /* PCでは最大1200px */
        margin: 0 auto;
    }
    
    @media (max-width: 1024px) {
        #calendar-container {
            max-width: 900px; /* タブレット用 */
        }
    }

    @media (max-width: 768px) {
        #calendar-container {
            max-width: 100%; /* スマホは全幅 */
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridWeek', // 1週間ごとの表示
            locale: 'ja', // 日本語対応
            firstDay: 0, // 週の開始日（日曜日）
            height: 600,
            contentHeight: 700, // デフォルトの高さを700pxに設定
            expandRows: true, // 予約が多くなった場合に自動調整
            headerToolbar: {
                left: '',
                center: 'title',
                right: 'prev,next today',
            },
            events: [
                @foreach($reservations as $reservation)
                {
                    title: "{{ $reservation->name }}（{{ $reservation->number_of_guests }}人）",
                    start: "{{ $reservation->date }}T{{ $reservation->time }}",
                    url: "{{ route('admin.reservations.edit', $reservation->id) }}"
                },
                @endforeach
            ]
        });
        calendar.render();
    });
</script>
