import { Component,ChangeDetectorRef, AfterViewInit } from '@angular/core';
import { Router, NavigationStart } from '@angular/router';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Admin';
  showHead = false;
  constructor(private router: Router,private cdr: ChangeDetectorRef) {
    // Nếu như vào login thì đóng menu and footer đi
      router.events.forEach((event) => {
        if (event instanceof NavigationStart) {
          if (event['url'] == '/') {
            this.showHead = false;
          } else {
            // console.log("NU")
            this.showHead = true;
          }
        }
      });
    }
    message: string = 'loading :(';
    ngAfterViewInit() {
      this.message = 'all done loading :)'
      this.cdr.detectChanges();
    }
}
