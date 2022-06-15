import { Injectable } from '@angular/core';
import {HttpClient,HttpParams} from '@angular/common/http';
import {liink} from '../../../../../Link/link';
import {Type } from '../../../../../Model/type.model';

@Injectable({
  providedIn: 'root'
})
export class TypeService {

  constructor(private http:HttpClient) { }

  addURL = liink.bsaeURL + 'Add_Type.php';

  addType(TypeData:any,acc:any)
  {
    let payload = new HttpParams();
    payload = payload.append("Ma_LSP",TypeData.Ma_LSP);
    payload = payload.append("Ten_LSP",TypeData.Ten_LSP);
    payload = payload.append("Account",acc);
    return this.http.post(this.addURL,payload);
  }

  getIDTypeURL = liink.bsaeURL + 'Get_ID_Type.php?Ma_LSP=';
  getIDType(id:any)
  {
    return this.http.get<Type[]>(this.getIDTypeURL + id).pipe();
  }

  fixDataURL = liink.bsaeURL + 'Fix_Type.php';
  fixData(TypeData:any,id:any,acc:any)
  {
    let payload = new HttpParams();
    payload = payload.append("Ma_LSP",id);
    payload = payload.append("Ten_LSP",TypeData.Ten_LSP);
    payload = payload.append("Account",acc);
    return this.http.post(this.fixDataURL,payload);
  }
}
