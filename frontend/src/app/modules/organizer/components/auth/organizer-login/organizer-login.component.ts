import { Component } from '@angular/core';
import { RouterLink, RouterOutlet } from '@angular/router';

@Component({
  selector: 'app-organizer-login',
  standalone: true,
  imports: [RouterLink, RouterOutlet],
  templateUrl: './organizer-login.component.html',
  styleUrl: './organizer-login.component.css',
})
export class OrganizerLoginComponent {}
