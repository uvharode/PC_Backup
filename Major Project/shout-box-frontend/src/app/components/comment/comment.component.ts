import { Component, OnInit } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { CommentService } from 'src/app/services/comment.service';
import { Observable } from 'rxjs';
import { NgForm } from '@angular/forms';
import { FormGroup } from '@angular/forms';
import { FormControl } from '@angular/forms';
import { ReactiveFormsModule } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { FriendService } from 'src/app/services/friend.service';
import { NgbActiveModal } from '@ng-bootstrap/ng-bootstrap';

@Component({
  selector: 'app-comment',
  templateUrl: './comment.component.html',
  styleUrls: ['./comment.component.scss'],
})
export class CommentComponent implements OnInit {
  postData!: FormGroup;
  title = 'blog';
  
  session_id: any;
  text: any;
  filedata: any;
  user_id: any;
  post_id: any;
  x: any;
  users: any;
  data: any;
  public selectedFile: any;

 

  form = new FormGroup({
    text: new FormControl(''),
  });
  postId: any;
  commentList: any;
  session_user_name: any;

  constructor(
    private post: CommentService,
    private http: HttpClient,
    private ar: ActivatedRoute,
    private router: Router,
    private friend: FriendService,
    public activeModal: NgbActiveModal
  ) {
    this.session_id = sessionStorage.getItem('id');
    this.postId = sessionStorage.getItem('postid');
    this.session_user_name = sessionStorage.getItem('firstname');
  }

  ngOnInit(): void {
    this.comments();
  }

  comments() {
    this.post.getComment(this.postId).subscribe((data) => {
      this.commentList = data;
    });
  }

  onSubmitComment(f: NgForm) {
    console.log('inside onsubmit comment');

    this.user_id = this.session_id;
    this.post_id = this.postId;
    console.log(this.postId);
   let myformData = new FormData();
    myformData.append('text', this.text);
    myformData.append('user_id', this.user_id);
    myformData.append('post_id', this.post_id);
    myformData.append('name', this.session_user_name);
    this.post.insertComment(myformData).subscribe(() => {
      f.reset();
      
    }
    ,
    (error) => {
      throw new Error('failed to comment to this post');
    });
  }
}