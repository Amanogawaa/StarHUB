import { Routes } from '@angular/router';
import { LoginComponent } from './modules/user/components/auth/login/login.component';
import { SignupComponent } from './modules/user/components/auth/signup/signup.component';
import { UserSidebarComponent } from './shared/components/user-sidebar/user-sidebar.component';
import { DashboardComponent } from './modules/user/components/layout/dashboard/dashboard.component';
import { EventsComponent } from './modules/user/components/layout/events/events.component';
import { UserComponent } from './modules/user/components/layout/user/user.component';
import { AttendanceComponent } from './modules/user/components/layout/attendance/attendance.component';
import { FeedbackComponent } from './modules/user/components/layout/feedback/feedback.component';

export const routes: Routes = [
  {
    path: '',
    redirectTo: 'login',
    pathMatch: 'full',
  },

  {
    path: 'login',
    component: LoginComponent,
  },

  {
    path: 'signup',
    component: SignupComponent,
  },

  {
    path: 'sidebar',
    component: UserSidebarComponent,
  },

  {
    path: 'user/dashboard',
    component: DashboardComponent,
  },

  {
    path: 'user/events',
    component: EventsComponent,
  },

  {
    path: 'user/profile',
    component: UserComponent,
  },

  {
    path: 'user/attendance',
    component: AttendanceComponent,
  },

  {
    path: 'user/feedback',
    component: FeedbackComponent,
  },
];
