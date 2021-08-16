import { Component, OnInit } from '@angular/core';
import { FriendService } from 'src/app/services/friend.service';
import { Observable } from 'rxjs';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss'],
})
export class HomeComponent implements OnInit {
  session_id: any;
  user_id: any;
  constructor(
    private friend: FriendService,
    private ar: ActivatedRoute,
    private router: Router
  ) {
    this.session_id = sessionStorage.getItem('id');
  }
  users: Observable<any>;
  friendsPosts: Observable<any>;

  data: any;
  
  ngOnInit(): void {
    this.user_id = this.session_id;
   
  }
}
