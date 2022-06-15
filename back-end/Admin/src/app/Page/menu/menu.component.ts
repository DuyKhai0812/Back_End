import { Component, OnInit } from '@angular/core';
import { Router, Routes } from '@angular/router';
@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html',
  styleUrls: ['./menu.component.css']
})
export class MenuComponent implements OnInit {

  constructor(private rt:Router) { }
  
  token:any;
  name:any;
  kh:any;
  ngOnInit(): void {
    this.token = localStorage.getItem('token');
    this.name = localStorage.getItem('name');
    this.kh = localStorage.getItem('q');
    console.log(this.kh);
    if(!this.token)
    {
      this.rt.navigate(['']);
    }
  }
  sp(qq:number,link:string)
  {
    if(qq == 0)
    {
      this.rt.navigate([link]);
    }
    else
    {
      alert("Bạn không đủ quyền để truy cập");
    }
  }


  //Remove token khỏi data để đăng xuất
  logOUt()
  {
    window.localStorage.removeItem('token');
    this.rt.navigate(['']);
  }

}
