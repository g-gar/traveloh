import { Component, OnInit, Injector, Input, Attribute } from '@angular/core';
import { Router } from '@angular/router';
import { FlightService } from 'src/app/service/flight.service';
import { Flight } from 'src/app/model/flight.model';
import { SentimentData } from 'src/app/model/data/sentiment/sentiment-data.interface';
import { Airport } from 'src/app/model/airport.model';
import { Observable, of } from 'rxjs';
import { Airline } from 'src/app/model/airline.model';
import { AirportService } from 'src/app/service/airport.service';
import { AirlineService } from 'src/app/service/airline.service';

@Component({
  selector: 'app-result',
  templateUrl: './result.component.html',
  styleUrls: ['./result.component.scss']
})
export class ResultComponent implements OnInit {

  private id : number;
  public flight : Flight;
  @Input() public airline : Airline;

  constructor(private injector: Injector) {
    let router : Router = injector.get(Router);
    let url : string = router.url;
    this.id = parseInt(url.split('/').reverse()[0]);
  }

  ngOnInit() {

    let srv : FlightService = this.injector.get(FlightService);

    srv.getFlight(this.id)
    .then((e: Flight) => {
      this.flight = new Flight(e['flight_data'], e['more_flight_info'], e['weather_info']);
      let srv: AirlineService = this.injector.get(AirlineService);
      srv.getAirline(this.flight.id_airline).then((a: Airline) => {
        this.airline = a;
        console.log(a)
      });
    })


  }
}
