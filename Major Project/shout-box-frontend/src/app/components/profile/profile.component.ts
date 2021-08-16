import { Component, OnInit } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { PostService } from 'src/app/services/post.service';
import { Observable } from 'rxjs';
import { NgForm } from '@angular/forms';
import { FormGroup } from '@angular/forms';
import { ReactiveFormsModule } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { Router } from '@angular/router';
import { FriendService } from 'src/app/services/friend.service';
import { DOCUMENT } from '@angular/common';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { CommentComponent } from '../comment/comment.component';
import { ReportComponent } from '../report/report.component';
import { LikeService } from 'src/app/services/like.service';



@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.scss'],
})
export class ProfileComponent implements OnInit {
  title = 'blog';
  Path: any = 'http://127.0.0.1:8000';

  click: boolean = false;
  showEdit: boolean = false;
  isEditClicked: boolean = false;
  isBioAdded: boolean = false;
  isBioAvailable: boolean = true;
  data: any;
  posts: any;
  user_id: any;
  bio: any;
  
  friend: Observable<any>;
  updatedData: any;
  length: number;
  demo: boolean = false;
  work: any;
  college: any;
  school: any;
  location: any;
  native_place: any;
  loggedInUser: boolean = false;
  session_id: any;
  biodata: any;
  username: any;

  session_user_name: any;
  friend_name: any;
  profile_name: any;

  friends_id:any;
  
  
  

  IsBioUpdated: boolean = false;

  

  constructor(
    private post: PostService,
    private http: HttpClient,
    private router: Router,
    private friends: FriendService,
    private ar: ActivatedRoute,
    private modalService: NgbModal,
    private like:LikeService
  ) {
    if (this.click === true) {
      this.friend = this.router.getCurrentNavigation().extras.state.sendFriend;
      
    }
    this.session_id = sessionStorage.getItem('id');
    this.session_user_name = sessionStorage.getItem('firstname');
    

   
  }
  friendComponent(event) {
    this.click = event;
  }
  btnclick(id: any) {
    sessionStorage.setItem('postid', id);

   
  }

  isPresent: boolean = true;

  Data(user_id: any) {
    
    if (user_id == this.session_id) {
      return false;
    } else {
      return true;
    }
  }

  editBio() {
    this.isEditClicked = true;
    this.IsBioUpdated = false;
    console.log( this.isEditClicked,this.IsBioUpdated );
    
  }
  onSubmit(form: NgForm) {
    this.user_id = this.session_id;
    
   
    let myformData = new FormData();
    myformData.append('work', form.value.work);
    myformData.append('college', form.value.college);
    myformData.append('school', form.value.school);
    myformData.append('location', form.value.location);
    myformData.append('native_place', form.value.native_place);
   
    this.friends.updateBio(myformData, this.user_id).subscribe(
      () => {
       
        this.IsBioUpdated = true;
        this.getBio(this.user_id);

        
      },
      (error) => {
        throw new Error("Failed to update bio");
      }
    );
  }

  

  deletePost(post_id: number) {
    this.user_id = this.session_id;
   
    

    this.post.deletePost(post_id).subscribe(
      () => {
       
        this.getPost(this.user_id);
      },

      (error) => {
        throw new Error("Failed to delete post");
      }
    );
  }

  ngOnInit(): void {
    this.user_id = this.ar.snapshot.paramMap.get('user_id');
    this.friend_name = this.ar.snapshot.paramMap.get('firstname');

    if (this.user_id == this.session_id) {
      this.loggedInUser = true;
      this.profile_name = this.session_user_name;
    } else {
      this.profile_name = this.friend_name;
      this.friends_id=this.user_id;
      
    }
    
   
    this.getPost(this.user_id);

    
    this.getBio(this.user_id);
  }
  //getting posts
  getPost(user_id:number)
  {
    this.posts = this.post.getDataById(user_id);
  }

  //getting bio
  getBio(user_id:number)
  {
    this.friends.getFriendsBio(user_id).subscribe((result) => {
      this.bio = result;
      this.length = this.bio.length;
     
      
      
      this.work = this.bio[0]?.work;
      this.college = this.bio[0]?.college;
      this.school = this.bio[0]?.school;
      this.location = this.bio[0]?.location;
      this.native_place = this.bio[0]?.native_place;
    },
    (error) => {
      throw new Error("Failed to get bio");
    });
  }

  comment(id: any, link ) {
   
    sessionStorage.setItem('postid', id);
    const modalRef = this.modalService.open(CommentComponent);
    modalRef.componentInstance.src = link;
  }

  openReport(link) {


    const modalRef = this.modalService.open(ReportComponent);
    modalRef.componentInstance.src = link;
  }

  likePost(post_id:number,user_id:number)
  {

    this.user_id = this.session_id;
    this.data = {
      user_id: this.session_id,
      post_id: post_id,
    };

    this.like.likePost(this.data).subscribe(
      () => {
      
       

        if (user_id == this.session_id) {
          this.getPost(this.user_id);
        } else {
         
          this.getPost(this.friends_id);
        }
       
        
      },
      (error) => {
        throw new Error("Failed to load profile");
      }
    );
  }

}