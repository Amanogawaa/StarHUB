import { Component } from '@angular/core';
import { RouterLink, RouterLinkActive, RouterOutlet } from '@angular/router';

@Component({
  selector: 'app-organizer-sidebar',
  standalone: true,
  imports: [RouterLink, RouterOutlet, RouterLinkActive],
  templateUrl: './organizer-sidebar.component.html',
  styleUrl: './organizer-sidebar.component.css',
})
export class OrganizerSidebarComponent {}
