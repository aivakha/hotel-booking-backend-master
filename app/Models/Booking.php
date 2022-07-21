<?php

namespace App\Models;

use App\Events\Booking\BookingStatusEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Booking extends Model
{
    use HasFactory;

    const IS_CANCEL = 0;
    const IS_APPROVE = 1;

    protected $fillable = ['user_id', 'room_id', 'apartment_id', 'check_in', 'check_out', 'status'];

    public function user() { // whom was booked
        return $this->belongsTo(User::class);
    }

    public function room() {
        return $this->belongsTo(Room::class);
    }

    public function apartment() {
        return $this->belongsTo(Apartment::class);
    }

    public static function add($fields)
    {
        $booking = new static;
        $booking->fill($fields);
        $booking->save();

        return $booking;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        if ($this->isDirty('status')) {
            event(new BookingStatusEvent($this));
        }
        $this->save();
    }

    public function setStatus() {

    }

    public function setCheckIn($date) {
        $check_in = Carbon::parse($date)->addHour('12')->addMinutes('0')->addSeconds('0')->format('Y-m-d H:i:s');
        $this->check_in = $check_in;
        $this->save();
    }

    public function setCheckOut($date) {
        $check_out = Carbon::parse($date)->addHour('11')->addMinutes('0')->addSeconds('0')->format('Y-m-d H:i:s');

        $this->check_out = $check_out;
        $this->save();
    }

    public function setDate($date) {
        $date = Carbon::createFromFormat('Y-m-d', $date);
        $date->setHour(12);
        $date->setMinutes(0);
        $date->setSeconds(0);

        return $date;
    }

    public function setApartment($id) {
        if ($id == null) { return; }

        $room = Room::find($id);
        $apartment_id = $room->apartment->id;
        $this->apartment_id = $apartment_id;
        $this->save();
    }

    public function setDecline()
    {
        $this->status = Booking::IS_CANCEL;
        $this->save();
    }

    public function setApprove()
    {
        $this->status = Booking::IS_APPROVE;
        $this->save();
    }

    public function toggleStatus($value)
    {
        if ($value == null) {
            return $this->setDecline();
        }

        return $this->setApprove();
    }

    public function getStatus() {
        if ($this->status == 1) {
            return 'Прийнято';
        }

        if ($this->status == 2) {
            return 'Виконано';
        }

        return 'Відхилено';
    }

    public static function getBookedRooms($from, $to) {
        $booking = new static;

        return $booking->where(function ($query) use ($from, $to) {
            $query->where(function ($query) use ($from, $to) {
                $query->where('check_in', '<=', $from)
                    ->where('check_out', '>=', $from);
            })->orWhere(function ($query) use ($from, $to) {
                $query->where('check_in', '<=', $to)
                    ->where('check_out', '>=', $to);
            })->orWhere(function ($query) use ($from, $to) {
                $query->where('check_in', '>=', $from)
                    ->where('check_out', '<=', $to);
            });
        })
            ->where('status', '=', '1')
            ->pluck('room_id')->unique();
    }
}
