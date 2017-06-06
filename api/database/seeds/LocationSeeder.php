<?php

use Illuminate\Database\Seeder;
use \Watergo\Entities\Location;

class LocationSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $geographies = $this->getJson();

        foreach ($geographies['features'] as $geography) {
            $name = '飲水機';
            $opening_hours = '';
            if (isset($geography['properties']['name'])) {
                $name = $geography['properties']['name'];
            } elseif (!isset($geography['properties']['name']) && isset($geography['properties']['description'])) {
                $name = $geography['properties']['description'];
            }
            if (isset($geography['properties']['opening_hours'])) {
                $opening_hours = $geography['properties']['opening_hours'];
            }

            Location::create([
                'name'  => $name,
                'lat'   => $geography['geometry']['coordinates'][1],
                'lng'   => $geography['geometry']['coordinates'][0],
                'opening_hours' => $opening_hours,
            ]);
        }
    }

    public function getJson()
    {
        $path = app()->basePath() .
            DIRECTORY_SEPARATOR . "resources/assets/json/export.geojson";

        if (!file_exists($path)) {
            throw new \UnexpectedValueException("Json doesn't Exist at {$path}");
        }

        return json_decode(file_get_contents($path), true);
    }
}
