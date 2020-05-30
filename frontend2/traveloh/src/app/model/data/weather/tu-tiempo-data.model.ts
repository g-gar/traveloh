import { WeatherData } from './weather-data.interface';

export class TuTiempoData implements WeatherData {

   public identifier = "tutiempo";
   public source = "tutiempo.net";

   constructor(
      public id: number,
      public hour: number,
      public weather: string,
      public temperature: number,
      public wind: string,
      public humidity: number,
      public atmosphericPressure: number,
      public timestamp: number
   ) {}
}
