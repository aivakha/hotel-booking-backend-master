<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index() {
        $users = User::all();
        $rooms = Room::all();
        $apartments = Apartment::all();
        $bookings = Booking::all();
        $room = Room::find(63);

        $startDate = Carbon::createFromFormat('Y-m-d H:i:s', '2022-07-08 12:00:00');
        $endDate = Carbon::createFromFormat('Y-m-d H:i:s', '2022-07-24 12:00:00');

        $temp_1 = Booking::whereBetween('check_in', [$startDate, $endDate])->get()->toArray();
        $temp_2 = Booking::whereBetween('check_out', [$startDate, $endDate])->get()->toArray();

        $booked_rooms = array_merge($temp_1, $temp_2);
        $booked_ids = [];
        foreach($booked_rooms as $booked_room) {
            if (!in_array($booked_room['room_id'], $booked_ids)) {
                $booked_ids[] = $booked_room['room_id'];
            }
        }

        $availiable_rooms = Room::whereNotIn('id', $booked_ids)->get();

        // $test = DB::table('rooms')->whereNotIn('id', $booked_ids)->get();

        return view('admin.test', compact('users', 'rooms', 'apartments', 'bookings', 'room', 'availiable_rooms'));
    }
}
