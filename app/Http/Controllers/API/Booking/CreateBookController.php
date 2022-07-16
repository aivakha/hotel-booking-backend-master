<?php

namespace App\Http\Controllers\API\Booking;

use App\Events\Booking\BookingEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Booking\StoreRequest;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CreateBookController extends Controller
{
    public function __invoke(StoreRequest $request) {
        $data = $request->validated();
        // dd($data);
        $slug = $request->slug;
        $room = Room::where('slug', $slug)->first();

        $date_range = explode(',', $request->get('date_range'));

        $from = Carbon::parse($date_range[0])->addHour('12')->addMinutes('0')->addSeconds('0')->format('Y-m-d H:i:s');
        $to = Carbon::parse($date_range[1])->addHour('12')->addMinutes('0')->addSeconds('0')->format('Y-m-d H:i:s');

        $booked_in_range = Booking::getBookedRooms($from,$to)->toArray();





        //dd('test');
        if (in_array($room->id, $booked_in_range)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Неможливо забронювати кімнату на обрану дату!',
            ], 422);
        } else {
            $booking = Booking::create([
                'user_id' => $data['user_id'],
                'room_id' => $data['room_id'],
                'apartment_id' => $room->apartment->id,
                'check_in' => Carbon::parse($from),
                'check_out' => Carbon::parse($to),
            ]);

            event(new BookingEvent($booking));

            return response()->json([
                'status' => 'success',
                'message' => 'Ваша кімната успішно заброньована!',
            ]);
        }
    }
}
