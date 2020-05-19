import { Component, OnInit, Injector } from '@angular/core';
import { AjaxService } from 'src/app/service/ajax.service';
import { environment } from 'src/environments/environment';
import { Airport } from 'src/app/model/airport.model';
import { Observable } from 'rxjs';
import { finalize } from 'rxjs/operators';

@Component({
  selector: 'app-search',
  templateUrl: './search.component.html',
  styleUrls: ['./search.component.scss']
})
export class SearchComponent implements OnInit {

  constructor(private ajax: AjaxService) {

   }

  ngOnInit(): void {

    let url: string = this.ajax.buildUrlFromEnvironment(environment.API.paths.info.airports);
    
    this.ajax.getJson<Array<Airport>>(url).then(e => e.forEach(console.log))

    
  }

}
