<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class RoomFilter extends AbstractFilter
{
    const PRICES = 'prices';
    const MEALS = 'meals';
    const FEATURES = 'features';
    const BED_TYPES = 'bed_types';

    protected function getCallbacks(): array
    {
        return [
            self::PRICES => [$this, 'prices'],
            self::MEALS => [$this, 'meals'],
            self::FEATURES => [$this, 'features'],
            self::BED_TYPES => [$this, 'bed_types'],
        ];
    }

    protected function features(Builder $builder, $value)
    {
        $builder->whereHas('features', function($b) use ($value) {
           $b->whereIn('feature_id', $value);
        });
    }

    protected function bed_types(Builder $builder, $value)
    {
        $builder->whereHas('bedTypes', function($b) use ($value) {
            $b->whereIn('bed_type_id', $value);
        });
    }

    protected function prices(Builder $builder, $value)
    {
        $builder->whereBetween('price', $value);
    }
}
