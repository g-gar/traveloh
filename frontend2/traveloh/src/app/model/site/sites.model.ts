import { Site } from '../interface/site.interface';

export class Sites implements Site {

   static readonly TRIPADVISOR_COM = new Sites("tripadvisor.com");
   static readonly TRIPADVISOR_ES = new Sites("tripadvisor.es");
   static readonly AENA_ES = new Sites("aena.es");
   static readonly TUTIEMPO_NET = new Sites("tutiempo.net");
   static readonly TWITTER_COM = new Sites("twitter.com");

   private constructor(public readonly identifier) {}
}
