import { FlightListItem } from './flight-list-item.model';
import { FlightData } from './data/flight/flight-data.interface';
import { WeatherData } from './data/weather/weather-data.interface';
import { TuTiempoData } from './data/weather/tu-tiempo-data.model';
import { AenaData } from './data/flight/aena-data.model';

export class Flight {

   public flightData: FlightData;
   public weatherData: WeatherData;
   constructor(public flight: FlightListItem, private flightInfo: Object, private weatherInfo: Object) {

      if (!!flightInfo && 'type' in flightInfo) {
         switch (flightInfo['type']) {
            case 'aena': this.flightData = flightInfo['data'] as AenaData; break;
            default: throw Error(`${flightInfo['type']} not supported`)
         }
      }

      if (!!weatherInfo && 'type' in weatherInfo) {
         switch (weatherInfo['type']) {
            case 'tutiempo': this.weatherData = weatherInfo['data'] as TuTiempoData; break;
            default: throw Error(`${weatherInfo['type']} not supported`)
         }
      }
   }

}
