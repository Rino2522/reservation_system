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
                  'phone' => 'required|string|max:20',
                  'number_of_guests' => 'required|integer|min:1',
                  'date' => 'required|date',
                  'time' => 'required|date_format:H:i',
            ]);

            Reservation::create([
                  'name' => $request->name,
                  'email' => $request->email,
                  'phone' => $request->phone,
                  'number_of_guests' => $request->number_of_guests,
                  'date' => $request->date,
                  'time' => $request->time,
            ]);
            
            return redirect()->route('admin.reservations.index')->with('success', '予約が作成されました。');
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
                        'email' => 'required|string',
                        'phone' => 'required|string|max:15',
                        'number_of_guests' => 'required|integer|min:1',
                        'date' => 'required|date',
                        'time' => 'required|date_format:H:i',
                  ]);

            Reservation::create([
                  'name' => $request->name,
                  'email' => $request->email,
                  'phone' => $request->phone,
                  'number_of_guests' => $request->number_of_guests,
                  'date' => $request->date,
                  'time' => $request->time,
            ]);
      
            return redirect()->route('welcome')->with('success', '予約が完了しました。');

      }
}
