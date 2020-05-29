import { Data } from '../data.interface';

export interface FlightData extends Data {
   id: number;
   idWeatherData: number;
}
