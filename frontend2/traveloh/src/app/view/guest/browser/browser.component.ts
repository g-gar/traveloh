import { Component, OnInit, Input } from '@angular/core';
import { AirlineService } from 'src/app/service/airline.service';
import { FlightService } from 'src/app/service/flight.service';
import { FlightListItem } from 'src/app/model/flight-list-item.model';
import { AirportList } from 'src/app/model/airport-list.model';
import { Airline } from 'src/app/model/airline.model';
import { AirlineList } from 'src/app/model/airline-list.model';
import { AirlineListItem } from 'src/app/model/airline-list-item.model';
import { FlightList } from 'src/app/model/flight-list.model';
import { Flight } from 'src/app/model/flight.model';

@Component({
  selector: 'app-browser',
  templateUrl: './browser.component.html',
  styleUrls: ['./browser.component.scss']
})
export class BrowserComponent implements OnInit {
  @Input() airlines: Array<Airline> = [];
  @Input() flights: Array<Flight> = [];


  constructor(private airlineService: AirlineService, private flightService: FlightService) {
  }

  ngOnInit() {

    this.getAirlines()
    this.getRanks()
    this.getflights()

  }

  getAirlines() {
    this.airlineService.getAirlines().then((list: AirlineList) => {
      list.slice(0,5).forEach((item: AirlineListItem) => {

        this.airlineService.getAirline(item.id).then((airline: Airline) => {
          this.airlines.push(airline);
          this.airlines = this.airlines.sort((a: Airline, b: Airline) => {
            return a.rating > b.rating ? -1 : 1;
          })
        })

      })
    })
  }

  getRanks():void{
  let results: Array<string>;
  //this.results.push(this.airlineService.getRanking());
  }


  getflights() {
    this.flightService.getFlights().then((list1: FlightList) => {
      list1.slice(0,10).forEach((item1: FlightListItem) => {

        this.flightService.getFlight(item1.id).then((flight: Flight) => {
          this.flights.push(flight);
        })

      })
    })

    console.log(this.flights)

  }
}
