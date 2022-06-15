import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ProducterComponent } from './producter.component';

describe('ProducterComponent', () => {
  let component: ProducterComponent;
  let fixture: ComponentFixture<ProducterComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ProducterComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ProducterComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
