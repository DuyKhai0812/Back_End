import { Component, OnInit, ViewChild } from '@angular/core';
import { ShowStaffService } from '../Controler/Staff/Show/show-staff.service';
import { Staff} from '../../Model/staff.model';
import { AddStaffService } from '../Controler/Staff/Add/add-staff.service';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-staff',
  templateUrl: './staff.component.html',
  styleUrls: ['./staff.component.css']
})
export class StaffComponent implements OnInit {

  constructor(private stff:ShowStaffService,private add_stf :AddStaffService,private fromBD:FormBuilder,private rt:Router) { this.initFromStaff();this.initFrom(); }
  names:any;
  ngOnInit(): void {
    this.ShowStaff();
    this.names = localStorage.getItem('accc');
  }
  //Show data staff
  staff!:Staff[];
  ShowStaff()
  {
    
    this.stff.showAllStaff().subscribe((res:Staff[])=>{
      this.staff = res;
      //console.log(res);
    });
  }
  gender:any;
  checkSex(number:any)
  {
    if(number == 0)
    {
      this.gender = "Nữ"
    }
    else if(number == 1)
    {
      this.gender = "Nam"
    }
  }
  //add staff
  staffData!:FormGroup;
  initFromStaff()
  {
    this.staffData = this.fromBD.group({
      Ma_NV: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      Ten_NV: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      Ngay_Sinh: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      Gioi_Tinh: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      Dia_Chi: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      SDT: new FormControl('',[Validators.required,Validators.maxLength(15)])
    })
  }
  onSubmit()
  {
    console.log(this.staffData.value);
    if(this.staffData.value.SDT.length >11)
    {
      alert("Số điện thoại quá 10 số");
    }
    else
    {
      this.add_stf.addStaff(this.staffData.value,this.names).subscribe((res:any)=>{
        alert(res.message);
        if(res.status == true)
        {
          window.location.reload();
        }
      });
    }
    
  }
  numberOnly(event:any): boolean {
    const charCode = (event.which) ? event.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false;
    }
    return true;

  }
  status:any;
  ShowStaffNotAccount()
  {
    this.stff.showStaffNotAccount().subscribe((res:Staff[])=>{
      this.staff = res;
      //console.log(res);
    });
  }
  ShowStaffHasAccount()
  {
    this.stff.showStaffHasAccount().subscribe((res:Staff[])=>{
      this.staff = res;
      //console.log(res);
    });
  }
  show = false;
  AddAccount(a:any)
  {
    if(a == 1)
      this.show = true;
    else
      this.show = false;
  }

  code:any;
  name:any;
  birth:any;
  sex:any;
  adress:any;
  phone:any;
  stfffff!:Staff;
  GetIDStaff(id:any)
  {
    this.add_stf.fixStaff(id).subscribe((res:any)=>{
      this.stfffff = res;
      this.code = this.stfffff.Ma_NV;
      this.name = this.stfffff.Ten_NV;
      this.birth = this.stfffff.Ngay_Sinh;
      this.sex = this.stfffff.Gioi_Tinh;
      this.adress = this.stfffff.Dia_Chi;
      this.phone = this.stfffff.SDT;
      this.fromProduct2.patchValue(this.stfffff);
    });
  }

  fromProduct2!:FormGroup;
  initFrom()
  {
    this.fromProduct2 = this.fromBD.group({
      
      Ten_NV: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      Ngay_Sinh: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      Gioi_Tinh: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      Dia_Chi: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      SDT: new FormControl('',[Validators.required,Validators.maxLength(15)])
    });
  }
  submitFix()
  {
    console.log(this.fromProduct2.value);
    console.log(this.code);
    this.add_stf.Fix_Data_Staff(this.fromProduct2.value,this.code,this.names).subscribe((res:any)=>{
      alert(res.message);
      if(res.status == true)
        {
          window.location.reload();
        }
    })
  }

  resss2:boolean =true;
  

  sortSex()
  {
    if(this.resss2)
    {
      let newarrs = this.staff.sort((a:any,b:any)=>b.Gioi_Tinh - a.Gioi_Tinh)
      this.resss2 = !this.resss2
    }
    else if(!this.resss2)
    {
      let newarrs = this.staff.sort((a:any,b:any)=>a.Gioi_Tinh - b.Gioi_Tinh)
      this.resss2 = !this.resss2
    }
  }
  p:any;
  NV:any;
 SearchNC(){
  this.staff = this.staff.filter(res =>{
    return res.Ten_NV.toLocaleLowerCase().match(this.NV.toLocaleLowerCase());
    
  });

  }
  emtySearch()
  {
    if(this.NV == "")
    {
      this.ngOnInit();
    }
  }

}

