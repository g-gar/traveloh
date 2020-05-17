import { Injectable, Optional } from '@angular/core';
import { environment } from 'src/environments/environment';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

import { Airport } from 'src/app/model/airport.model';

@Injectable({
  providedIn: 'root'
})
export class AirportService {

  constructor(private http: HttpClient) { }

  findAll(): Array<[number, Airport]> {
    return null;
  }

  rank(): Array<[number, number]> {
    return null;
  }

}
