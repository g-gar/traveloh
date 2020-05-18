import { Injectable, Injector } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { environment } from 'src/environments/environment';
import { AppModule } from '../app.module';
import { AuthService } from './auth.service';

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

  getJson<T>(url: string): Promise<T> {
    return this.get<T>(url, new HttpHeaders({
      'Accept': 'application/json'
    }));
  }

  get<T>(url: string, headers: HttpHeaders): Promise<T> {
    return this.http.get(url, { headers: headers })
    .toPromise()
    .then(response => response as T);
  }

  buildUrlFromEnvironment(path: string): string {
    return `${environment.API.protocol}://${environment.API.host}:${environment.API.port}`;
  }
}
