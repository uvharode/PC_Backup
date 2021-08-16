import { Injectable } from '@angular/core';
import { Observable, throwError } from 'rxjs';
import { retry, catchError } from 'rxjs/operators';
import { HttpClient } from '@angular/common/http'
@Injectable({
  providedIn: 'root'
})
export class ReportService {

  constructor(private http:HttpClient) { }

 
reportpost(data: any): Observable<any> {
  return this.http.post('http://localhost:8000/api/isReported', data);
  

}
}