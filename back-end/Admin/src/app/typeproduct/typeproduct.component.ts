import { Component, OnInit } from '@angular/core';
import { ThemSpService} from '../Controler/Product/Add/them-sp.service'
import {  Type } from '../../Model/type.model'
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { TypeService} from '../Controler/Product/Add/Type/type.service'
@Component({
  selector: 'app-typeproduct',
  templateUrl: './typeproduct.component.html',
  styleUrls: ['./typeproduct.component.css']
})
export class TypeproductComponent implements OnInit {

  constructor(private typpe:ThemSpService,private fromBD:FormBuilder,private tyype:TypeService) {this.innitFromProducts();this.innitFromFixType() }
  type!:Type[];
  names:any;
  ngOnInit(): void {
    this.getType();
    this.names = localStorage.getItem('accc');
  }
  //Call API type
  getType()
  {
    this.typpe.getLSP().subscribe((res:Type[])=>{
      this.type = res;
    })
  }
  //Add Type to data
  fromProduct!: FormGroup;
  //Get data to from
  innitFromProducts()
  {
    this.fromProduct = this.fromBD.group({
      Ma_LSP: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      Ten_LSP: new FormControl('',[Validators.required,Validators.maxLength(15)]),
    });
  }
  //Click button Add 
  dataType:any;
  onSubmit()
  {
     this.tyype.addType(this.fromProduct.value,this.names).subscribe((res:any)=>{
      this.dataType = res;
      alert(res.message);
      if(res.status == true)
        {
          window.location.reload();
        }
     }) 
  }

  Ma:any;
  Name:any;
  Typppe!:Type;
  getIDType(id:any)
  {
    this.tyype.getIDType(id).subscribe((res:any)=>{
      this.Typppe = res;
      this.Ma = this.Typppe.Ma_LSP;
      this.Name = this.Typppe.Ten_LSP;
      this.fromProduct2.patchValue(this.Typppe);
    })
  }

  fromProduct2!: FormGroup;
  innitFromFixType()
  {
    this.fromProduct2 = this.fromBD.group({
      Ten_LSP: new FormControl('',[Validators.required,Validators.maxLength(15)])
    });
  }
  onSubmitFix()
  {
    console.log(this.fromProduct2.value);
    this.tyype.fixData(this.fromProduct2.value,this.Ma,this.names).subscribe((res:any)=>{
      alert(res.message);
      this.getType();
    })
  }
  p:any;
}
