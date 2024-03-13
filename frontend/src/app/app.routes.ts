import { Routes } from '@angular/router';

import { LoginComponent } from './modules/user/components/auth/login/login.component';
import { SignupComponent } from './modules/user/components/auth/signup/signup.component';
import { DashboardComponent } from './modules/user/components/views/dashboard/dashboard.component';
import { ProfileComponent } from './modules/user/components/views/profile/profile.component';
import { EventsComponent } from './modules/user/components/views/events/events.component';
import { AttendanceComponent } from './modules/user/components/views/attendance/attendance.component';
import { FeedbackComponent } from './modules/user/components/views/feedback/feedback.component';
import { OrganizerDashboardComponent } from './modules/organizer/components/views/organizer-dashboard/organizer-dashboard.component';
import { OrganizerLoginComponent } from './modules/organizer/components/auth/organizer-login/organizer-login.component';
import { OrganizerSignupComponent } from './modules/organizer/components/auth/organizer-signup/organizer-signup.component';
import { OrganizerEventsComponent } from './modules/organizer/components/views/organizer-events/organizer-events.component';

export const routes: Routes = [
  { path: '', redirectTo: '/login', pathMatch: 'full' },
  { path: 'login', component: LoginComponent },
  { path: 'signup', component: SignupComponent },
  { path: 'dashboard', component: DashboardComponent },
  { path: 'profile', component: ProfileComponent },
  { path: 'events', component: EventsComponent },
  { path: 'attendance', component: AttendanceComponent },
  { path: 'feedback', component: FeedbackComponent },
  { path: 'organizer/dashboard', component: OrganizerDashboardComponent },
  { path: 'organizer/login', component: OrganizerLoginComponent },
  { path: 'organizer/signup', component: OrganizerSignupComponent },
  { path: 'organizer/events', component: OrganizerEventsComponent },
];
