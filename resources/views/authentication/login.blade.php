@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-3 vertical-center">
            <div class="text-center">
                <img class="mb-5" src="{{ asset('images/logo-doc3.svg') }}" width="30%" />
            </div>
            <div class="login ps-3 pe-3 pb-3 pt-2 bg-light">
                <div class="mt-2">
                    <h2 style="font-size: 1.5rem" class="fw-bold">Sign in Here</h2>
                </div>
                <div class="col-md-12 p-3 border-top-white">
                    @if($errors->count() > 0)
                        <div class=" text-center mb-4">
                            {{ $errors->first('not_match') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('login') }}" id="formLogin">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                    <div class="" id="feedbackEmail">
                                        @if($errors->count() > 0)
                                            {{ $errors->first('email') }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                    <div class="" id="feedbackPassword">
                                        @if($errors->count() > 0)
                                            {{ $errors->first('password') }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <div class="mb-3 d-grid">
                                    <button class="btn text-white pt-2 pb-2 fw-bold bg-navy">Login</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 text-center">
                            <div class="col">
                               Don't have an account? <a href="{{ route('register') }}"  class="text-primary">Register Now</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            &copy; Dokumentasi {{ date('Y') }}
        </div>
    </div>
<div class="container">
@endsection
@section("script")
    <script>

    </script>
@endsection
