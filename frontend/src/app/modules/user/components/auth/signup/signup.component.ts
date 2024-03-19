import { Component } from '@angular/core';
import { FormBuilder, ReactiveFormsModule, Validators } from '@angular/forms';
import { Router, RouterLink } from '@angular/router';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-signup',
  standalone: true,
  imports: [ReactiveFormsModule, CommonModule, RouterLink],
  templateUrl: './signup.component.html',
  styleUrl: './signup.component.css',
})
export class SignupComponent {
  constructor(private formb: FormBuilder, private router: Router) {}

  registrationfail = false;

  registerForm = this.formb.group({
    firstName: this.formb.control('', Validators.required),
    lastName: this.formb.control('', Validators.required),
    course: this.formb.control('', Validators.required),
    email: this.formb.control('', [Validators.email, Validators.required]),
    password: this.formb.control('', [
      Validators.maxLength(8),
      Validators.required,
    ]),
    confirm_password: this.formb.control('', [
      Validators.maxLength(8),
      Validators.required,
    ]),
  });
}
