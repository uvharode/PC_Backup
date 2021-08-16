import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class LikeService {

  constructor(private http: HttpClient) { }

  likePost(data: any): Observable<any> {
    return this.http.post('http://localhost:8000/api/like', data);
  }

  getLikes(post_id: number): Observable<any> {
    return this.http.get('http://localhost:8000/api/getlikes/' + post_id);
  }
}
