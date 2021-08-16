import { Component, OnInit, Input } from '@angular/core';
import { ReportService } from 'src/app/services/report.service';
import { Router } from '@angular/router';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { FormBuilder } from '@angular/forms';
import {
  ModalDismissReasons,
  NgbActiveModal,
} from '@ng-bootstrap/ng-bootstrap';

@Component({
  selector: 'app-report',
  templateUrl: './report.component.html',
  styleUrls: ['./report.component.scss'],
})
export class ReportComponent implements OnInit {
 

  issues: any = [
    'Its Spam',
    'its inappropriate',
    'Terrorism',
    'False News',
    'Harassment',
  ];

  @Input() src;

  
  issue: any;
  session_id: any;
  alreadyReported: boolean = false;
  successfullyReported: boolean = false;

  
  constructor(
    private router: Router,
    private http: HttpClient,
    private service: ReportService,
    public activeModal: NgbActiveModal
  ) {
    this.session_id = sessionStorage.getItem('id');
  }

  

  onSubmit() {
    
    let data = {
      post_id: sessionStorage.getItem('postid'),
      user_id: this.session_id,
      
      issue: this.issue,
    };
    console.warn(this.issue);
   
    this.service.reportpost(data).subscribe((result) => {
     
      if (result.message == 'already reported') {
        this.alreadyReported = true;
      } else {
        this.successfullyReported = true;
      }
     
    },
    (error) => {
      throw new Error("Report Failed..");
    });
  }


  ReportedAlready() {
    this.alreadyReported = false;
  }
  SuccessfullyReported() {
    this.successfullyReported = false;
  }
  ngOnInit() {}
}