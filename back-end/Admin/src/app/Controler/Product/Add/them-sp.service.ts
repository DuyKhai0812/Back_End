import { Injectable } from '@angular/core';
import {HttpClient,HttpParams} from '@angular/common/http';
import {Product} from '../../../../Model/product.model';
import {Producter} from '../../../../Model/producter.model';
import {Type} from '../../../../Model/type.model';
import {liink} from '../../../../Link/link';

@Injectable({
  providedIn: 'root'
})
export class ThemSpService {
  
  constructor(private http:HttpClient) { }

  addURL = liink.bsaeURL + 'Add_Products.php';

  add(ProductData:any,link:any,accc:any)
  {
    let payload = new HttpParams();
    payload = payload.append("Ma_SP",ProductData.Ma_SP);
    payload = payload.append("Ten_SP",ProductData.Ten_SP);
    payload = payload.append("Hinh",link);
    payload = payload.append("Don_Gia",ProductData.Don_Gia);
    payload = payload.append("Mo_Ta",ProductData.Mo_Ta);
    payload = payload.append("Ma_NSX",ProductData.Ma_NSX);
    payload = payload.append("Ma_LSP",ProductData.Ma_LSP);
    payload = payload.append("Giam_Gia",ProductData.Giam_Gia);
    payload = payload.append("Kich_Hoat",ProductData.Kich_Hoat)
    payload = payload.append("Account",accc)
    return this.http.post(this.addURL,payload);
  }
  //////////////////////////////////////////////////////////////////////////////
  ProducterURL = liink.bsaeURL + 'Show_Producer.php';
  getNSX()
  {
    return this.http.get<Producter[]>(this.ProducterURL).pipe();
  }
  //////////////////////////////////////////////////////////////////////////////////
  typeURL = liink.bsaeURL + 'Show_Type_Products.php';
  getLSP()
  {
    return this.http.get<Type[]>(this.typeURL).pipe();
  }
  ////////////////////////////////////////////////////////////////////////////////////
  checkProduct = liink.bsaeURL+ 'Check_Code_Product.php';
  checkCodeProducts(Product:any)
  {
    let payload = new HttpParams();
    payload = payload.append("Ma_SP",Product.Ma_SP);
    return this.http.post(this.checkProduct,payload);
  }
}
