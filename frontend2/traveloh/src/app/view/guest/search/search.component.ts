import { Component, OnInit, Injector } from '@angular/core';
import { FlightService } from 'src/app/service/flight.service';

@Component({
  selector: 'app-search',
  templateUrl: './search.component.html',
  styleUrls: ['./search.component.scss']
})
export class SearchComponent implements OnInit {

  constructor(private injector: Injector) {
    new FlightService(injector).getFlights();
  }

  ngOnInit(): void {
    
  }

}
