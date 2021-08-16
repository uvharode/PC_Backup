import { Injectable } from '@angular/core';
import { Subject, BehaviorSubject } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class CheckloginService {
  username = new BehaviorSubject<String>(sessionStorage.getItem('firstname'));
  constructor() {}

  isUserLoggedIn() {
    let username = sessionStorage.getItem('firstname');
    return !(username === null);
  }
  getUserName() {
    let username = sessionStorage.getItem('firstname');
    return username;
  }
}
