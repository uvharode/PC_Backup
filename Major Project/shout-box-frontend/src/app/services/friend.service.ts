import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root',
})
export class FriendService {
  constructor(private http: HttpClient) {}
  //getting friends
  getAcceptedFriends(user_id: number): Observable<any> {
    return this.http.get('http://localhost:8000/api/accepted/' + user_id);
  }
  // add friend
  addFriend(data: any): Observable<any> {
    return this.http.post('http://localhost:8000/api/addfriend', data);
  }

  //accept request
  acceptRequest(data: any): Observable<any> {
    return this.http.post('http://localhost:8000/api/acceptrequest', data);
  }

  //get all users
  getAllUsers(user_id: number): Observable<any> {
    return this.http.get('http://localhost:8000/api/userlist/' + user_id);
  }
  //remove friend
  removeFriend(user_id: number, friend_id: number): Observable<any> {
    return this.http.delete(
      'http://localhost:8000/api/removefriend/' + user_id + '/' + friend_id
    );
  }
  //getting all pending request
  getAllPendingRequest(user_id: number): Observable<any> {
    return this.http.get('http://localhost:8000/api/pending/' + user_id);
  }

  //isfriend
  isFriend(user_id: number, friend_id: number): Observable<any> {
    return this.http.get(
      'http://localhost:8000/api/isfriend/' + user_id + '/' + friend_id
    );
  }
 
  //get bio
  getFriendsBio(user_id: number): Observable<any> {
    console.log(user_id);

    return this.http.get('http://localhost:8000/api/getbio/' + user_id);
  }
  //update bio
  updateBio(biodata: any,user_id:number): Observable<any> {
    return this.http.post('http://localhost:8000/api/updatebio/'+ user_id, biodata);
  }

  //add bio
  addBio(biodata: any): Observable<any> {
    return this.http.post('http://localhost:8000/api/addbio', biodata);
  }
}
