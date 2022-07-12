<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Builder;
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
        $endDate = Carbon::createFromFormat('Y-m-d H:i:s', '2022-07-19 12:00:00');

        $temp_1 = Booking::whereBetween('check_in', [$startDate, $endDate])->get()->toArray();
        $temp_2 = Booking::whereBetween('check_out', [$startDate, $endDate])->get()->toArray();

        $booked_rooms = array_merge($temp_1, $temp_2);
        $booked_ids = [];

        foreach($booked_rooms as $booked_room) {
            if (!in_array($booked_room['room_id'], $booked_ids)) {
                $booked_ids[] = $booked_room['room_id'];
            }
        }

        $booked_with_status_true = Booking::whereIn('id', $booked_ids)->where('status', 1)->pluck('id');

        $rooms_by_city = Room::whereHas('apartment', function($q) {
            $q->whereHas('city', function($t) {
                $t->whereIn('city_id', [16]);
            });
        })->get();

//        $builder->whereHas('apartment', function($b) use ($value) {
//            $b->whereHas('meals', function($a) use ($value) {
//                $a->whereIn('meal_id', $value);
//            });
//        });


        $availiable_rooms = Room::whereNotIn('id', $booked_with_status_true)->get();

        $apartment = Apartment::find(8);

        // $test = DB::table('rooms')->whereNotIn('id', $booked_ids)->get();

        return view('admin.test', compact('users', 'rooms', 'apartments', 'bookings', 'room', 'availiable_rooms', 'apartment', 'booked_rooms', 'users', 'rooms_by_city'));
    }
}
