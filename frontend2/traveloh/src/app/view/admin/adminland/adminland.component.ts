import { Component, OnInit, Injector } from '@angular/core';
import { environment } from 'src/environments/environment';
import { AjaxService } from 'src/app/service/ajax.service';

@Component({
  selector: 'app-adminland',
  templateUrl: './adminland.component.html',
  styleUrls: ['./adminland.component.scss']
})
export class AdminlandComponent implements OnInit {

  constructor(private injector: Injector) { }

  ngOnInit(): void {

  }
  loadScrappers(){
    console.log("Begin");
    let ajax: AjaxService = this.injector.get(AjaxService);
    let url: string = ajax.buildUrlFromEnvironment(environment.API.paths.scrappers);



    return ajax.get(url).then(() => {
      console.log("finished");
    });
  }

}
