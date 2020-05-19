import { Component, OnInit, Injector } from '@angular/core';
import { AjaxService } from 'src/app/service/ajax.service';
import { environment } from 'src/environments/environment';
import { Airport } from 'src/app/model/airport.model';
import { Observable } from 'rxjs';
import { finalize } from 'rxjs/operators';
import { AirportList } from 'src/app/model/airport-list.model';
import { AirportService } from 'src/app/service/airport.service';
import { AirlineService } from 'src/app/service/airline.service';

@Component({
  selector: 'app-search',
  templateUrl: './search.component.html',
  styleUrls: ['./search.component.scss']
})
export class SearchComponent implements OnInit {

  constructor(private injector: Injector) {

   }

  ngOnInit(): void {

    //new AirlineService(this.injector).getAirlines().then(console.log)
    //new AirportService(this.injector).getAirport("MAD").then(console.log)
  }

}
