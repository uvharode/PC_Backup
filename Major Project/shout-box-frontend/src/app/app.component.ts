import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { CheckloginService } from 'src/app/services/checklogin.service';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
})
export class AppComponent implements OnInit {
  title: any;
  user_id: any;
  username: Observable<String>;
  session_user_name: any;
  isVisible:boolean= false;
  constructor(
    private router: Router,
    private checkLoginservice: CheckloginService
  ) {
    // this.session_user_name = this.checkLoginservice.getUserName();
  }

  toggleNav(){
    this.isVisible = !this.isVisible;
  }

  logout() {
    // sessionStorage.removeItem('id');
    // sessionStorage.removeItem('firstname');
    sessionStorage.clear();
    this.router.navigate(['']);
    // window.location.reload();
  }

  yourProfile() {
    this.user_id = sessionStorage.getItem('id');
    console.log('inside your profile' + this.user_id);
    this.router.navigate(['/profile/' + this.user_id]);
  }
  ngOnInit(): void {
    this.username = this.checkLoginservice.username;
  }
  isLoggedIn() {
    return this.checkLoginservice.isUserLoggedIn();
  }
}
