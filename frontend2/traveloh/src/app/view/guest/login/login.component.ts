import { Component, OnInit, Injector } from '@angular/core';
import { Router } from '@angular/router';


@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  constructor(private injector: Injector) { }

  ngOnInit(): void {

  }

  checkLogin(usuario: string, contraseña: string) {
    let router : Router = this.injector.get(Router);

      if (usuario=="admin" && contraseña=="admin1"){
        router.navigate(['/admin']);
      }
      else
      router.navigate(['']);
  }

}
