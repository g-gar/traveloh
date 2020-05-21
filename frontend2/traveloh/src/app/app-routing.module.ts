import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { SearchComponent } from './view/guest/search/search.component';
import { BrowserComponent } from './view/guest/browser/browser.component';
import { LoginComponent } from './view/guest/login/login.component';
import { AdminlandComponent } from './view/admin/adminland/adminland.component';


const routes: Routes = [

  { path: '', component: SearchComponent },
  { path: 'browse', component: BrowserComponent },
  { path: 'login', component: LoginComponent},
  { path: 'admin', component: AdminlandComponent}

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
