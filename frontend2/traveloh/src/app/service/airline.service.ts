import { Injectable, Optional } from '@angular/core';
import { environment } from 'src/environments/environment';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

import { Airline } from 'src/app/model/airline.model';

@Injectable({
  providedIn: 'root'
})
export class AirlineService {

  constructor() { }

  findAll(): Array<[number, Airline]> {
    return null;
  }

  rank(): Array<[number, number]> {
    return null;
  }
}
