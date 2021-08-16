import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class CommentService {
  constructor(private http: HttpClient) {}

  insertComment(myformData: any): Observable<any> {
    return this.http.post('http://127.0.0.1:8000/api/addcomment', myformData);
  }

  getComment(id: any): Observable<any> {
    return this.http.get('http://127.0.0.1:8000/api/showComment/' + id);
  }

  // post_id="2";
  // insertComment(data:any)
  // {
  //   user_id=sessionStorage.getItem("id")
  //   data.post_id = this.post_id,
  //   data.user_id= this.user_id

  //   return this.http.post("http://localhost:8000/api/comment",data);
  // }
}
