import { Component, OnInit,ChangeDetectorRef  } from '@angular/core';
import { Revenue } from '../../Model/revenue.model';
import { ShowDtService } from '../Controler/Revenue/Show/show-dt.service';
import { Visualization_Revenue } from '../../Model/revenue_visualization.model';
import { Revenues } from '../../Model/revenue.models';
import { BrowserModule } from '@angular/platform-browser';
import { NgxChartsModule } from '@swimlane/ngx-charts';
import {HttpClient,HttpParams} from '@angular/common/http';


@Component({
  selector: 'app-index',
  templateUrl: './index.component.html',
  styleUrls: ['./index.component.css']
})



export class IndexComponent implements OnInit {

  
  constructor(private dt:ShowDtService,private http:HttpClient) { }
  today: number = Date.now();
  ngOnInit(): void {
    this.show();
    this.showY();
    this.showD();
    this.showVs();
    this.getRevenueCr();
  }
  dtt!:Revenue;
  doanhThuT:any;
  thang:any;
  nam:any;
  show()
  {
    this.dt.getRevenue().subscribe((res:any)=>{
      this.dtt = res;
      this.doanhThuT = this.dtt.Total_Month;
    })
    this.showV();
    
  }

  dttY!:Revenue;
  doanhThuN:any;
  showY()
  {
    
    this.dt.getRevenueY().subscribe((res:any)=>{
      this.dttY = res;
      this.doanhThuN = this.dttY.Total_Year;
    })
  }

  dttD!:Revenue;
  doanhThuD:any;
  showD()
  {
    
    this.dt.getRevenueD().subscribe((res:any)=>{
      this.dttD = res;
      this.doanhThuD = this.dttD.Total_Day;
    })
  }


  dtV!:Visualization_Revenue[];
  va!:any[];
  
  showV()
  {
    
    this.dt.getRevenueV().subscribe((res:any)=>{
      this.va = res;
    })
  }
  dt0!:any[];
  dt1!:any[];
  dt2!:any[];
  dt3!:any[];
  dt4!:any[];
  we:Revenues[] = [];
  showVs()
  {
    var d : any[] = [];
    this.dt.getRevenueDs(0).subscribe((res:any[])=>{
      this.dt0 = res;
      d.push(this.dt0);
      this.dt.getRevenueDs(1).subscribe((res:any[])=>{
        this.dt1 = res;
        d.push(this.dt1);
        this.dt.getRevenueDs(2).subscribe((res:any[])=>{
          this.dt2 = res;
          d.push(this.dt2);
          this.dt.getRevenueDs(3).subscribe((res:any[])=>{
            this.dt3 = res;
            d.push(this.dt3);
            this.dt.getRevenueDs(4).subscribe((res:any[])=>{
              this.dt4 = res;
              d.push(this.dt4);
              //console.log(d);
              this.we = d;
              //console.log(this.we);
            });
          });
        });
      });
    });
    
  }
  onSelects(data:any){
    console.log('Item clicked', JSON.parse(JSON.stringify(data)));
  }
  //Visualization

  view:[number,number] = [700, 400];
  Legend : string = 'Nhà sản xuất';

  showXAxis = false;
  showYAxis = true;
  gradient = true;
  showLegend = true;
  showXAxisLabel = true;
  xAxisLabel = 'Loại sản phẩm';
  showYAxisLabel = true;
  yAxisLabel = 'Doanh thu';
  xAxisTickFormattingFn = true;
  yAxisTickFormattingFn = false;
  
  timeline: boolean = true;
  xAxis2: boolean = true;
  yAxis2: boolean = true;
  legend: boolean = true;
  showYAxisLabel2: boolean = true;
  showXAxisLabel2: boolean = true;
  xAxisLabel2: string = 'Month';
  yAxisLabel2: string = 'Doanh thu';
  onSelect(data:any){
    //console.log('Item clicked', data);
  }
  
  formatDataLabel(n:any, separate = ",") {
    var s = n.toString();
    var len = s.length;
    var ret = "";
    for(var i = 1; i <= len; i++) {
    ret = s[(len-i)] + ret;
    if( i % 3  === 0 && i < len) {
      ret = separate + ret;
    }
  }
  return ret + ' VNĐ';
 }

 //Line charts
 multis:any[] = [];
 //Line charts revenue
 weare:Revenue[] = [];
 getRevenueCr()
  {
    var d : any[] = [];
    this.dt.getRevenueCs().subscribe((res:any[])=>{
      d.push(res);
      this.weare = d;
      console.log(this.weare);
    })
  }
  

  legend3: boolean = true;
  showLabels: boolean = true;
  animations: boolean = true;
  xAxis3: boolean = true;
  yAxis3: boolean = true;
  showYAxisLabel3: boolean = true;
  showXAxisLabel3: boolean = true;
  xAxisLabel3: string = 'Tháng';
  yAxisLabel3: string = 'Doanh thu';
  timeline3: boolean = true;

  Legend2 : string = 'Loại sản phẩm';
  Legend3 : string = '';
}
