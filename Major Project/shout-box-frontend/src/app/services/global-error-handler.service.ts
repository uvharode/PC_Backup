import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class GlobalErrorHandlerService {

  constructor() { }
  handleError(er: Error) {
    alert(er.message)
  }
}
