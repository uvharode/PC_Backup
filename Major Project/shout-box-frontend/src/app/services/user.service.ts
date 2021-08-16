import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

const user = 'http://127.0.0.1:8000/api/display/';
const loginUrl = 'http://127.0.0.1:8000/api/login';
const registerUrl = 'http://127.0.0.1:8000/api/register';

@Injectable({
  providedIn: 'root',
})
export class UserService {
  // [x: number]: any;
  userid: number | undefined;
  constructor(private http: HttpClient) {}

  user(userid: number): Observable<any> {
    return this.http.get(user + userid);
  }

  login(loginForm: any): Observable<any> {
    return this.http.post(loginUrl, loginForm);
  }

  register(registerForm: any): Observable<any> {
    console.log('in register function');
    console.log(registerForm.value);
    return this.http.post(registerUrl, registerForm);
  }
}
