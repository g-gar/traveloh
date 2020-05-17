import { Injectable, Injector } from '@angular/core';
import * as jwt_decode from 'jwt-decode';
import { AjaxService } from './ajax.service';
import { environment } from 'src/environments/environment';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  jwtToken: string;
  decodedToken: { [key: string]: string };
 
  constructor(private injector: Injector) {}

  setToken(token: string) {
    if (token) {
      this.jwtToken = token;
    }
  }

  decodeToken() {
    if (this.jwtToken) {
    this.decodedToken = jwt_decode(this.jwtToken);
    }
  }

  getDecodeToken() {
    return jwt_decode(this.jwtToken);
  }

  getUser() {
    this.decodeToken();
    return this.decodedToken ? this.decodedToken.displayname : null;
  }

  getEmailId() {
    this.decodeToken();
    return this.decodedToken ? this.decodedToken.email : null;
  }

  getExpiryTime() {
    this.decodeToken();
    return this.decodedToken ? Number(this.decodedToken.exp) : null;
  }

  isTokenExpired(): boolean {
    const expiryTime: number = this.getExpiryTime();
    if (expiryTime) {
      return ((1000 * expiryTime) - (new Date()).getTime()) < 5000;
    } else {
      return false;
    }
  }

  revalidateIfNeeded(): AuthService {

    if (this.isTokenExpired() && environment.production) {
      let url: string = `${environment.API.protocol}://${environment.API.host}:${environment.API.port}${environment.API.paths.authentication}`;
      new AjaxService(this.injector.get(HttpClient), this).postJson(url, {}).then((token: string) => {
        this.setToken(token);
      })
    }
    return this;
  }
}
