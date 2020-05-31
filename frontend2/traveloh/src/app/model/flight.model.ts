import { FlightListItem } from './flight-list-item.model';
import { FlightData } from './data/flight/flight-data.interface';
import { WeatherData } from './data/weather/weather-data.interface';
import { TuTiempoData } from './data/weather/tu-tiempo-data.model';
import { AenaData } from './data/flight/aena-data.model';

export class Flight {

   public id: number;
   public code: string;

   public flightType: string;
   public hour: number; // hora programada
   public destination: string;
   public departureHour: number; // hora real
   public company: string;
   public terminal: string;

   public weatherType: string;
   public weather: string;
   public temperature: number;
   public wind: string;
   public humidity: number;
   public atmosphericPressure: number;


   constructor(flight: Object, flightInfo: Object, weatherInfo: Object) {

      this.id = flight['id'];
      this.code = flightInfo['data']['flight_code'];

      if (!!flightInfo) {
         this.flightType = flightInfo['type'];
         this.hour = flightInfo['data']['hour'];
         this.destination = flightInfo['data']['destination'];
         this.company = flightInfo['data']['company'];
         this.terminal = flightInfo['data']['terminal'];
      }

      if (!!weatherInfo) {
         this.weatherType = weatherInfo['type'];
         this.weather = weatherInfo['data']['weather'];
         this.temperature = weatherInfo['data']['temperature'];
         this.wind = weatherInfo['data']['wind'];
         this.humidity = weatherInfo['data']['humidity'];
         this.atmosphericPressure = weatherInfo['data']['atmospheric_pressure'];
      }
      

      /* console.log(flight, flightInfo, weatherInfo);

      if (!!flight && 'id' in flight && 'data' in flightInfo && 'flight_code' in flightInfo) {
         this.info = new FlightListItem(flight['id'], flightInfo['flight_code']);
      }

      if (!!flightInfo && 'type' in flightInfo) {
         console.log(flightInfo)
         switch (flightInfo['type']) {
            case 'aena': this.flightData = flightInfo['data'] as AenaData; break;
            default: throw Error(`Type ${flightInfo['type']} not supported`)
         }
      }

      if (!!weatherInfo && 'type' in weatherInfo) {
         switch (weatherInfo['type']) {
            case 'tutiempo': this.weatherData = weatherInfo['data'] as TuTiempoData; break;
            default: throw Error(`${weatherInfo['type']} not supported`)
         }
      } */
   }

}
