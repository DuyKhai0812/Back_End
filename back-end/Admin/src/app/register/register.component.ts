import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormControl, FormGroup, Validators } from '@angular/forms';
import { AddStaffService } from '../Controler/Staff/Add/add-staff.service';
import { Staff } from '../../Model/staff.model';
import { ActivatedRoute, Router } from '@angular/router';


@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {

  constructor(private stff:AddStaffService,private route:ActivatedRoute,private frmBD:FormBuilder,private rt:Router) {this.initAccount(); }

  ngOnInit(): void {
    this.idStaff();
  }

  staff !:Staff;
  code_Staff:any;
  phone_number: any;
  idStaff()
  {
    const routeParams= this.route.snapshot.params;
    this.stff.fixStaff(routeParams.id).subscribe((data:any)=>{
      this.staff = data;
      this.code_Staff = this.staff.Ma_NV;
      this.phone_number = this.staff.SDT;
      console.log(this.staff);
    });
  }

  //From register
  fromAcc !:FormGroup;
  initAccount()
  {
    this.fromAcc = this.frmBD.group({
      Password: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      KichHoat: new FormControl('',[Validators.required,Validators.maxLength(15)])
    })
  }
  onSubmit()
  {
    this.stff.Add_Account(this.fromAcc.value,this.code_Staff,this.phone_number).subscribe((res:any)=>{
      alert(res.message);
      if(res.status == true)
      {
        this.rt.navigate(['/account']);
      }
      else
      {

      }
    })
  }

}
