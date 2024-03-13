import { Component } from '@angular/core';
import { RouterLink, RouterOutlet } from '@angular/router';

@Component({
  selector: 'app-organizer-signup',
  standalone: true,
  imports: [RouterLink, RouterOutlet],
  templateUrl: './organizer-signup.component.html',
  styleUrl: './organizer-signup.component.css',
})
export class OrganizerSignupComponent {}
