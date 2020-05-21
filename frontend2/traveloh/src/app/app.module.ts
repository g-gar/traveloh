import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { SearchComponent } from './view/guest/search/search.component';
import { LoginComponent } from './view/guest/login/login.component';
import { BrowserComponent } from './view/guest/browser/browser.component';
import { RankingComponent } from './view/guest/ranking/ranking.component';
import { Token } from './interceptor/token.interceptor';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
import { AjaxService } from './service/ajax.service';
import { AuthService } from './service/auth.service';
import { AnalyticsService } from './service/analytics.service';
import { ScrapperService } from './service/scrapper.service';
import { AirportService } from './service/airport.service';
import { AirlineService } from './service/airline.service';
import { FlightService } from './service/flight.service';
import { HeaderComponent } from './view/headers/header/header.component';
import { HeaderAdminComponent } from './view/headers/header-admin/header-admin.component';
import { FooterComponent } from './view/footer/footer.component';
import { AppComponent } from './app.component';
import { AdminlandComponent } from './view/admin/adminland/adminland.component';


@NgModule({
  declarations: [
    AppComponent,
    SearchComponent,
    LoginComponent,
    BrowserComponent,
    RankingComponent,
    HeaderComponent,
    HeaderAdminComponent,
    FooterComponent,
    AdminlandComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule
  ],
  providers: [
    {
      provide: HTTP_INTERCEPTORS,
      useClass: Token,
      multi: true
    },
    AjaxService,
    AuthService,
    AnalyticsService,
    ScrapperService,
    AirportService,
    AirlineService,
    FlightService    
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
