import { TestBed } from '@angular/core/testing';

import { ProductSPService } from './product-sp.service';

describe('ProductSPService', () => {
  let service: ProductSPService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ProductSPService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
