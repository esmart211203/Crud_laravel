@extends('../tainguyen')
<div class="container">
@if(!auth()->check())
chua dang nhap
@else
<a href="{{route('auth.logout')}}">logout</a>
@endif
<!-- Section: Design Block -->
    <section class="">
        <!-- Jumbotron -->
        <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
            <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="my-5 display-3 fw-bold ls-tight">
                        The best offer <br />
                        <span class="text-primary">for your business</span>
                    </h1>
                    <p style="color: hsl(217, 10%, 50.8%)">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Eveniet, itaque accusantium odio, soluta, corrupti aliquam
                        quibusdam tempora at cupiditate quis eum maiores libero
                        veritatis? Dicta facilis sint aliquid ipsum atque?
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card">
                        <div class="card-body py-5 px-md-5">
                        <form method="post" action="{{route('auth.custom.login')}}">
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="form3Example3"  name="email" class="form-control" />
                                <label class="form-label" for="form3Example3">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                @if(session('error'))
                                    <span style="color: red;">{{ session('error') }}</span>
                                @endif
                                <input type="password" name="password" id="form3Example4" class="form-control" />
                                <label class="form-label" for="form3Example4">Password</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-block mb-4">
                            Login
                            </button>
                        </form>
                        Ban chua co tai khoan <a href="{{route('auth.register')}}">Register</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
<!-- Section: Design Block -->
</div>