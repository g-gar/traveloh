import { Component, OnInit } from '@angular/core';
import { ApiSimpleMessageService } from '../service/api-simple-message.service';
import { VaderResult } from '../model/vader-result';
import $ from "jquery";
import { ApiVaderResult } from '../model/api-vader-result';

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
      .then(response => {
        response.results.forEach((result: VaderResult) => {
          this.loadProgress(result)
        });
      })
   }

   loadProgress(result: VaderResult) {
    let percentageToDegrees = (percentage: number): number => {
      return percentage / 100 * 360;
    }

    let formatNumberAsString = (n: number): string => {
      return new Intl.NumberFormat('en-us', {minimumFractionDigits: 2}).format(n);
    }

    $(".row").each(function() {
      $(this).find('.positive-compound').text(`${formatNumberAsString(result.pos * 100)}%`)
      $(this).find('.neutral-compound').text(`${formatNumberAsString(result.neu * 100)}%`)
      $(this).find('.negative-compound').text(`${formatNumberAsString(result.neg * 100)}%`)
    })

    $(".progress").each(function() {
      
      let value: number = result.compound * 100;
      let left = $(this).find('.progress-left .progress-bar');
      let right = $(this).find('.progress-right .progress-bar');

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
