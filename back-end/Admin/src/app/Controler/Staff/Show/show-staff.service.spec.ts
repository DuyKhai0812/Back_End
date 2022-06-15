import { TestBed } from '@angular/core/testing';

import { ShowStaffService } from './show-staff.service';

describe('ShowStaffService', () => {
  let service: ShowStaffService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ShowStaffService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
