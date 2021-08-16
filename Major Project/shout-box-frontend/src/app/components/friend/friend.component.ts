import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { FriendService } from 'src/app/services/friend.service';
import { Observable } from 'rxjs';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-friend',
  templateUrl: './friend.component.html',
  styleUrls: ['./friend.component.scss'],
})
export class FriendComponent implements OnInit {
  @Input() attemptClick: boolean = false;
  @Output() public notify: EventEmitter<any> = new EventEmitter<any>();
  friends: Observable<any>;
  users: Observable<any>;
  pending: Observable<any>;
  data: any;
  user_id: any;
  session_id: any;
  f_id: any;
  flag: boolean = false;
  isfriend: any;
  length: number;
  sendFriend: any;

  isAddClicked: boolean = true;

  isClicked: boolean = false;
  isPendingClicked: boolean = false;
  constructor(
    private friend: FriendService,
    private ar: ActivatedRoute,
    private router: Router
  ) {
    this.session_id = sessionStorage.getItem('id');
    console.log('session id' + this.session_id);
  }

  
  acceptRequest(friend_id: number) {
    this.user_id = this.session_id;
    this.data = {
      user_id: this.session_id,
      friend_id: friend_id,
    };
    this.friend.acceptRequest(this.data).subscribe(
      () => {
        console.log('addeds');
        console.log("accepted friends....1");
        
        this.getAcceptedFriends(this.user_id);
        this.getAllPendingRequest(this.user_id);
      },
      (error) => {
        throw new Error('failed to accept request');
      }
    );
    
  }

  removeFriend(friend_id: number) {
   

    this.user_id = this.session_id;

    this.f_id = friend_id;
    console.log(this.f_id);

    this.friend.removeFriend(this.user_id, this.f_id).subscribe(
      () => {
        console.log('addeds');
       this.getAllPendingRequest(this.user_id);
       this.getAcceptedFriends(this.user_id);

      },
      (error) => {
        throw new Error('failed to remove friend');
      }
    );

  }

  showPost(f: any) {
   
    console.log(f.id);
    this.user_id = this.session_id;
    

    this.friend.isFriend(this.user_id, f.id).subscribe((result) => {
      this.isfriend = result;
      this.length = this.isfriend.length;
      console.log('inside friend comp');

      console.log(this.isfriend);
      this.attemptClick = true;
      this.notify.emit(this.attemptClick);
      if (this.length > 0) {
        
        this.router.navigate(['/profile/' + f.id + '/' + f.firstname], {
          state: {
            sendFriend: f,
          },
        });
      } else {
        alert('you are not my friend!!');
      }
    },
    (error) => {
      throw new Error('failed to show post');
    });
    
    
  }
  
  showPendingFriends() {
    this.isClicked = false;
    this.isPendingClicked = true;

  }
  ngOnInit(): void {
   
    this.user_id = this.session_id;

    
    this.getAcceptedFriends(this.user_id);

    
    this.getAllPendingRequest(this.user_id);


  }

  getAcceptedFriends(user_id:number)
  {
    
    this.friends = this.friend.getAcceptedFriends(user_id);
  }
  getAllPendingRequest(user_id:number)
  {
    this.friend.getAllPendingRequest(user_id).subscribe((result) => {
      
      this.pending = result;
      
    },
    
    
    );
    
  }
}
