import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { SearchComponent } from './view/guest/search/search.component';
import { HeaderComponent } from './view/headers/header/header.component';
import { FooterComponent } from './view/footer/footer.component';
import { BrowserComponent } from './view/guest/browser/browser.component';


const routes: Routes = [

  { path: '', component: SearchComponent },
  { path: 'browse', component: BrowserComponent }

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
