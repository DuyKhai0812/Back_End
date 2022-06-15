import { Injectable } from '@angular/core';
import {HttpClient,HttpParams} from '@angular/common/http';
import {liink} from '../../../../../Link/link';
import {Producter} from '../../../../../Model/producter.model';
@Injectable({
  providedIn: 'root'
})
export class ProducterService {

  constructor(private http:HttpClient) { }
  addURL = liink.bsaeURL + 'Add_Producter.php';
  addProducter(TypeData:any,DTC:any,acc:any)
  {
    let payload = new HttpParams();
    payload = payload.append("Ma_NSX",TypeData.Ma_NSX);
    payload = payload.append("Ten_NSX",TypeData.Ten_NSX);
    payload = payload.append("Do_Tin_Cay",DTC);
    payload = payload.append("Account",acc);
    return this.http.post(this.addURL,payload);
  }
  fixProducter = liink.bsaeURL + 'Show_Producter_ID.php?Ma_NSX=';
  getDataFix(id:any)
  {
    return this.http.get<Producter[]>(this.fixProducter + id).pipe();
  }
  fixDataURL = liink.bsaeURL + 'Fix_Producter.php';
  fixData(TypeData:any,id:any,Do_Tin_Cay:any,acc:any)
  {
    let payload = new HttpParams();
    payload = payload.append("Ma_NSX",id);
    payload = payload.append("Ten_NSX",TypeData.Ten_NSX);
    payload = payload.append("Do_Tin_Cay",Do_Tin_Cay);
    payload = payload.append("Account",acc);
    return this.http.post(this.fixDataURL,payload);
  }
}
