import { FlightData } from './flight-data.interface';

export class AenaData implements FlightData {

   public identifier = "aena";
   public source = "aena.es";

   constructor(
      public id: number,
      public idWeatherData: number,
      public flightCode: number,
      public hour: number,
      public destination: string,
      public departureHour: number,
      public terminal: string,
      public company: string
   ) {}

}
