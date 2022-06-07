@extends("layouts.app")

@section("content")
    <div class="row justify-content-center">
        <div class="col-md-4 p-0 m-0">
            <div class="d-md-flex justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center p4 sm:pt-0">
                <div class="row w-100 ms-0 me-0 ps-0 pe-0" style="border: 1px solid black;">
                    <div class="mt-2">
                        <h3>Register</h3>
                    </div>
                    <div class="col-md-12 p-4">
                        <form method="post" action="{{ route('register') }}" id="formRegister">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Al afghani">
                                        <div class="was-validated invalid-feedback" id="feedbackName">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                                        <div class="was-validated invalid-feedback" id="feedbackEmail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password">
                                        <div class="was-validated invalid-feedback" id="feedbackPassword">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="re_password" class="form-label">Re Password</label>
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
            </div>
        </div>
    </div>
    <x-alert id="regisSuccAlert" class="" message="Registrasi berhasil dilakukan!, Silahkan cek email untuk verifikasi email" title="Pemberitahuan">

    </x-alert>
@endsection
@section("script")
    <script src="{{ asset('customjs/register.js') }}"></script>
    <script>
    </script>
@endsection
