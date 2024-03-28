import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { UserSidebarComponent } from '../../../../../shared/components/user-sidebar/user-sidebar.component';

@Component({
  selector: 'app-attendance',
  standalone: true,
  imports: [CommonModule, RouterOutlet, UserSidebarComponent],
  templateUrl: './attendance.component.html',
  styleUrl: './attendance.component.scss',
})
export class AttendanceComponent {}
