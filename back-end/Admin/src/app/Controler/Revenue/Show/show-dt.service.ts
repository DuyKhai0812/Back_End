import { Injectable } from '@angular/core';
import {liink} from '../../../../Link/link';
import {HttpClient,HttpParams} from '@angular/common/http';
import {Revenue} from '../../../../Model/revenue.model'
import {Visualization_Revenue} from '../../../../Model/revenue_visualization.model'
import {Revenues} from '../../../../Model/revenue.models'

@Injectable({
  providedIn: 'root'
})
export class ShowDtService {

  constructor(private http:HttpClient) { }

  getRevenueURL = liink.bsaeURL + 'Revenue_Month.php';
  getRevenue()
  {
    return this.http.get<Revenue>(this.getRevenueURL).pipe();
  }

  getRevenueYURL = liink.bsaeURL + 'Revenue_Year.php';
  getRevenueY()
  {
    return this.http.get<Revenue>(this.getRevenueYURL).pipe();
  }

  getRevenueDURL = liink.bsaeURL + 'Revenue_Day.php';
  getRevenueD()
  {
    return this.http.get<Revenue>(this.getRevenueDURL).pipe();
  }

  getRevenueVURL = liink.bsaeURL + 'Revenue_Type.php';
  getRevenueV()
  {
    return this.http.get<Visualization_Revenue>(this.getRevenueVURL).pipe();
  }

  getRevenueDsURL = liink.bsaeURL + 'Revenue_Days.php?1=';
  getRevenueDs(id:any)
  {
    return this.http.get<any[]>(this.getRevenueDsURL + id).pipe();
  }

  getRevenueCartURL = liink.bsaeURL + 'Revenue_Carts.php';
  getRevenueCs()
  {
    return this.http.get<any[]>(this.getRevenueCartURL).pipe();
  }
}
