@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3 vertical-center">
            <img class="mb-3" src="{{ asset('images/doc-logo.png') }}" width="70%" />
            <div class="login p-2">
                <div class="mt-2 text-white">
                    <h2 style="font-size: 1rem">Login</h2>
                </div>
                <div class="col-md-12 p-4 border-top-white">
                    @if($errors->count() > 0)
                        <div class="text-white text-center mb-4">
                            {{ $errors->first('not_match') }}
                        </div>
                    @endif
                    <form method="post" action="{{ route('login') }}" id="formLogin">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="email" class="form-label text-white">Email address</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                    <div class="text-white" id="feedbackEmail">
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
                                    <label for="password" class="form-label text-white">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                    <div class="text-white" id="feedbackPassword">
                                        @if($errors->count() > 0)
                                            {{ $errors->first('password') }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3 d-grid">
                                    <button class="btn btn-primary text-white">Login</button>
                                </div>
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
