import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ScrappersComponent } from './scrappers.component';

describe('ScrappersComponent', () => {
  let component: ScrappersComponent;
  let fixture: ComponentFixture<ScrappersComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ScrappersComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ScrappersComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
