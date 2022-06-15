import { Component, OnInit } from '@angular/core';
import { Router, Routes } from '@angular/router';
import { ShowNoitceService} from '../Controler/Notice/Show/show-noitce.service';
import { Notice } from '../../Model/notice.model';
@Component({
  selector: 'app-show-acc',
  templateUrl: './show-acc.component.html',
  styleUrls: ['./show-acc.component.css']
})
export class ShowAccComponent implements OnInit {

  constructor(private rt:Router,private shoow:ShowNoitceService) { }
  name :any;
  ngOnInit(): void {
    this.name = localStorage.getItem('name');
    this.showNoticee();
  }
  logOUt()
  {
    window.localStorage.removeItem('token');
    this.rt.navigate(['']);
  }
  nt!:Notice[];
  showNoticee()
  {
    this.shoow.showNotice().subscribe((res:Notice[])=>{
      this.nt = res;
    })
  }
}
