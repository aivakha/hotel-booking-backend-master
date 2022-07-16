<?php

namespace App\Http\Filters;

use App\Models\Booking;
use App\Models\City;
use App\Models\Room;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class RoomFilter extends AbstractFilter
{
    const PRICES = 'prices';
    const MEALS = 'meals';
    const LEISURE_ACTIVITIES = 'leisure_activities';
    const FEATURES = 'features';
    const BED_TYPES = 'bed_types';
    const APARTMENT_TYPES = 'apartment_types';
    const DISTANCES = 'distances';
    const STAR_RATES = 'star_rates';
    const BOOKING_CITY = 'booking_city';
    const BOOKING_MEMBERS = 'booking_members';
    const BOOKING_DATA_RANGE = 'booking_date_range';

    protected function getCallbacks(): array
    {
        return [
            self::PRICES => [$this, 'prices'],
            self::MEALS => [$this, 'meals'],
            self::LEISURE_ACTIVITIES => [$this, 'leisure_activities'],
            self::FEATURES => [$this, 'features'],
            self::BED_TYPES => [$this, 'bed_types'],
            self::APARTMENT_TYPES => [$this, 'apartment_types'],
            self::DISTANCES => [$this, 'distances'],
            self::STAR_RATES => [$this, 'star_rates'],
            self::BOOKING_CITY => [$this, 'booking_city'],
            self::BOOKING_MEMBERS => [$this, 'booking_members'],
            self::BOOKING_DATA_RANGE => [$this, 'booking_date_range'],
        ];
    }

    protected function features(Builder $builder, $value)
    {
        $builder->whereHas('features', function ($b) use ($value) {
            $b->whereIn('feature_id', $value);
        });
    }

    protected function star_rates(Builder $builder, $value)
    {
        $builder->whereHas('apartment', function ($b) use ($value) {
            $b->whereIn('star_rate', $value);
        });
    }

    protected function meals(Builder $builder, $value)
    {
        $builder->whereHas('apartment', function ($b) use ($value) {
            $b->whereHas('meals', function ($a) use ($value) {
                $a->whereIn('meal_id', $value);
            });
        });
    }

    protected function leisure_activities(Builder $builder, $value)
    {
        $builder->whereHas('apartment', function ($b) use ($value) {
            $b->whereHas('leisureActivities', function ($a) use ($value) {
                $a->whereIn('leisure_activity_id', $value);
            });
        });
    }

    protected function bed_types(Builder $builder, $value)
    {
        $builder->whereHas('bedTypes', function ($b) use ($value) {
            $b->whereIn('bed_type_id', $value);
        });
    }

    protected function apartment_types(Builder $builder, $value)
    {
        $builder->whereHas('apartment', function ($b) use ($value) {
            $b->whereIn('type_id', $value);
        });
    }

    protected function distances(Builder $builder, $value)
    {
        $builder->whereHas('apartment', function ($b) use ($value) {
            $b->whereIn('distance_id', $value);
        });
    }

    protected function prices(Builder $builder, $value)
    {
        $builder->whereBetween('price', $value);
    }

    protected function booking_city(Builder $builder, $value)
    {
        //dd($value);
//        $startDate = '2022-07-01';
//        $endDate = Carbon::parse('2022-07-18')->endOfDay();
//        $temp_1 = Booking::whereBetween('check_in', [$startDate, $endDate])->get()->toArray();
//        $temp_2 = Booking::whereBetween('check_out', [$startDate, $endDate])->get()->toArray();
//        $booked_rooms = array_merge($temp_1, $temp_2);
//
//        $booked_rooms_ids = []; // booked rooms швы without any booking status
//        foreach ($booked_rooms as $booked_room) {
//            if (!in_array($booked_room['room_id'], $booked_rooms_ids)) {
//                $booked_rooms_ids[] = $booked_room['room_id'];
//            }
//        }
//
//        $booked_with_status_true = Booking::whereIn('room_id', $booked_rooms_ids)->where('status', 1)->pluck('room_id');
//        $availiable_rooms_by_booking = Room::whereNotIn('id', $booked_with_status_true)->pluck('id'); // availiable rooms by date and by booking status
//        $builder->whereIn('id', $availiable_rooms_by_booking) // availiable rooms by date and by booking status by city by members
//            ->where('members', '>=', [2])
//            ->whereHas('apartment', function ($q) {
//                $q->whereHas('city', function ($t) {
//                    $t->whereIn('city_id', [122]);
//                });
//            });

        $builder->whereHas('apartment', function ($b) use ($value) {
            $b->whereIn('city_id', [$value]);
        });
    }

    protected function booking_members(Builder $builder, $value)
    {
        $builder->where('members', '>=', $value);
    }

    protected function booking_date_range(Builder $builder, $value)
    {
        $date_range = explode(',', $value);

        $from = Carbon::parse($date_range[0])->addHour('12')->addMinutes('0')->addSeconds('0')->format('Y-m-d H:i:s');
        $to = Carbon::parse($date_range[1])->addHour('12')->addMinutes('0')->addSeconds('0')->format('Y-m-d H:i:s');

        $booked_in_range = Booking::getBookedRooms($from,$to);

        $builder->whereNotIn('id', $booked_in_range)->pluck('id');
    }

}
