import { Component, OnInit } from '@angular/core';
import { ThemSpService} from '../Controler/Product/Add/them-sp.service';
import {  Producter } from '../../Model/producter.model';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { ProducterService} from '../Controler/Product/Add/Producter/producter.service'
import { Router } from '@angular/router';
@Component({
  selector: 'app-producter',
  templateUrl: './producter.component.html',
  styleUrls: ['./producter.component.css']
})
export class ProducterComponent implements OnInit {
  
  constructor(private producter:ThemSpService,private add_producter:ProducterService,private fromBD:FormBuilder,private rt:Router) { this.intFrom();this.initFromData();}
  producterr!:Producter[];
  name:any;
  ngOnInit(): void {
    this.getProducter();
    this.getQuantity();
    this.selectedRam1 =0;
    this.name = localStorage.getItem('accc');
  }
  
  getProducter()
  {
    this.producter.getNSX().subscribe((res:Producter[])=>{
      this.producterr = res;
      
    })
  }
  public quantities: Array<number> = [];
  getQuantity() {
    for (let i = 1; i <= 100; i++) {
      this.quantities.push(i)
    }
  }
  //Add data producter
  fromProducter !:FormGroup;
  intFrom()
  {
    this.fromProducter = this.fromBD.group({
      Ma_NSX : new FormControl('',[Validators.required,Validators.maxLength(15)]),
      Ten_NSX : new FormControl('',[Validators.required,Validators.maxLength(15)]),
      Do_Tin_Cay : new FormControl('',[Validators.required,Validators.maxLength(15)])
    });
  }
  data:any;
  onSubmit()
  {
    //console.log(this.fromProducter.value)
    this.add_producter.addProducter(this.fromProducter.value,this.selectedRam1,this.name).subscribe((res:any)=>{
      this.data = res;
      alert(this.data.message);
      window.location.reload();
    });
  }
  selectedRam :any;
  setRam(value:any){
    this.selectedRam = value;
    //console.log(this.selectedRam);
  }
  selectedRam1 :any;
  setRam1(value:any){
    this.selectedRam1 = value;
    //console.log(this.selectedRam);
  }

  prrr!:Producter;
  Ma:any;
  Ten:any;
  Reliability:any;
  ShowDataFix(id:any)
  {
    this.add_producter.getDataFix(id).subscribe((res:any)=>{
      this.prrr = res;
      this.Ma = this.prrr.Ma_NSX;
      this.Ten = this.prrr.Ten_NSX;
      this.Reliability = this.prrr.Do_Tin_Cay;
      this.selectedRam = this.prrr.Do_Tin_Cay;
      this.fromProducter2.patchValue(this.prrr);
    })
  }
  fromProducter2 !:FormGroup;
  initFromData()
  {
    this.fromProducter2 = this.fromBD.group({
      Ten_NSX : new FormControl('',[Validators.required,Validators.maxLength(15)])
    });
  }
  submitFixData()
  {

    this.add_producter.fixData(this.fromProducter2.value,this.Ma,this.selectedRam,this.name).subscribe((res:any)=>{
      alert(res.message);
      this.getProducter();
      this.ngOnInit();
      window.location.reload();
    })
  }
  resss:boolean =true;
  sortReliability()
  {
    if(this.resss)
    {
      let newarr = this.producterr.sort((a:any,b:any)=>b.Do_Tin_Cay - a.Do_Tin_Cay)
      this.resss = !this.resss
    }
    else if(!this.resss)
    {
      let newarr = this.producterr.sort((a:any,b:any)=>a.Do_Tin_Cay - b.Do_Tin_Cay)
      this.resss = !this.resss
    }
  }
  p:any;
  dtc:any;
  phanTram(id:any)
  {
    this.dtc = id + '%';
  }

  
}
