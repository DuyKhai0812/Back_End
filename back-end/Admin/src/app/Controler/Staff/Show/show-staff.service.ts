import { Injectable } from '@angular/core';
import {liink} from '../../../../Link/link';
import {HttpClient,HttpParams} from '@angular/common/http';
import {Staff} from '../../../../Model/staff.model';
import {Account} from '../../../../Model/account.model';
@Injectable({
  providedIn: 'root'
})
export class ShowStaffService {

  constructor(private http:HttpClient) { }

  //Show All Staff
  staffURL = liink.bsaeURL + 'Show_Staff.php';
  //staff!: Staff[];
  showAllStaff()
  {
    return this.http.get<Staff[]>(this.staffURL).pipe();
  }
  //Show Staff not Account
  staffNotURL = liink.bsaeURL + 'Staff_Not_Account.php';
  showStaffNotAccount()
  {
    return this.http.get<Staff[]>(this.staffNotURL).pipe();
  }
  //Show Staff has Account
  staffHasURL = liink.bsaeURL + 'Staff_Has_Account.php';
  showStaffHasAccount()
  {
    return this.http.get<Staff[]>(this.staffHasURL).pipe();
  }
  //Show manage Account Staff
  AccountURF = liink.bsaeURL + 'Staff_Account.php';
  showAccount()
  {
    return this.http.get<Account[]>(this.AccountURF).pipe();
  }
  AccountAcessURF = liink.bsaeURL + 'Show_Staff_Acess.php?Acess=';
  showAccountAcess(id:any)
  {
    return this.http.get<Account[]>(this.AccountAcessURF + id).pipe();
  }
}
