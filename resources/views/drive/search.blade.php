@extends('layouts.app-main')

@section('content')
    <div class="container" id="main-content">
        <div class="row mb-2">
            <div class="col-12">
                <h5 class="float-start">My Drive</h5>
                <div class="float-end btn-group shadow-btn float-end">
                    <button class="btn btn-light btn-sm new-directory"><i class="bi bi-folder-plus text-warning "></i> New</button>
                </div>
                <div class="row g-4 float-end me-1">
                    <div class="col">
                        <div class="input-group">
                            <form method="GET" id="category_search" action="{{ route('drive.search') }}">
                                <input type="text" class="form-control form-control-sm" name="search">
                            </form>
                            <button class="btn btn-sm btn-outline-secondary" type="submit" form="category_search"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="content">
            <div class="box w-100 mb-4">
                @foreach ($categories as $category)
                    <x-folder-row
                        name="{{ $category->name }}"
                        size="200 Kb"
                        author="Saya"
                        lastDate="2022-02-11"
                        dataId="1"
                        dataLink="http://localhost:8000/file/1/Panduan Penggunaan Aplikasi HRIS"
                    ></x-folder-row>
                @endforeach
            </div>
            {{ $categories->links() }}
        </div>

        <x-form-modal
            idModal="mc_category"
            idForm="form_create_category"
            action="{{ route('category') }}"
            method="POST"
            modalTitle="Create Category"
        >
           <input class="form-control" name="category" id="category" />
        </x-form-modal>
    </div>
@endsection
@section("script")
    <script>
        $(function() {
            Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
            /**
             * defined modal create category
             */
            var createDirModal = new bootstrap.Modal(document.getElementById('mc_category'), {
                keyboard: false
            });
            /**
             * show modal create category
             */
            $('.new-directory').on('click', function() {
                createDirModal.show();
            });

            /**
             * submit create category
             */
            $('#form_create_category').on('submit', function (event) {
                event.preventDefault();
                const data = $(this).serialize()
                const route = $(this).attr('action')
                $.ajax({
                    type: "POST",
                    url: route,
                    data: data
                }).done(function (response) {
                    Toast.fire({
                        icon: 'success',
                        title: response
                    });
                    createDirModal.hide();
                }).fail(function (response) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Error'
                    });
                });
            })
        });
    </script>
@endsection
