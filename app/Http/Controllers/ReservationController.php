<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservationController extends Controller
{
      //　従業員用の予約一覧画面を表示
      public function adminIndex()
      {
            $today = Carbon::today();
            $reservations = Reservation::where('date', '>=', $today)
                                    ->orderBy('date', 'asc')
                                    ->orderBy('time', 'asc')
                                    ->get();
            return view('admin.reservations.index')->with('reservations', $reservations);
      }

      //　従業員用の予約作成画面を表示
      public function adminCreate()
      {
            return view('admin.reservations.create');
      }

      //　従業員用の予約保存処理
      public function adminStore(Request $request)
      {
            $request->validate([
                  'name' => 'required|string|max:255',
                  'email' => 'required|email|max:255',
                  'phone' => 'required|string|max:15',
                  'number_of_guests' => 'required|integer|min:1|max:8',
                  'date' => 'required|date',
                  'time' => 'required|date_format:H:i',
                  'meal_type' => 'required|in:コース,アラカルト',
            ]);

            Reservation::create([
                  'name' => $request->name,
                  'email' => $request->email,
                  'phone' => $request->phone,
                  'number_of_guests' => $request->number_of_guests,
                  'date' => $request->date,
                  'time' => $request->time,
                  'meal_type' => $request->meal_type,
            ]);
            
            return redirect()->route('admin.reservations.index')->with('success', '予約が作成されました。');
      }

      //　従業員用の予約編集画面を表示
      public function adminEdit(Reservation $reservation)
      {
            return view('admin.reservations.edit')->with('reservation', $reservation);
      }
      
      //　従業員用の予約更新処理
      public function adminUpdate(Request $request, Reservation $reservation)
      {
            $request->validate([
                  'name' => 'required|string|max:255',
                  'email' => 'required|email|max:255',
                  'phone' => 'required|string|max:15',
                  'number_of_guests' => 'required|integer|min:1|max:8',
                  'date' => 'required|date',
                  'time' => 'required|date_format:H:i',
                  'meal_type' => 'required|in:コース,アラカルト',
            ]);

            $reservation->update([
                  'name' => $request->name,
                  'email' => $request->email,
                  'phone' => $request->phone,
                  'number_of_guests' => $request->number_of_guests,
                  'date' => $request->date,
                  'time' => $request->time,
                  'meal_type' => $request->meal_type,
            ]);

            return redirect()->route('admin.reservations.index')->with('success', '予約が更新されました。');
      }

      // 従業員用の予約削除処理
      public function adminDestroy(Reservation $reservation)
      {
            $reservation->delete();
            return redirect()->route('admin.reservations.index')->with('success', '予約が削除されました。');
      }     
      
      //　一般用の予約作成画面を表示
      public function create()
      {
            return view('reservations.create');
      }

      //　一般用の予約保存処理
      public function store(ReservationRequest $request)
      {
            $request->validate([
                        'name' => 'required|string|max:255',
                        'email' => 'required|email|max:255',
                        'phone' => 'required|string|max:15',
                        'number_of_guests' => 'required|integer|min:1|max:8',
                        'date' => 'required|date',
                        'time' => 'required|date_format:H:i',
                        'meal_type' => 'required|in:コース,アラカルト',
                  ]);

            Reservation::create([
                  'name' => $request->name,
                  'email' => $request->email,
                  'phone' => $request->phone,
                  'number_of_guests' => $request->number_of_guests,
                  'date' => $request->date,
                  'time' => $request->time,
                  'meal_type' => $request->meal_type,
            ]);
      
            return redirect()->route('welcome')->with('success', '予約が完了しました。');

      }

      // 電話番号入力画面を表示
      public function inputPhone()
      {
        return view('reservations.input-phone');
      }

      // 電話番号で予約を検索
      public function searchByPhone(Request $request)
      {
        $request->validate([
            'phone' => 'required|string|max:20',
        ]);

        $reservations = Reservation::where('phone', $request->phone)->get();

        return view('reservations.search-results', compact('reservations'));
      }
}
