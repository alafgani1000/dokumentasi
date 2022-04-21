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
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Al afghani">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email" placeholder="name@example.com">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="re_password" class="form-label">Re Password</label>
                                    <input type="password" class="form-control" id="re_password">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
