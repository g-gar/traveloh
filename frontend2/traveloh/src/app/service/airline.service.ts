import { Injectable, Optional, Injector } from '@angular/core';
import { environment } from 'src/environments/environment';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

import { Airline } from 'src/app/model/airline.model';
import { AirlineList } from '../model/airline-list.model';
import { AjaxService } from './ajax.service';

@Injectable({
  providedIn: 'root'
})
export class AirlineService {

  constructor(private injector: Injector) { }

  getAirlines(): Promise<AirlineList> {
    let ajax: AjaxService = this.injector.get(AjaxService);
    let url: string = ajax.buildUrlFromEnvironment(environment.API.paths.info.airlines);
    return ajax.get<AirlineList>(url);
  }

  getAirline(id: number): Promise<Airline> {
    let ajax: AjaxService = this.injector.get(AjaxService);
    let url: string = ajax.buildUrlFromEnvironment(environment.API.paths.info.airline(id));
    return ajax.get<Airline>(url);
  }

  getRanking(): Promise<any> {
    let ajax: AjaxService = this.injector.get(AjaxService);
    let url: string = ajax.buildUrlFromEnvironment(environment.API.paths.info.airlineRanking);
    return ajax.get(url);
  }
}
