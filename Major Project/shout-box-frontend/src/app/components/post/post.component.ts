import { Component, OnInit } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { PostService } from 'src/app/services/post.service';
import { Observable } from 'rxjs';
import { NgForm } from '@angular/forms';
import { FormGroup } from '@angular/forms';
import { ReactiveFormsModule } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { FriendService } from 'src/app/services/friend.service';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { ReportComponent } from '../report/report.component';
import { CommentComponent } from '../comment/comment.component';
import { LikeService } from 'src/app/services/like.service';


@Component({
  selector: 'app-post',
  templateUrl: './post.component.html',
  styleUrls: ['./post.component.scss'],
})
export class PostComponent implements OnInit {
  postData!: FormGroup;
  title = 'blog';
  Path: any = 'http://127.0.0.1:8000';
  session_id: any;
  text: any;
  filedata: any;
  user_id: any;
  
  users: any[];
  data: any;
  isAdded:boolean=false;
  friends_id:any;
  selectedFile:any = null;

  fileEvent(e: any) {
    this.filedata = e.target.files[0];
    this.selectedFile = this.filedata.name;
  }
  constructor(
    private post: PostService,
    private http: HttpClient,
    private ar: ActivatedRoute,
    private router: Router,
    private friend: FriendService,
    private modalService: NgbModal,
    private like:LikeService
  ) {
   
    this.session_id = sessionStorage.getItem('id');
  }
  friendsPosts: Observable<any>;
  //function to add a friend
  addfriend(friend_id: number, i:number) {
   
    this.user_id = this.session_id;
    this.data = {
      user_id: this.session_id,
      friend_id: friend_id,
    };

    this.friend.addFriend(this.data).subscribe(
      () => {
       
        this.isAdded=true;
       
        this.users[i].requestSent = true
      },
      (error) => {
        console.log(error);
      }
    );
    
  }
  ngOnInit(): void {
    console.log('inside ngoninit post');

    this.user_id = this.session_id;
   
    this.getAllUsers(this.user_id);

    
    this.getPostForTimeline(this.user_id);
  }

  
  getAllUsers(user_id:number)
  {
    this.friend.getAllUsers(user_id).subscribe((result) => {
     
      this.users = result;
      Object.values(this.users).map((ele) => {
        ele = { ...ele , requestSent: false}
      })
      
    });
  }

  getPostForTimeline(user_id:number)
  {
    this.post.getPostForTimeline(user_id).subscribe((result) => {
     
      this.friendsPosts = result;

     
    });
  }




  //for report
  btnclick(id: any) {
    sessionStorage.setItem('postid', id);

    
  }
  //posting shouts
  onSubmitpost(f: NgForm) {
    console.log(f.form.value.text);
    if(!(f.form.value.text || this.filedata?.name)){
      return
    }
    this.user_id = this.session_id;
    let myformData = new FormData();
    const headers = new HttpHeaders();
    headers.append('Content-type', 'multipart/form-data');
    headers.append('Accept', 'application/json');
    myformData.append('multimedia', this.filedata);
    myformData.append('text', this.text);
    myformData.append('user_id', this.user_id);
    this.post.insertMultimedia(myformData).subscribe(() => {

     this.getPostForTimeline(this.user_id);
     f.reset();
     this.selectedFile=null;
     
    },
    );
  }

  openReport(link) {


    const modalRef = this.modalService.open(ReportComponent);
    modalRef.componentInstance.src = link;
  }

  comment(id: any, link ) {
   
    sessionStorage.setItem('postid', id);
    const modalRef = this.modalService.open(CommentComponent);
    modalRef.componentInstance.src = link;
  }

  likePost(post_id:number)
  {

    this.user_id = this.session_id;
    this.data = {
      user_id: this.session_id,
      post_id: post_id,
    };

    this.like.likePost(this.data).subscribe(
      () => {
       
        this.getPostForTimeline(this.user_id);

      
      },
      (error) => {
        throw new Error("Failed to post the shout");
      }
    );
  }
}
