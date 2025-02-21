<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $reservations = Reservation::where('date_time', '>=', $today)
                                   ->orderBy('date_time', 'asc')
                                   ->get();
        return view('users.index')->with('reservations', $reservations);
    }  
}
