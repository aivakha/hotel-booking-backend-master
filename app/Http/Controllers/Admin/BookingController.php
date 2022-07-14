<?php

namespace App\Http\Controllers\Admin;

use App\Events\Booking\BookingEvent;
use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\StoreRequest;
use App\Http\Requests\Booking\UpdateRequest;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('index', [self::class]);

        $user = Auth::user();
        if ($user->hasRole('super_user')) {
            $bookings = Booking::all();
        } else {
            $bookings = Booking::whereHas('apartment', function(Builder $query) {
                $query->whereIn('user_id', [Auth::user()->id]);
            })->get();
        }

        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', [self::class]);
        $rooms = Room::pluck('title', 'id')->all();
        $users = User::pluck('email', 'id')->all();

        return view('admin.bookings.create', compact('rooms', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $booking = Booking::add($data);
        $booking->setApartment($request->get('room_id'));
        $booking->setCheckIn($request->get('check_in'));
        $booking->setCheckOut($request->get('check_out'));

        event(new BookingEvent($booking));

        return redirect()->route('bookings.index')->with('success', 'Успішно добавлено!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        $this->authorize('view', $booking);
        $user = Auth::user();
        if ($user->hasRole('super_user')) {
            $rooms = Room::pluck('title', 'id')->all();
        } else {
            $rooms = Room::whereIn('user_id', [Auth::user()->id])->pluck('title', 'id')->all();
        }

        $selectedRoom = $booking->room->id;
        $status = $booking->status;

        return view('admin.bookings.edit', compact('booking', 'rooms', 'selectedRoom', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();

        $booking = Booking::find($id);
        $this->authorize('update', $booking);
        $booking->edit($data);
        $booking->setCheckIn($request->get('check_in'));
        $booking->setCheckOut($request->get('check_out'));

        return redirect()->route('bookings.index')->with('success', 'Успішно оновлено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Booking::find($id)->delete();

        return redirect()->route('bookings.index')->with('success', 'Успішно видалено!');
    }
}
