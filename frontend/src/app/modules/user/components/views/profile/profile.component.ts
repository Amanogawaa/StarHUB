import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { SidebarComponent } from '../../template/sidebar/sidebar.component';
import { Students } from './students';

@Component({
  selector: 'app-profile',
  standalone: true,
  imports: [RouterOutlet, SidebarComponent],
  templateUrl: './profile.component.html',
  styleUrl: './profile.component.css',
})
export class ProfileComponent {
  students: Students = {
    name: 'Greg',
    studentNumber: 20221234,
    course: 'BSCS',
    email: '20221234@gordoncollege.edu.ph',
  };

  onFileSelect(event: any) {
    event.target.files[0];
  }
}
