import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EventsOrgComponent } from './events-org.component';

describe('EventsOrgComponent', () => {
  let component: EventsOrgComponent;
  let fixture: ComponentFixture<EventsOrgComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [EventsOrgComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(EventsOrgComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
