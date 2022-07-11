<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

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
        ];
    }

    protected function features(Builder $builder, $value)
    {
        $builder->whereHas('features', function($b) use ($value) {
           $b->whereIn('feature_id', $value);
        });
    }

    protected function star_rates(Builder $builder, $value)
    {
        $builder->whereHas('apartment', function($b) use ($value) {
            $b->whereIn('star_rate', $value);
        });
    }

    protected function meals(Builder $builder, $value)
    {
        $builder->whereHas('apartment', function($b) use ($value) {
            $b->whereHas('meals', function($a) use ($value) {
                $a->whereIn('meal_id', $value);
            });
        });
    }

    protected function leisure_activities(Builder $builder, $value)
    {
        $builder->whereHas('apartment', function($b) use ($value) {
            $b->whereHas('leisureActivities', function($a) use ($value) {
                $a->whereIn('leisure_activity_id', $value);
            });
        });
    }

    protected function bed_types(Builder $builder, $value)
    {
        $builder->whereHas('bedTypes', function($b) use ($value) {
            $b->whereIn('bed_type_id', $value);
        });
    }

    protected function apartment_types(Builder $builder, $value)
    {
        $builder->whereHas('apartment', function($b) use ($value) {
            $b->whereIn('type_id', $value);
        });
    }

    protected function distances(Builder $builder, $value)
    {
        $builder->whereHas('apartment', function($b) use ($value) {
            $b->whereIn('distance_id', $value);
        });
    }

    protected function prices(Builder $builder, $value)
    {
        $builder->whereBetween('price', $value);
    }
}
