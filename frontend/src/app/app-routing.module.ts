import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { IndexComponent } from './index/index.component';
import { Component1Component } from './component1/component1.component';



const routes: Routes = [
  { path:'', component:IndexComponent},
  { path:'analyse', component:Component1Component}

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
