import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormBuilder, ReactiveFormsModule, Validators } from '@angular/forms';
import { RouterLink } from '@angular/router';

@Component({
  selector: 'app-signup',
  standalone: true,
  imports: [CommonModule, RouterLink, ReactiveFormsModule],
  templateUrl: './signup.component.html',
  styleUrl: './signup.component.scss',
})
export class SignupComponent {
  constructor(private form: FormBuilder) {}

  signupForm = this.form.group({
    firstName: this.form.control('', Validators.required),
    lastName: this.form.control('', Validators.required),
    course: this.form.control('', Validators.required),
    email: this.form.control('', [Validators.email, Validators.required]),
    password: this.form.control('', [
      Validators.maxLength(8),
      Validators.required,
    ]),
    confirm_password: this.form.control('', [
      Validators.maxLength(8),
      Validators.required,
    ]),
  });
}
