import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AdminlandComponent } from './adminland.component';

describe('AdminlandComponent', () => {
  let component: AdminlandComponent;
  let fixture: ComponentFixture<AdminlandComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AdminlandComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AdminlandComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
