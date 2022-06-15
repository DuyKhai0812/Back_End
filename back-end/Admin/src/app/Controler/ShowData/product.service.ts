import { Injectable } from '@angular/core';
import {liink} from '../../../Link/link';
import {HttpClient,HttpParams} from '@angular/common/http';
import {Product} from '../../../Model/product.model'

@Injectable({
  providedIn: 'root'
})
export class ProductService {

  constructor(private http:HttpClient) { }
  //Gọi API về sản phẩm
  getProductURL = liink.bsaeURL + 'Show_Product.php';
  getAllProduct(){
    return this.http.get<Product[]>(this.getProductURL).pipe();
  }


}
