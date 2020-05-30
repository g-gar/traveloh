import { Component, OnInit, Injector } from '@angular/core';
import { Router } from '@angular/router';
import { FlightService } from 'src/app/service/flight.service';
import { Flight } from 'src/app/model/flight.model';
import { SentimentData } from 'src/app/model/data/sentiment/sentiment-data.interface';
import { Airport } from 'src/app/model/airport.model';

@Component({
  selector: 'app-result',
  templateUrl: './result.component.html',
  styleUrls: ['./result.component.scss']
})
export class ResultComponent implements OnInit {

  private id : number;
  public flight : Flight;

  constructor(private injector: Injector) {
    let router : Router = injector.get(Router);
    let url : string = router.url;
    this.id = parseInt(url.split('/').reverse()[0]);

    
  }

  ngOnInit() {
    this.loadFlightInfo(this.id).then((e: Flight) => {
      this.flight = new Flight(e['flight_data'], e['more_flight_info'], e['weather_info']);
      
    })
  }

  loadFlightInfo(id: number) : Promise<Flight> {
    let srv : FlightService = this.injector.get(FlightService);
    return srv.getFlight(this.id);
  }

  loadComentaries() : Promise<SentimentData[]> {
    return null;
  }

  loadDepartureAirport() : Promise<Airport> {
    return null;
  }
}
