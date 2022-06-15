import { Component, OnInit } from '@angular/core';
import {FixService} from '../Controler/Product/Fix/fix.service';
import {Product_Id} from '../../Model/id_product.model';
import {ThemSpService} from '../Controler/Product/Add/them-sp.service';
import { Type } from '../../Model/type.model';
import { Producter } from '../../Model/producter.model';
import { ActivatedRoute, Router } from '@angular/router';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { Product } from 'src/Model/product.model';
import { AngularFireStorage } from '@angular/fire/compat/storage'

@Component({
  selector: 'app-fix-product',
  templateUrl: './fix-product.component.html',
  styleUrls: ['./fix-product.component.css']
})
export class FixProductComponent implements OnInit {

  constructor(private fix:FixService,private route:ActivatedRoute,private frmBD:FormBuilder,private rt:Router,private add:ThemSpService,private ff:AngularFireStorage) { this.initFixProduct();}
  name:any;
  ngOnInit(): void {
    this.idProduct();
    this.getType();
    this.getProducter();
    this.name = localStorage.getItem('accc');
  }
  //get data product id
  product_IID!:Product_Id;
  idProduct()
  {
    const routeParams= this.route.snapshot.params;
    this.fix.getDataFix(routeParams.id).subscribe((res:any)=>{
      console.log(res);
      this.product_IID = res;
      this.fromGroup.patchValue(this.product_IID);
    });
  }
  //Get data Type to API
  loai!:Type[];
  getType()
  {
    this.add.getLSP().subscribe((data:Type[])=>{
      this.loai = data;
    });
  }
  //Get data Producter to API
  nsx!:Producter[];
  getProducter()
  {
    this.add.getNSX().subscribe((data:Producter[])=>{
      this.nsx = data;
    });
  }
  //Get data to from
  fromGroup!: FormGroup;
  initFixProduct()
  {
    this.fromGroup = this.frmBD.group({
      Ten_SP: new FormControl('',[Validators.required,Validators.maxLength(30)]),
      Don_Gia: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      Mo_Ta: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      Ma_NSX: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      Ma_LSP: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      Giam_Gia: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      Kich_Hoat: new FormControl('',[Validators.required,Validators.maxLength(15)]),
    })
  }
  myDate :any;
  link:any;
  onSubmit()
  {
    this.myDate = Date.now();
    //this.link = ("/files" + this.myDate);
    //this.ff.upload(this.link,this.path);
    //console.log(this.fromGroup.value);
    //console.log(this.path);
    //console.log(this.product_IID.Hinh);
    //console.log(this.product_IID.Ma_SP);
    if(this.path == undefined)
    {
      this.fix.fixProduct(this.fromGroup.value,this.product_IID.Hinh,this.product_IID.Ma_SP,this.name).subscribe((res:any)=>{
        alert(res.message);
        console.log(res.bug);
        window.location.reload();
      },(err)=>{
        alert(err);
      });
    }
    else
    {
      this.link = ("/files" + this.myDate);
      this.ff.upload(this.link,this.path);
      this.fix.fixProduct(this.fromGroup.value,this.link,this.product_IID.Ma_SP,this.name).subscribe((res:any)=>{
        alert(res.message);
        window.location.reload();
      },(err)=>{
        alert(err);
      });
    }
  }
  path:any;
  upload($event:any){
    this.path = $event.target.files[0];
  }

  imgURL: any;
  message: any;
  imagePath:any;
  preview(files:any) {
    if (files.length === 0)
      return;
 
    var mimeType = files[0].type;
    if (mimeType.match(/image\/*/) == null) {
      this.message = "Only images are supported.";
      return;
    }
 
    var reader = new FileReader();
    this.imagePath = files;
    reader.readAsDataURL(files[0]); 
    reader.onload = (_event) => { 
      this.imgURL = reader.result; 
    }
  }
  
}
