import { Component, OnInit } from '@angular/core';
import { Validators, FormBuilder, FormGroup } from '@angular/forms';
import { UserService } from 'src/app/services/user.service';

import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss'],
})
export class LoginComponent implements OnInit {
  loginForm!: FormGroup;
  loggedin: boolean = false;
  notUser: boolean = false;
  notApproved: boolean = false;
  invalidCred: boolean = false;
  
  constructor(
    private fb: FormBuilder,
    private router: Router,
    private userService: UserService
  ) {}

  login() {
    this.userService.login(this.loginForm.value).subscribe((res) => {
      
      sessionStorage.setItem('id', res.id);
      sessionStorage.setItem('firstname', res.firstname);
      console.log(res);
      console.log(res.message);
      

      if (res.message == 'Not user') {
        this.notUser = true;
      } else if (res.message == 'Not approved') {
        this.notApproved = true;
      } else if (res.message == 'invalid') {
        this.invalidCred = true;
      } else {
        this.loggedin = true;
        this.router.navigate(['home']);
      }
    },
    (error) => {
      throw new Error("login failed");
    });

    
  }

  closeloggedin() {
    this.loggedin = false;
  }
  closenotUser() {
    this.notUser = false;
  }
  closenotApproved() {
    this.notApproved = false;
  }
  closeinvalidCred() {
    this.invalidCred = false;
  }
  ngOnInit(): void {
    this.loginForm = this.fb.group({
      email: ['', [Validators.required, Validators.email]],
      password: ['', Validators.required],
    });
  }
}
