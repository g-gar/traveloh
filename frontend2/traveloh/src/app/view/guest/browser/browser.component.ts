import { Component, OnInit, Input } from '@angular/core';
import { AirlineService } from 'src/app/service/airline.service';
import { AirportService } from 'src/app/service/airport.service';
import { AirportList } from 'src/app/model/airport-list.model';
import { Airline } from 'src/app/model/airline.model';
import { AirlineList } from 'src/app/model/airline-list.model';
import { AirlineListItem } from 'src/app/model/airline-list-item.model';

@Component({
  selector: 'app-browser',
  templateUrl: './browser.component.html',
  styleUrls: ['./browser.component.scss']
})
export class BrowserComponent implements OnInit {
  @Input() airlines: Array<Airline> = [];
  
  constructor(private airlineService: AirlineService) {
  }

  ngOnInit() {
    
    this.getAirlines()
    this.getRanks()

  }

  getAirlines() {
    this.airlineService.getAirlines().then((list: AirlineList) => {
      list.slice(0,5).forEach((item: AirlineListItem) => {
        
        this.airlineService.getAirline(item.id).then((airline: Airline) => {
          this.airlines.push(airline);
          this.airlines = this.airlines.sort((a: Airline, b: Airline) => {
            return a.rating > b.rating ? -1 : 1;
          })
          console.log(this.airlines)
        })

      })
    })
  }

  getRanks():void{
  let results: Array<string>;
  //this.results.push(this.airlineService.getRanking());
  }

  getName() {
    
  }
}
