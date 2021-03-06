import { Injectable, Injector } from '@angular/core';
import { HttpClient, HttpHeaders, HttpResponse } from '@angular/common/http';
import { environment } from 'src/environments/environment';
import { AuthService } from './auth.service';
import { Observable, Subscription } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AjaxService {

  private auth: AuthService;

  constructor(private http: HttpClient, private injector: Injector) { 
    this.auth = injector.get(AuthService);
  }

  postJsonWithAuthorization<T>(url: string, body: Object): Promise<T> {
    return this.post(url, body, new HttpHeaders({
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'Content-Length': `${body.toString().length}`,
      'Authentication': `Bearer ${this.auth.revalidateIfNeeded().jwtToken}`
    }));
  }

  postJson<T>(url: string, body: Object): Promise<T> {
    return this.post(url, body, new HttpHeaders({
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'Content-Length': `${body.toString().length}`
    }));
  }

  post<T>(url: string, body: Object, headers: HttpHeaders): Promise<T> {
    return this.http.post(url, body, { headers: headers })
      .toPromise()
      .then(response => response as T);
  }

  get<T>(url: string, headers?: HttpHeaders): Promise<T> {
    return this.http.get<T>(url, {headers: headers}).toPromise<T>();
  }

  buildUrlFromEnvironment(path: string): string {
    return `${environment.API.protocol}://${environment.API.host}:${environment.API.port}${path}`;
  }
}
