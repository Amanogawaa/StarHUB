import { Routes } from '@angular/router';
import { LoginComponent } from './modules/user/components/login/login.component';
import { SignupComponent } from './modules/user/components/signup/signup.component';

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
];
