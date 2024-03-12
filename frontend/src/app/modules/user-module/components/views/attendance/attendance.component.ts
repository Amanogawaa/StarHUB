import { Component } from '@angular/core';
import { RouterLink, RouterOutlet } from '@angular/router';
import { SidebarComponent } from '../../template/sidebar/sidebar.component';

@Component({
  selector: 'app-attendance',
  standalone: true,
  imports: [RouterOutlet, SidebarComponent, RouterLink],
  templateUrl: './attendance.component.html',
  styleUrl: './attendance.component.css',
})
export class AttendanceComponent {}
