import { TestBed } from '@angular/core/testing';

import { ShowDtService } from './show-dt.service';

describe('ShowDtService', () => {
  let service: ShowDtService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ShowDtService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
