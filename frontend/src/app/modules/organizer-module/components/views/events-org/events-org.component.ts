import { Component } from '@angular/core';
import { RouterLink, RouterOutlet } from '@angular/router';
import { SidebarOrgComponent } from '../../template/sidebar-org/sidebar-org.component';

@Component({
  selector: 'app-events-org',
  standalone: true,
  imports: [RouterLink, RouterOutlet, SidebarOrgComponent],
  templateUrl: './events-org.component.html',
  styleUrl: './events-org.component.css',
})
export class EventsOrgComponent {}
