import { Component } from '@angular/core';
import { RouterLink, RouterOutlet } from '@angular/router';
import { SidebarOrgComponent } from '../../template/sidebar-org/sidebar-org.component';

@Component({
  selector: 'app-dashboard-org',
  standalone: true,
  imports: [RouterLink, RouterOutlet, SidebarOrgComponent],
  templateUrl: './dashboard-org.component.html',
  styleUrl: './dashboard-org.component.css',
})
export class DashboardOrgComponent {}
