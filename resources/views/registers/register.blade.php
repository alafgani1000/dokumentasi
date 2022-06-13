@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <img class="register-logo" src="{{ asset('images/doc-logo.png') }}" width="70%" />
                <div class="register">
                    <div class="ms-2 text-white">
                        <h3>Register</h3>
                    </div>
                    <div class="col-md-12 p-4 border-top-register">
                        <form method="post" action="{{ route('register') }}" id="formRegister">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="name" class="form-label text-white">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Al afghani">
                                        <div class="was-validated invalid-feedback" id="feedbackName">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="email" class="form-label text-white">Email address</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                                        <div class="was-validated invalid-feedback" id="feedbackEmail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="password" class="form-label text-white">Password</label>
                                        <input type="password" name="password" class="form-control" id="password">
                                        <div class="was-validated invalid-feedback" id="feedbackPassword">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="re_password" class="form-label text-white">Re Password</label>
                                        <input type="password" name="re_password" class="form-control" id="re_password">
                                        <div class="was-validated invalid-feedback" id="feedbackRepassword">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 d-grid">
                                        <button class="btn btn-primary">Register</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-2">
                    &copy; {{ config('app.name', 'Laravel') }} {{ date('Y') }}
                </div>
            </div>
        </div>
    </div>

    <div class="footer mt-4" width="100%">

    </div>

    <x-alert id="regisSuccAlert" class="" message="Registrasi berhasil dilakukan!, Silahkan cek email untuk verifikasi email" title="Pemberitahuan">

    </x-alert>
@endsection
@section("script")
    <script src="{{ asset('customjs/register.js') }}"></script>
    <script>
    </script>
@endsection
