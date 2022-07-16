<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Booking;
use App\Models\City;
use App\Models\Room;
use App\Models\User;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        $users = User::all();
        $rooms = Room::all();
        $apartments = Apartment::all();
        $bookings = Booking::all();
        $room = Room::find(63);

        $from = Carbon::parse('2022-07-16')->addHour('12')->addMinutes('0')->addSeconds('0')->format('Y-m-d H:i:s');
        $to = Carbon::parse('2022-07-25')->addHour('12')->addMinutes('0')->addSeconds('0')->format('Y-m-d H:i:s');

        $booked_in_range = Booking::getBookedRooms($from,$to);
        $availiable_rooms = Room::whereNotIn('id', $booked_in_range)->pluck('id');


        $bokk = Booking::find(66);
        $check_in = Carbon::parse($bokk->check_in);
        $check_out = Carbon::parse($bokk->check_out);
        $days = $check_out->diffInDays($check_in);

        return view('admin.test', compact('users', 'rooms', 'apartments', 'bookings', 'room', 'booked_in_range', 'availiable_rooms', 'days', 'check_in'));
    }
}
