import { Component } from '@angular/core';
import { AjaxService } from './service/ajax.service';
import { environment } from 'src/environments/environment';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'traveloh';

  constructor(private http: HttpClient, private ajax: AjaxService) {

    ajax.getJson(ajax.buildUrlFromEnvironment(environment.API.paths.info.airports))
    .then((e: string) => console.log(`AIRPORTS: ${JSON.parse(e)}`))
    .catch(console.log)

  }
}
