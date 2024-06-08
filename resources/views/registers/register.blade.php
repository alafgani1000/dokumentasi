@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="text-center">
                    <img class="register-logo" src="{{ asset('images/logo-doc3.svg') }}" width="25%" />
                </div>
                <div class="register mt-4 shadow-lg">
                    <div class="ms-3 mt-1 text-navy">
                        <h3>Register</h3>
                    </div>
                    <div class="col-md-12 p-4">
                        <form method="post" action="{{ route('register') }}" id="formRegister">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="name" class="form-label text-navy">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Al afghani">
                                        <div class="was-validated invalid-feedback" id="feedbackName">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="email" class="form-label text-navy">Email address</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                                        <div class="was-validated invalid-feedback" id="feedbackEmail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="password" class="form-label text-navy">Password</label>
                                        <input type="password" name="password" class="form-control" id="password">
                                        <div class="was-validated invalid-feedback" id="feedbackPassword">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="re_password" class="form-label text-navy">Re Password</label>
                                        <input type="password" name="re_password" class="form-control" id="re_password">
                                        <div class="was-validated invalid-feedback" id="feedbackRepassword">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3 d-grid">
                                        <button class="btn bg-navy text-white fw-bold">Register</button>
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
