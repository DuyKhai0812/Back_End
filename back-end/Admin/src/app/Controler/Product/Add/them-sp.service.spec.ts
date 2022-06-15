import { TestBed } from '@angular/core/testing';

import { ThemSpService } from './them-sp.service';

describe('ThemSpService', () => {
  let service: ThemSpService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(ThemSpService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
