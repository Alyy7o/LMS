@extends('layout.header')
<!-- Preloader Start Here -->
<div id="preloader"></div>
    <!-- Preloader End Here -->
    <!-- Login Page Start Here -->

     <!-- Session Status -->
     <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="login-page-wrap">
        <div class="login-page-content">
            <div class="login-box">
                <div class="item-logo">
                    <img src="{{asset('assets/img/logo2.png')}}" alt="logo">
                </div>
                <form method="POST" action="{{ route('register') }}" class="login-form">
                    @csrf
                    
                    {{-- Name --}}
                    <div class="form-group">
                        <label>Username</label>
                        <!-- <input type="text" placeholder="Enter usrename" class="form-control"> -->
                        <x-text-input id="name" placeholder="Enter Username" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <i class="fas fa-user"></i>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    
                        {{-- Email --}}
                    <div class="form-group">
                        <label>Email</label>
                        <!-- <input type="text" placeholder="Enter usrename" class="form-control"> -->
                        <x-text-input id="email" placeholder="Enter Email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <i class="far fa-envelope"></i>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                        {{-- Password --}}
                    <div class="form-group">
                            <label>Password</label>
                            <!-- <input type="text" placeholder="Enter password" class="form-control"> -->
                        <x-text-input id="password"  placeholder="Enter Password" class="form-control"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        <i class="fas fa-lock"></i>
                    </div>

                        {{-- Confirm Password --}}
                    <div class="form-group">
                            <label>Confirm Password</label>
                            <!-- <input type="text" placeholder="Enter password" class="form-control"> -->
                        <x-text-input id="password_confirmation"  placeholder="Confirm Password" class="form-control"
                                type="password"
                                name="password_confirmation"
                                required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        <i class="fas fa-lock"></i>
                    </div>

                    <!-- Role -->
                    <div class="form-group">
                        <x-input-label for="role" :value="__('Role')" />

                        <x-text-input id="role" placeholder="Enter Role" class="form-control"
                        type="text"
                        name="role"
                        required />

                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                            <i class="fas fa-user-tag"></i>
                    </div>

                    
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
            
                        <button type="submit" class="btn btn-primary btn-lg ms-4">
                            {{ __('Register') }}
                        </button>
                    </div>

                </form>

                <div class="login-social">
                    <p>or sign up with</p>
                    <ul>
                        <li><a href="#" class="bg-fb"><i class="fab fa-facebook-f mt-3"></i></a></li>
                        <li><a href="#" class="bg-twitter"><i class="fab fa-twitter mt-3"></i></a></li>
                        <li><a href="#" class="bg-gplus"><i class="fab fa-google-plus-g mt-3"></i></a></li>
                        <li><a href="#" class="bg-git"><i class="fab fa-github mt-3"></i></a></li>
                    </ul>
                </div>
                
                  
            </div>
        </div>
    </div>
    <!-- Login Page End Here -->
@extends('layout.footer')