<?php
namespace App\Services;


use App\Flight;
use App\Airport;
use  Validator;


Class FlightService {


//    apply the middleware to our api
    //validation rules
    protected $rules =[
        'flightNumber' => 'required',
        'status' => 'required',
        'arrival.datetime' => 'required',
        'arrival.iataCode' => 'required',
        'departure.datetime' => 'required',
        'departure.iataCode' => 'required',
    ];

    public function validate($flight) {
        $validator = Validator::make($flight, $this->rules);
        $validator->validate();
    }
    //to get all the flights

    public function getFlights() {
        return $this->filterFlights(Flight::all());

    }

    //to get an indiviual flight

    public function getFlight($flightNumber) {
        return $this->filterFlights(Flight::where ('flightNumber', $flightNumber)->get());
    }

    public  function createFlight($req) {
        $arrivalAirport = $req->input('arrival.iataCode');
        $departureAirport = $req->input('departure.iataCode');
        $airports = Airport::whereIn('iataCode', [$arrivalAirport, $departureAirport])->get();
        $codes = [];

        foreach ($airports as $airport) {
            $codes[$airport->iataCode] = $airport->id;
        }
        $flight = new Flight();
        $flight->flightNumber = $req->input('flightNumber');
        $flight->status = $req->input('status');
        $flight->arrivalAirport_id = $codes[$arrivalAirport];
        $flight->arrivalDateTime = $req->input('arrival.datetime');
        $flight->departureAirport_id = $codes[$departureAirport];
        $flight->departureDateTime = $req->input('departure.datetime');

        $flight->save();

        return $this->filterFlights([$flight]);

    }
        //Delete a flight
    public function deleteFlight($flightNumber) {
        $flight = Flight::where('flightNumber', $flightNumber)->firstOrFail();

        $flight->delete();


    }


    protected function filterFlights($flights) {
        $data = [];

        foreach($flights as $flight) {
            $entry = [
                'flightNumber' => $flight->flightNumber,
                'status' => $flight->status,
                'href' => route('flights.show', ['id' => $flight->flightNumber])
            ];
            $data[] = $entry;
        }
        return $data;
    }


}