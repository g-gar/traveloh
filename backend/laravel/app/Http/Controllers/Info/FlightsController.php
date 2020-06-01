<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\FlightData;
use App\Model\WeatherData;
use App\Model\Aena;
use App\Model\TuTiempo;

class FlightsController extends Controller
{
    /**
	 * Returns all flights complete information
	 */
    public static function getFlightsInfo() {
        $result = [];
        $flights = DB::table('flight_data')->join('aena', 'aena.id', '=', 'flight_data.id')->get()->toArray();
        foreach ($flights as $flight) {
            $info = self::getFlightInfo($flight->id);
            array_push($result, [
                'id' => $flight->id,
                'code' => $info['more_flight_info']['data']['flight_code']
            ]);
        }
        return $result;
    }

    /**
	 * Returns any flight complete information
     * @urlParam code required The flight code. Example: BAW1513
	 */
    public static function getFlightInfo($id) {
        /*return DB::table('flight_data')
            ->join('aena', 'aena.id', '=', 'flight_data.id')
            ->join('weather_data', 'flight_data.id_weather_data', '=', 'weather_data.id')
            ->join('tutiempo', 'tutiempo.id', '=', 'weather_data.id')
            ->having('flight_data.code', $code)
            ->firstOrFail();*/

        $result['flight_data'] = FlightData::where('id', '=', $id)->firstOrFail();

        $data = self::getSpecificFlightData($result['flight_data']->id);
        $result['more_flight_info']['type'] = $data->getTable();
        $result['more_flight_info']['data'] = $data;

        if (($weather = self::getSpecificWeatherData($result['flight_data']->id_weather_data)) != null) {
            $result['weather_info']['type'] = $weather->getTable();
            $result['weather_info']['data'] = $weather;
        } else {
            $result['weather_info'] = $weather;
        }

        return $result;
    }

    public static function getSpecificFlightData($id) {
        $result = null;
        $result = Aena::where('id', '=', $id)->exists() ? Aena::where('id', '=', $id)->first() : $result;
        return $result;
    }

    public static function getSpecificWeatherData($id) {
        $result = null;
        
        $temp = TuTiempo::where('tutiempo.id', '=', $id)->get()->first();
        $result = !!$temp ? $temp : $result;

        return $result;
    }
}
