import { Injectable } from '@angular/core';
import {liink} from '../../../../Link/link';
import {HttpClient,HttpParams} from '@angular/common/http';
import {Cart} from '../../../../Model/cart.models'
import {CartDetails} from '../../../../Model/carts_details.model'
@Injectable({
  providedIn: 'root'
})
export class ShowService {

  constructor(private http:HttpClient) { }
  getCartURL = liink.bsaeURL + 'Show_Cart.php';
  getAllCart(){
    return this.http.get<Cart[]>(this.getCartURL).pipe();
  }

  getIDCartURL = liink.bsaeURL + 'Get_ID_Cart.php?Ma_DH=';
  getIDCart(id:any)
  {
    return this.http.get<Cart[]>(this.getIDCartURL + id).pipe();
  }

  getIDDeitailsCartURL = liink.bsaeURL + 'Get_ID_Details_Order.php?Ma_DH=';
  getIDDeitailsCart(id:any)
  {
    return this.http.get<CartDetails[]>(this.getIDDeitailsCartURL + id);
  }

  getCancelURL= liink.bsaeURL + 'Cancel_Order.php';
  cancelID(id:any,acc:any)
  {
    let payLoad = new HttpParams();
    payLoad = payLoad.append("Ma_DH",id);
    payLoad = payLoad.append("Account",acc);
    return this.http.post(this.getCancelURL,payLoad);
  }

  getFixShipsURL= liink.bsaeURL + 'Up_Ship_Order.php';
  UpShip(id:any,acc:any)
  {
    let payLoad = new HttpParams();
    payLoad = payLoad.append("Ma_DH",id);
    payLoad = payLoad.append("Account",acc);
    return this.http.post(this.getFixShipsURL,payLoad);
  }

  getDeleteURL= liink.bsaeURL + 'Delete_Products_Details.php';  
  deleteDetailsOrder(iddh:any,idsp:any,acc:any)
  {
    let payLoad = new HttpParams();
    payLoad = payLoad.append("Ma_DH",iddh);
    payLoad = payLoad.append("Ma_SP",idsp);
    payLoad = payLoad.append("Account",acc);
    return this.http.post(this.getDeleteURL,payLoad);
  }

  getID= liink.bsaeURL + 'Get_ID_Details_No_Row.php';
  IDNoRow(id:any,sp:any)
  {
    let payLoad = new HttpParams();
    payLoad = payLoad.append("Ma_DH",id);
    payLoad = payLoad.append("Ma_SP",sp);
    return this.http.post(this.getID,payLoad);
  }
}
