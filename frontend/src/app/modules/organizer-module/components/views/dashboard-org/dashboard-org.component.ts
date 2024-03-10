import { Component } from '@angular/core';
import { RouterLink, RouterOutlet } from '@angular/router';
import { SidebarOrgComponent } from '../../template/sidebar-org/sidebar-org.component';
import { Events } from './events';

@Component({
  selector: 'app-dashboard-org',
  standalone: true,
  imports: [RouterLink, RouterOutlet, SidebarOrgComponent],
  templateUrl: './dashboard-org.component.html',
  styleUrl: './dashboard-org.component.css',
})
export class DashboardOrgComponent {
  events: Events = {
    eventName: 'Broken Covenant Riven Release!',
    eventDate: 'March 9, 2023',
    eventDesc:
      'New skinline, Broken Covenant is no available for purchase in league of legends store! This batch of skins features a Legendary skin for Riven, a Prestige skin for Miss Fortune as well as a full set of Epic skins! All non-prestige skins are sold separately or as a bundle with border & Icon! All chomas can also be bought together or separate!',
  };
}
