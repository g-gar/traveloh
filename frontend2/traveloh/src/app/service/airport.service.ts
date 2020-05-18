import { Injectable, Optional, Injector } from '@angular/core';
import { environment } from 'src/environments/environment';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

import { Airport } from 'src/app/model/airport.model';
import { AjaxService } from './ajax.service';

@Injectable({
  providedIn: 'root'
})
export class AirportService {

  constructor(private injector: Injector) { }

  findAll(): Array<[number, Airport]> {

    type Pair<T,K> = [T,K];
    type Pairs<T,K> = Pair<T,K>[];

    let ajax: AjaxService = this.injector.get(AjaxService);
    /* let airports: Pairs<number, Airport> = ajax.getJson<Pairs<number, Airport>>(ajax.buildUrlFromEnvironment(environment.API.paths.info.airport));
    return airports; */
    return null;
  }

  rank(): Array<[number, number]> {
    return null;
  }

}
