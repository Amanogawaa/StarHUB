import { Routes } from '@angular/router';
import { LoginComponent } from './modules/user-module/components/auth/login/login.component';
import { SignupComponent } from './modules/user-module/components/auth/signup/signup.component';
import { DashboardComponent } from './modules/user-module/components/views/dashboard/dashboard.component';
import { ProfileComponent } from './modules/user-module/components/views/profile/profile.component';
import { EventsComponent } from './modules/user-module/components/views/events/events.component';
import { AttendanceComponent } from './modules/user-module/components/views/attendance/attendance.component';
import { FeedbackComponent } from './modules/user-module/components/views/feedback/feedback.component';
import { EventsOrgComponent } from './modules/organizer-module/components/views/events-org/events-org.component';
import { DashboardOrgComponent } from './modules/organizer-module/components/views/dashboard-org/dashboard-org.component';

export const routes: Routes = [
  { path: '', redirectTo: '/login', pathMatch: 'full' },
  { path: 'login', component: LoginComponent },
  { path: 'signup', component: SignupComponent },
  { path: 'dashboard', component: DashboardComponent },
  { path: 'profile', component: ProfileComponent },
  { path: 'events', component: EventsComponent },
  { path: 'attendance', component: AttendanceComponent },
  { path: 'feedback', component: FeedbackComponent },
  { path: 'organizer/events', component: EventsOrgComponent },
  { path: 'organizer/dashboard', component: DashboardOrgComponent },
];
