import { TestBed } from '@angular/core/testing';

import { ProducterService } from './producter.service';

describe('ProducterService', () => {
  let service: ProducterService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ProducterService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
