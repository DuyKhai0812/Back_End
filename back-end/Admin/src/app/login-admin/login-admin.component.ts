import { Component, OnInit } from '@angular/core';
import { LoginService } from '../Controler/Login/login.service'
import {FormBuilder,FormControl,FormGroup,Validators } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login-admin',
  templateUrl: './login-admin.component.html',
  styleUrls: ['./login-admin.component.css']
})
export class LoginAdminComponent implements OnInit {

  constructor(private lg_ad:LoginService,private fromBD:FormBuilder,public rt:Router) {this.innitFromLogin(); }
  selected :number = 1;
  loginFrom!: FormGroup;
  data:any;
  token:any;
  ngOnInit(): void {
    this.token = localStorage.getItem('token');
    if(this.token)
    this.rt.navigate(['index']);
  }
  selectOption(id: number) {
    //getted from event
    console.log(id);
    //getted from binding
    console.log(this.selected)
  }
  //Lấy dữ liệu từ from
  innitFromLogin()
  {
    this.loginFrom = this.fromBD.group({
      account: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      password: new FormControl('',[Validators.required,Validators.maxLength(15)]),
      test: new FormControl('',[Validators.required,Validators.maxLength(15)])
    });
  }
  //Nhấn đăng nhập
  onSubmitLogin()
  {
    console.log(this.loginFrom.value);
    if(this.loginFrom.value.test == 1 || this.loginFrom.value.test == '')
    {
      this.lg_ad.loginStaff(this.loginFrom.value).subscribe((res:any)=>{
        if(res){
          //console.log(JSON.stringify(res));
          //localStorage.setItem("name",this.data.Ten);
          if(res.KichHoat == 0)
          {
            alert("Tài khoản bạn chưa được kích hoạt");
          }
          else
          {
              this.data = res;
            switch(this.data.Status){
              case 3:
                localStorage.setItem("accc",this.data.TaiKhoan);
                localStorage.setItem("name",this.data.Ten);
                localStorage.setItem("q",this.data.Quyen);
                this.navigateToHome();
              //console.log(this.ac.Token);
              //alert(this.data.Ten);
              localStorage.setItem("token",this.data.Token); //Chuyển token để xác nhận đăng nhập
              //Chuyển Tên để xác show tên ADMIN
              break;
              case 2:
                alert(this.data.Mess);
                break;
            }
          }   
        }
      });
    }
    else
    {
      this.lg_ad.loginAD(this.loginFrom.value).subscribe(res=>{
        if(res){
          //console.log(JSON.stringify(res));
          //localStorage.setItem("name",this.data.Ten);
          this.data = res;
          switch(this.data.Status){
            case 3:
              localStorage.setItem("accc",this.data.TaiKhoan);
              localStorage.setItem("name",this.data.Ten);
              localStorage.setItem("q",this.data.Quyen);
              this.navigateToHome();
            //console.log(this.ac.Token);
            //alert(this.data.Ten);
            localStorage.setItem("token",this.data.Token); //Chuyển token để xác nhận đăng nhập
             //Chuyển Tên để xác show tên ADMIN
            break;
            case 2:
              alert(this.data.Mess);
              break;
          }
        }
      });
    }
  }

  //Chuyển trang sang index
  navigateToHome(){
    this.rt.navigate(['index']);     
}

}
