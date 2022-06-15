import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AccountStaffComponent } from './account-staff.component';

describe('AccountStaffComponent', () => {
  let component: AccountStaffComponent;
  let fixture: ComponentFixture<AccountStaffComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AccountStaffComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(AccountStaffComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
