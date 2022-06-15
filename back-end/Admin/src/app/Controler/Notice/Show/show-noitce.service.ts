import { Injectable } from '@angular/core';
import {HttpClient,HttpParams} from '@angular/common/http';
import {liink} from '../../../../Link/link';
import {Notice} from '../../../../Model/notice.model';

@Injectable({
  providedIn: 'root'
})
export class ShowNoitceService {

  constructor(private http:HttpClient) { }


  showNoticeURL = liink.bsaeURL + 'Show_Notice.php';
  showNotice()
  {
    return this.http.get<Notice[]>(this.showNoticeURL).pipe();
  }
}
