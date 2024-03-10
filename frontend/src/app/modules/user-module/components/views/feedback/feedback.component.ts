import { Component } from '@angular/core';
import { SidebarComponent } from '../../template/sidebar/sidebar.component';
import { RouterLink, RouterOutlet } from '@angular/router';

@Component({
  selector: 'app-feedback',
  standalone: true,
  imports: [SidebarComponent, RouterOutlet, RouterLink],
  templateUrl: './feedback.component.html',
  styleUrl: './feedback.component.css',
})
export class FeedbackComponent {}
