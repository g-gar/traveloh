export class SentimentData {
   
   constructor(
      public id : number, 
      public positive: number, 
      public negative: number, 
      public neutral: number, 
      public compound: number, 
      public text: string, 
      public id_airline: number
   ){}

}
