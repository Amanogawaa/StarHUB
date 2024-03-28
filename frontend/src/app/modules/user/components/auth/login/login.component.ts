import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormBuilder, ReactiveFormsModule, Validators } from '@angular/forms';
import { Router, RouterLink } from '@angular/router';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [ReactiveFormsModule, RouterLink, CommonModule],
  templateUrl: './login.component.html',
  styleUrl: './login.component.scss',
})
export class LoginComponent {
  constructor(private form: FormBuilder, private routes: Router) {}

  loginForm = this.form.group({
    email: this.form.control('', [Validators.email, Validators.required]),
    password: this.form.control('', Validators.required),
  });

  submitLogin() {
    console.log('login');
  }

  login() {
    this.routes.navigateByUrl('user/dashboard');
  }
}
