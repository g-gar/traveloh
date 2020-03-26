import { Injectable, Optional } from '@angular/core';
import { ApiCallerService } from './api-caller-service';
import { environment } from 'src/environments/environment';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { ApiVaderResult } from '../model/api-vader-result';

@Injectable({
  providedIn: 'root'
})
export class ApiSimpleMessageService implements ApiCallerService<string, ApiVaderResult> {

  constructor(private http: HttpClient){}

  doCall(param: string): Promise<ApiVaderResult> {
    const url = environment.sentimentApi.baseUrl + "/" +environment.sentimentApi.variants[0];
    const analyzer = environment.sentimentApi.types[0];
    const body = {
      analyzer,
      lines: [param]
    };
    const httpOptions = {
      headers: new HttpHeaders({ 'Content-Type': 'application/json' })
    };

    return this.http.post(url, body, httpOptions)
      .toPromise()
      .then(response => response as ApiVaderResult)
  }
}
