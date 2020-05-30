import { Input } from '@angular/core';

export class AirlineListItem {
   constructor(public id: number, public tripadvisorCode: string, public name: string, public tripadvisor_name: string) {}
}
