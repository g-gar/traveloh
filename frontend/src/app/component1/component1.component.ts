import { Component, OnInit } from '@angular/core';
import { ApiSimpleMessageService } from '../service/api-simple-message.service';

@Component({
  selector: 'app-component1',
  templateUrl: './component1.component.html',
  styleUrls: ['./component1.component.css']
})
export class Component1Component implements OnInit {

  miTexto: string;

  constructor(private apiMessageService: ApiSimpleMessageService) { }

  ngOnInit(): void { }

  analyse() {
     //alert(`El texto a anlizar es: ${this.miTexto}`);
     this.apiMessageService
      .doCall(this.miTexto)
      .subscribe(
       e => {
         console.log(e);
       },
       error => {
         console.error(error);
       },
       () => {}
     )
   }

}
