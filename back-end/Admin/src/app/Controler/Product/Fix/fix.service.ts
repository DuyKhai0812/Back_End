import { Injectable } from '@angular/core';
import {HttpClient,HttpParams} from '@angular/common/http';
import {liink} from '../../../../Link/link';
import {Product_Id} from '../../../../Model/id_product.model';

@Injectable({
  providedIn: 'root'
})
export class FixService {

  constructor(private http:HttpClient) { }

  fixURL = liink.bsaeURL + 'Fix_Product.php';
  fixProduct(FixData:any,img:any,masp:any,accc:any)
  {
    let payLoad = new HttpParams();
    payLoad = payLoad.append('Ma_SP',masp);
    payLoad = payLoad.append('Ten_SP',FixData.Ten_SP);
    payLoad = payLoad.append('Hinh',img);
    payLoad = payLoad.append('Don_Gia',FixData.Don_Gia);
    payLoad = payLoad.append('Mo_Ta',FixData.Mo_Ta);
    payLoad = payLoad.append('Ma_NSX',FixData.Ma_NSX);
    payLoad = payLoad.append('Ma_LSP',FixData.Ma_LSP);
    payLoad = payLoad.append('Giam_Gia',FixData.Giam_Gia);
    payLoad = payLoad.append('Kich_Hoat',FixData.Kich_Hoat);
    payLoad = payLoad.append("Account",accc);
    return this.http.post(this.fixURL,payLoad);
  }

  getData = liink.bsaeURL + 'Get_Data_To_Fix.php?Ma_SP=';
  getDataFix(id:any)
  {
    return this.http.get<Product_Id[]>(this.getData + id).pipe();
  }

  checkData = liink.bsaeURL + 'Check_Product.php';
  Check_Data(KichHoat:any,Ma_SP:any,acc:any)
  {
    let payLoad = new HttpParams();
    payLoad = payLoad.append('KichHoat',KichHoat);
    payLoad = payLoad.append('Ma_SP',Ma_SP);
    payLoad = payLoad.append('Account',acc);
    return this.http.post(this.checkData,payLoad);
  }
}
