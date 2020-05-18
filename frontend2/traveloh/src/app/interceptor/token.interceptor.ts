import { Injectable } from "@angular/core";
import { tap } from "rxjs/operators";
import {
  HttpRequest,
  HttpHandler,
  HttpEvent,
  HttpInterceptor,
  HttpResponse,
  HttpErrorResponse
} from "@angular/common/http";
import { Observable } from "rxjs";

export class Token implements HttpInterceptor {

   constructor(){}

   intercept(request: HttpRequest<any>, next: HttpHandler) : Observable<HttpEvent<any>> {
    return null;
   }
}
