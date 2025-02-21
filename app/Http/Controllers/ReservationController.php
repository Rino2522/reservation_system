<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservationController extends Controller
{
   public function adminIndex()
   {
        $today = Carbon::today();
        $reservations = Reservation::where('date_time', '>=', $today)
                                   ->orderBy('date_time', 'asc')
                                   ->get();
        return view('admin.reservations.index', compact('reservations'));
   }

    public function adminCreate()
    {
          return view('admin.reservations.create');
    }
}
