import { CommonModule } from '@angular/common';
import { AfterViewInit, Component, OnInit } from '@angular/core';
import { RouterLink, RouterLinkActive, RouterOutlet } from '@angular/router';
import { initFlowbite } from 'flowbite';

@Component({
  selector: 'app-user-sidebar',
  standalone: true,
  imports: [RouterLink, CommonModule, RouterOutlet, RouterLinkActive],
  templateUrl: './user-sidebar.component.html',
  styleUrl: './user-sidebar.component.scss',
})
export class UserSidebarComponent implements OnInit, AfterViewInit {
  ngOnInit(): void {}

  ngAfterViewInit(): void {
    initFlowbite();
  }
}
