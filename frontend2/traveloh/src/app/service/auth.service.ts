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
    return this.decodedToken ? this.decodedToken.username : null;
  }

  getPassword() {
    this.decodeToken();
    return this.decodedToken ? this.decodedToken.password : null;
  }

  getExpiryTime() {
    this.decodeToken();
    return this.decodedToken ? Number(this.decodedToken.exp) : null;
  }

  /**
   * TODO: remove since this should be server-side
   */
  isTokenExpired(): boolean {
    const expiryTime: number = this.getExpiryTime();
    if (expiryTime) {
      return ((1000 * expiryTime) - (new Date()).getTime()) < 5000;
    } else {
      return false;
    }
  }

  revalidateIfNeeded(): AuthService {
    if (this.jwtToken != null) {
      this.decodeToken();
      let url: string = `${environment.API.protocol}://${environment.API.host}:${environment.API.port}${environment.API.paths.authentication}`;
      this.injector.get(AjaxService)
        .postJson(url, {
          user: this.getUser(),
          password: this.getPassword()
        }).then((token: string) => {
          this.setToken(token);
        }).catch(error => {
          console.log(error);
        })
    }
    return this;
  }
}
