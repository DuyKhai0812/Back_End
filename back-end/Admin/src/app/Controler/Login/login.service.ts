import { Injectable } from '@angular/core';
import { HttpClient,HttpParams } from '@angular/common/http';
import { liink } from '../../../Link/link';

@Injectable({
  providedIn: 'root'
})
export class LoginService {

  constructor(private http:HttpClient) { }
  //Liên kết với API
  loginURL = liink.bsaeURL + "Login_AD.php";

  //Tạo service cho đăng nhập Admin
  loginAD(login:any)
  {
    let payload = new HttpParams();
    payload = payload.append("account",login.account);
    payload = payload.append("password",login.password);
    return this.http.post(this.loginURL,payload);
  }


  loginStaffURL = liink.bsaeURL + "Login_Staff.php";

  //Tạo service cho đăng nhập Admin
  loginStaff(login:any)
  {
    let payload = new HttpParams();
    payload = payload.append("account",login.account);
    payload = payload.append("password",login.password);
    return this.http.post(this.loginStaffURL,payload);
  }
}
