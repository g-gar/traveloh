import { Injectable, Optional } from '@angular/core';
import { ApiCallerService } from './api-caller-service';
import { environment } from 'src/environments/environment';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';


@Injectable({
  providedIn: 'root'
})
export class ApiSimpleMessageService implements ApiCallerService<string> {

  constructor(private http: HttpClient){}

  doCall(param: string): Observable<object> {
    const url = environment.sentimentApi.baseUrl;
    const analyzer = environment.sentimentApi.types[0];
    const body = {
      analyzer,
      lines: [param]
    };
    const httpOptions = {
      headers: new HttpHeaders({ 'Content-Type': 'application/json' })
    };

    return this.http.post(url, body, httpOptions)
  }
}
