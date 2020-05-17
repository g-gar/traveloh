import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { environment } from 'src/environments/environment';
import { AppModule } from '../app.module';
import { AuthService } from './auth.service';

@Injectable({
  providedIn: 'root'
})
export class AjaxService {

  constructor(private http: HttpClient, private auth: AuthService) { }

  postJsonWithAuthorization<T>(url: string, body: Object): Promise<T> {
    return this.post(url, body, new HttpHeaders({
      'Content-Type': 'application/json',
      'Accept': 'application/json',
      'Content-Length': `${body.toString().length}`,
      'Authentication': `basic ${this.auth.revalidateIfNeeded().jwtToken}`
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
}
