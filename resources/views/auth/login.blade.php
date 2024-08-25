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
                <form method="POST" action="{{ route('login') }}" class="login-form">
                    @csrf
                    
                    @if (session('error'))
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                           <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                           {{ session('error') }}
                        </div>
                    @endif

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
                                required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        <i class="fas fa-lock"></i>
                    </div>
                    
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember-me">
                            <label for="remember-me" class="form-check-label me-5">{{ __('Remember Me') }}</label>
                            {{-- <span for="remember-me" class="form-check-label">{{ __('Remember me') }}</span> --}}
                            
                            <!-- <a href="#" class="forgot-btn">Forgot Password?</a> -->
                            
                            @if (Route::has('password.request'))
                            <a class="forgot-btn mx-5" href="{{ route('password.request') }}">
                                {{ __('Forgot Password?') }}
                            </a>
                            @endif
                        </div>
                        
                    </div>
                    <div class="form-group">
                            <x-primary-button class="login-btn">
                                {{ __('Log in') }}
                            </x-primary-button>
                    </div>

                    <!-- <div class="form-group">
                        <button type="submit" class="login-btn">Login</button>
                    </div> -->
                </form>

                <div class="login-social">
                    <p>or sign in with</p>
                    <ul>
                        <li><a href="#" class="bg-fb"><i class="fab fa-facebook-f mt-3"></i></a></li>
                        <li><a href="#" class="bg-twitter"><i class="fab fa-twitter mt-3"></i></a></li>
                        <li><a href="#" class="bg-gplus"><i class="fab fa-google-plus-g mt-3"></i></a></li>
                        <li><a href="#" class="bg-git"><i class="fab fa-github mt-3"></i></a></li>
                    </ul>
                </div>
                
                 {{-- <div class="sign-up">Don't have an account ? <a href="#">Signup now!</a></div> --}}
                <div class="form-group mt-4 d-flex align-items-center justify-content-around">
                    <div>Don't have an account ?</div> 

                    <div>

                            @if (Route::has('register'))
                            <a
                        href="{{ route('register') }}"
                        class="login-btn underline"
                        >
                        Signup now!
                        </a>
                        @endif
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <!-- Login Page End Here -->
@extends('layout.footer')