import { Component, OnInit, Injector } from '@angular/core';
import { FlightService } from 'src/app/service/flight.service';
import { FlightList } from 'src/app/model/flight-list.model';
import { FlightListItem } from 'src/app/model/flight-list-item.model';
import { Router } from '@angular/router';

@Component({
  selector: 'app-search',
  templateUrl: './search.component.html',
  styleUrls: ['./search.component.scss']
})
export class SearchComponent implements OnInit {



  constructor(private injector: Injector) {}

  ngOnInit(): void {
    
  }

  searchFlight(code : string) {
    let srv : FlightService = this.injector.get(FlightService);
    let router : Router = this.injector.get(Router);

    srv.getFlights().then((list: FlightList) => {
      console.log(list);
      let flight : FlightListItem = list.find((e : FlightListItem) => e.code == code);
      if (!!flight) {
        router.navigate(['/result', flight.id]);
      } else {
        // hacer algo en caso de que el vuelo no exista
      }
    })

  }

}
