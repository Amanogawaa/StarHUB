import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SidebarOrgComponent } from './sidebar-org.component';

describe('SidebarOrgComponent', () => {
  let component: SidebarOrgComponent;
  let fixture: ComponentFixture<SidebarOrgComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [SidebarOrgComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(SidebarOrgComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
