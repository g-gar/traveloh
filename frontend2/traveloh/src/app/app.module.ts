import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { SearchComponent } from './view/guest/search/search.component';
import { LoginComponent } from './view/guest/login/login.component';
import { BrowserComponent } from './view/guest/browser/browser.component';
import { RankingComponent } from './view/guest/ranking/ranking.component';
import { ScrappersComponent } from './view/admin/scrappers/scrappers.component';
import { StatsComponent } from './view/admin/stats/stats.component';
import { Token } from './interceptor/token.interceptor';
import { HttpClientModule, HTTP_INTERCEPTORS, HttpClient } from '@angular/common/http';
import { AjaxService } from './service/ajax.service';
import { AuthService } from './service/auth.service';
import { AnalyticsService } from './service/analytics.service';
import { ScrapperService } from './service/scrapper.service';
import { AirportService } from './service/airport.service';
import { AirlineService } from './service/airline.service';
import { FlightService } from './service/flight.service';

@NgModule({
  declarations: [
    SearchComponent,
    LoginComponent,
    BrowserComponent,
    RankingComponent,
    ScrappersComponent,
    StatsComponent,
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
  bootstrap: [SearchComponent]
})
export class AppModule { }
