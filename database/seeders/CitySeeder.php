<?php
namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;


class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::truncate();

        $json = File::get("database/data/ua_cities.json");
        $data = json_decode($json);

        function mb_ucfirst($str, $encoding = 'UTF-8') {
            $str = mb_ereg_replace('^[\ ]+', '', $str);
            $str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding).mb_substr($str, 1, mb_strlen($str), $encoding);
            return $str;
        }

        foreach ($data as $row) {
            if ($row->object_category == 'Місто') {
                City::create([
                    'title' => mb_ucfirst(mb_strtolower($row->object_name)),
                ]);
            }
        }
    }
}
