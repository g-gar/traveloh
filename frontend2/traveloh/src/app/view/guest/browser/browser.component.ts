import { Component, OnInit } from '@angular/core';
import { AirlineService } from 'src/app/service/airline.service';
import { AirportService } from 'src/app/service/airport.service';
import { AirportList } from 'src/app/model/airport-list.model';
import { Airline } from 'src/app/model/airline.model';

@Component({
  selector: 'app-browser',
  templateUrl: './browser.component.html',
  styleUrls: ['./browser.component.scss']
})
export class BrowserComponent implements OnInit {
  public airlines: Array<Airline>;
  public ids: Array<number>;
  public compounds: Array<number>;

  
  
  constructor(private airlineService: AirlineService) {
  }

  ngOnInit() {
    this.getrank()
  }
  getrank():void{
  let results: Array<string>;
  //this.results.push(this.airlineService.getRanking());
  this.airlineService.getRanking().then((ranks: Array<[number, number]>) =>  {
    console.log(ranks)
    console.log(Array.isArray(results))
    ranks.sort((a: [number, number], b : [number, number]) => {
      return a[1] > b[1] ? 1 : -1;
    }).forEach((el, i, arr) => {
      this.ids.push(el[0]);
      this.compounds.push(el[1]);
    })
  })  

  }

}
