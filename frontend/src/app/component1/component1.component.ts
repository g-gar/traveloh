import { Component, OnInit } from '@angular/core';
import { ApiSimpleMessageService } from '../service/api-simple-message.service';
import $ from "jquery";

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
         this.loadProgress(e);
       },
       error => {
         console.error(error);
       },
       () => {}
     )
   }

   loadProgress(e: Object) {
    console.log(e, typeof e)
    e = e.results[0]
    console.log(e)

    let percentageToDegrees = (percentage: number) => {
      return percentage / 100 * 360;
    }

    let formatNumber = (n: number) => {
      return new Intl.NumberFormat('en-us', {minimumFractionDigits: 2}).format(n);
    }

    $(".row").each(function() {
      $(this).find('.positive-compound').text(`${formatNumber(e.pos * 100)}%`)
      $(this).find('.neutral-compound').text(`${formatNumber(e.neu * 100)}%`)
      $(this).find('.negative-compound').text(`${formatNumber(e.neg * 100)}%`)
    })

    $(".progress").each(function() {
      
      let value = e.compound * 100;
      var left = $(this).find('.progress-left .progress-bar');
      var right = $(this).find('.progress-right .progress-bar');

      $(this).find('.progress-value > .h2').text(`${value}`)
      $(this).find('.progress-value > .h2').append('<sup class="small">%</sup>')

      if (value > 0) {
        if (value <= 50) {
          right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
        } else {
          right.css('transform', 'rotate(180deg)')
          left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
        }
      }

    })
   }
}
