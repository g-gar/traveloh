import { Injectable, Optional } from '@angular/core';
import { environment } from 'src/environments/environment';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Scrapper } from '../model/interface/scrapper.interface';
import { Sentiment } from '../model/interface/sentiment.interface';
import { Sites } from '../model/site/sites.model';

@Injectable({
  providedIn: 'root'
})
export class ScrapperService {

  constructor() { }

  scrape<T extends Scrapper>(scrapper: Sites, code: string): T {
    return null;
  }

  doSentiment<T extends Sentiment>(sentiment: Sites, code: string): T {
    return null;
  }
  
}
