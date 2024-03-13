import { Component } from '@angular/core';
import { RouterLink, RouterOutlet } from '@angular/router';
import { OrganizerSidebarComponent } from '../../template/organizer-sidebar/organizer-sidebar.component';

@Component({
  selector: 'app-organizer-events',
  standalone: true,
  imports: [RouterLink, RouterOutlet, OrganizerSidebarComponent],
  templateUrl: './organizer-events.component.html',
  styleUrl: './organizer-events.component.css',
})
export class OrganizerEventsComponent {}
