import { TestBed } from '@angular/core/testing';

import { ShowNoitceService } from './show-noitce.service';

describe('ShowNoitceService', () => {
  let service: ShowNoitceService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ShowNoitceService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
