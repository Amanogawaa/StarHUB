import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { UserSidebarComponent } from '../../../../../shared/components/user-sidebar/user-sidebar.component';

@Component({
  selector: 'app-feedback',
  standalone: true,
  imports: [CommonModule, RouterOutlet, UserSidebarComponent],
  templateUrl: './feedback.component.html',
  styleUrl: './feedback.component.scss',
})
export class FeedbackComponent {}
