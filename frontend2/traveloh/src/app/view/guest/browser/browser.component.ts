import { Component, OnInit } from '@angular/core';
import { AirlineService } from 'src/app/service/airline.service';
import { AirportService } from 'src/app/service/airport.service';
import { AirportList } from 'src/app/model/airport-list.model';

@Component({
  selector: 'app-browser',
  templateUrl: './browser.component.html',
  styleUrls: ['./browser.component.scss']
})
export class BrowserComponent implements OnInit {
  list: AirportList[]
    
  constructor(private airportService: AirportService) {
  }

  ngOnInit() {
    this.getAirports()
  }
  getAirports():void{
    this.airportService.getAirports()
  }

}
