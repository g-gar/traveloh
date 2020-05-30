import { Injectable, Injector } from '@angular/core';
import { AjaxService } from './ajax.service';
import { FlightList } from '../model/flight-list.model';
import { environment } from 'src/environments/environment';
import { Flight } from '../model/flight.model';

@Injectable({
  providedIn: 'root'
})
export class FlightService {

  constructor(private injector: Injector) { }

  getFlights(): Promise<FlightList> {
    let ajax: AjaxService = this.injector.get(AjaxService);
    let url: string = ajax.buildUrlFromEnvironment(environment.API.paths.info.flights);
    return ajax.get<FlightList>(url);
  }

  async getFlight(id: number): Promise<Flight> {
    let ajax: AjaxService = this.injector.get(AjaxService);
    let url: string = ajax.buildUrlFromEnvironment(environment.API.paths.info.flight(id));
    return ajax.get<Flight>(url);
  }
}
