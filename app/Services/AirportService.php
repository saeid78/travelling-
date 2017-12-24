<?php

namespace App\Services;
use App\Airport;

class AirportService{

    public function getAirports(){
        return $this->filterAirports(Airport::all());
    }

    protected function filterAirports($airports) {
        $data = [];

        foreach ($airports as $airport) {
            $entry = [
//                'iataCode' => $airport->iataCode,
//                'country' => $airport->country,
                'city' => $airport->city,

            ];
            $data[] = $entry;
            sort($data);
        }
        return $data;
    }

}
