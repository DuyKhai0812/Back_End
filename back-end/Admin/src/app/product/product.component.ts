import { Component, OnInit } from '@angular/core';
import { Product } from '../../Model/product.model';
import { Producter } from '../../Model/producter.model';
import { Type } from '../../Model/type.model';
import { ProductService } from '../Controler/ShowData/product.service';
import { ThemSpService } from '../Controler/Product/Add/them-sp.service';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { AngularFireStorage } from '@angular/fire/compat/storage';
import { FixService } from '../Controler/Product/Fix/fix.service';

@Component({
  selector: 'app-product',
  templateUrl: './product.component.html',
  styleUrls: ['./product.component.css']
})
export class ProductComponent implements OnInit {

  constructor(private product:ProductService,private add:ThemSpService,private fromBD:FormBuilder,private ff:AngularFireStorage,private fix:FixService) { this.innitFromProducts();}
  sanpham!: Product[];
  isLoading = false;
  SP:any;
  name:any;
  ngOnInit(): void {
    this.getAllPro();
    this.getType();
    this.getProducter();
    this.name = localStorage.getItem('accc');
  }
  SearchNC(){
    
    
      this.sanpham = this.sanpham.filter(res =>{
        return res.Ten_SP.toLocaleLowerCase().match(this.SP.toLocaleLowerCase());
        
      });
    
  }
  emtySearch()
  {
    if(this.SP == "")
    {
      this.ngOnInit();
    }
  }

  //Get data to API
  getAllPro(){
    this.product.getAllProduct().subscribe((data:Product[])=>{
      this.sanpham = data;

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
  
  fromProduct!: FormGroup;
  innitFromProducts()
  {
    this.myDate = Date.now();
    this.fromProduct = this.fromBD.group({
      Ma_SP: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      Ten_SP: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      //Hinh: new FormControl(this.name),
      Don_Gia : new FormControl('',[Validators.required,Validators.maxLength(15)]),
      Mo_Ta: new FormControl('',[Validators.required,Validators.maxLength(1500)]),
      Ma_NSX: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      Ma_LSP: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      Giam_Gia: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      Kich_Hoat: new FormControl('',[Validators.required,Validators.maxLength(15)])
    });
  }
  //Check the product code exists or not
  checkData:any;
  onClickCheckProduct()
  {
    this.isLoading = true;
    this.add.checkCodeProducts(this.fromProduct.value).subscribe((res:any)=>{
      console.log(this.fromProduct.value);
      if(res)
      {
        this.isLoading = false;
        this.checkData = res;
        console.log(JSON.stringify(res));
          if(this.checkData.Status == 2)
            alert("Mã có thể sử dụng ");
          else        
            alert("Mã đã tồn tại");
      }
      
    },(err)=>{
      alert('Có vấn đề xảy ra');
      this.isLoading = false;
    });
  }
  //Add data to mySQL
  myDate :any;
  onSubmit()
  {
    this.myDate = Date.now();
    //console.log(this.myDate);
    //console.log(this.fromProduct.value);
    this.link = ("/files" + this.myDate);
    this.ff.upload(this.link,this.path);
    this.add.add(this.fromProduct.value,this.link,this.name).subscribe(res=>{
      console.log("Thành công",JSON.stringify(res));
      alert("Thành công");
      window.location.reload();
    },(err)=>{
      console.log(err);
    });

    //console.log(this.link);
  }
  //Up load img to firebase
  path:any;
  upload($event:any){
    this.path = $event.target.files[0];
    //this.name = $event.target.files[0].name;
    //console.log(this.name);
  }
  link:any;
  //switches 
  fixCheck(KH:any,MSP:any)
  {
    if(KH == 0)
    {
      this.fix.Check_Data(1,MSP,this.name).subscribe((res:any)=>{
        alert(res.message);
        window.location.reload();
      })
    }
    else
    {
      this.fix.Check_Data(0,MSP,this.name).subscribe((res:any)=>{
        alert("Thành công vô hiệu hóa");
        window.location.reload();
      })
    }
  }
  //Filter Pice

  resss:boolean =true;
  

  sortPirce()
  {
    if(this.resss)
    {
      let newarr = this.sanpham.sort((a:any,b:any)=>b.Don_Gia - a.Don_Gia)
      this.resss = !this.resss
    }
    else if(!this.resss)
    {
      let newarr = this.sanpham.sort((a:any,b:any)=>a.Don_Gia - b.Don_Gia)
      this.resss = !this.resss
    }
  }

  resss2:boolean =true;
  

  sortID()
  {
    if(this.resss2)
    {
      let newarrs = this.sanpham.sort((a:any,b:any)=>b.Giam_Gia - a.Giam_Gia)
      this.resss2 = !this.resss2
    }
    else if(!this.resss2)
    {
      let newarrs = this.sanpham.sort((a:any,b:any)=>a.Giam_Gia - b.Giam_Gia)
      this.resss2 = !this.resss2
    }
  }

  p:any;

}
