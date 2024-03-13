import { Component } from '@angular/core';
import { RouterLink, RouterOutlet } from '@angular/router';
import { OrganizerSidebarComponent } from '../../template/organizer-sidebar/organizer-sidebar.component';
import { Events } from '../organizer-dashboard/events';
import { NgFor, NgIf } from '@angular/common';

@Component({
  selector: 'app-organizer-events',
  standalone: true,
  imports: [RouterLink, RouterOutlet, OrganizerSidebarComponent, NgFor, NgIf],
  templateUrl: './organizer-events.component.html',
  styleUrl: './organizer-events.component.css',
})
export class OrganizerEventsComponent {
  events: Events = {
    eventName: 'Broken Covenant Riven Release!',
    eventDate: 'March 9, 2023',
    eventDesc:
      'New skinline, Broken Covenant is no available for purchase in league of legends store! This batch of skins features a Legendary skin for Riven, a Prestige skin for Miss Fortune as well as a full set of Epic skins! All non-prestige skins are sold separately or as a bundle with border & Icon! All chomas can also be bought together or separate!',
  };

  event_list: Events[] = [
    {
      eventName: 'Hello World',
      eventDate: 'March 9, 2023',
      eventDesc:
        'New skinline, Broken Covenant is no available for purchase in league of legends store! This batch of skins features a Legendary skin for Riven, a Prestige skin for Miss Fortune as well as a full set of Epic skins! All non-prestige skins are sold separately or as a bundle with border & Icon! All chomas can also be bought together or separate!',
    },
    {
      eventName: 'Broken Covenant Riven Release!',
      eventDate: 'March 10, 2023',
      eventDesc:
        'New skinline, Broken Covenant is no available for purchase in league of legends store! This batch of skins features a Legendary skin for Riven, a Prestige skin for Miss Fortune as well as a full set of Epic skins! All non-prestige skins are sold separately or as a bundle with border & Icon! All chomas can also be bought together or separate!',
    },
    {
      eventName: 'Broken Covenant Riven Release!',
      eventDate: 'March 11, 2023',
      eventDesc:
        'New skinline, Broken Covenant is no available for purchase in league of legends store! This batch of skins features a Legendary skin for Riven, a Prestige skin for Miss Fortune as well as a full set of Epic skins! All non-prestige skins are sold separately or as a bundle with border & Icon! All chomas can also be bought together or separate!',
    },
    {
      eventName: 'Broken Covenant Riven Release!',
      eventDate: 'March 11, 2023',
      eventDesc:
        'New skinline, Broken Covenant is no available for purchase in league of legends store! This batch of skins features a Legendary skin for Riven, a Prestige skin for Miss Fortune as well as a full set of Epic skins! All non-prestige skins are sold separately or as a bundle with border & Icon! All chomas can also be bought together or separate!',
    },
  ];
}
