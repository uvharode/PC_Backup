import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class BioService {

  constructor(private http: HttpClient) { }

  //get bio
  getFriendsBio(user_id: number): Observable<any> {
    console.log(user_id);

    return this.http.get('http://localhost:8000/api/getbio/' + user_id);
  }
  //update bio
  updateBio(data: any): Observable<any> {
    return this.http.put('http://localhost:8000/api/updatebio', data);
  }
}
