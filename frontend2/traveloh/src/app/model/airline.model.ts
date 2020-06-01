
import { FlightList } from './flight-list.model';
import { AirlineListItem } from './airline-list-item.model';
import { Input } from '@angular/core';

export class Airline {
   public id : number;
   constructor(public info: AirlineListItem, public flights: FlightList, public rating: number, ) {
      this.id = info.id;
   }


   public getName() : string {
      return this.info.tripadvisor_name;
   }

   public toString = () : string => {
      return `Airline (${this.info.id}, ${this.rating})`;
  }
}
