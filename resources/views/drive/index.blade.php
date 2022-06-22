@extends('layouts.app-main')

@section('content')
    <div class="container" id="main-content">
        <div class="row mb-2">
            <div class="col-12">
                <h5 class="float-start">My Drive</h5>
                <div class="float-end">
                    <div class="btn-group shadow-btn float-end">
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
        </div>
        <div id="content">
            <div class="box w-100 mb-4">
                @foreach ($categories as $category)
                    <x-folder-row
                        name="{{ $category->name }}"
                        size="200 Kb"
                        author="Saya"
                        lastDate="{{ date('Y-m-d',strtotime($category->created_at)) }}"
                        dataId="{{ $category->id }}"
                        dataLink="http://localhost:8000/file/1/Panduan Penggunaan Aplikasi HRIS"
                        actionClass="category"
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
            modalTitle="Create Category">
           <input class="form-control" name="category" id="category" />
        </x-form-modal>

        <x-confirm
            modalId="confirm_del_category"
            btnId="delete_category"
            message="Are you sure ?, the file will also be deleted">
        </x-confirm>

        <x-form-modal
            idModal="mc_rename_category"
            idForm="form_rename_category"
            action=""
            method="PUT"
            modalTitle="Rename Category">
            <input class="form-control" name="name" id="name" />
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
             *
             */
            var createDirModal = new bootstrap.Modal(document.getElementById('mc_category'), {
                keyboard: false
            });

            /**
             * defined modal delete confirmation
             *
             */
            var deleteConfirmModal = new bootstrap.Modal(document.getElementById('confirm_del_category'), {
                keyboard: false
            });

            /**
             * defined modal rename category
             *
             */
            var renameModal = new bootstrap.Modal(document.getElementById('mc_rename_category'), {
                keyboard: false
            });

            /**
             * show modal create category
             *
             */
            $('.new-directory').on('click', function(event) {
                createDirModal.show();
            });

            /**
             * show modal rename
             *
             */
            $('.rename-category').on('click', function(event) {
                const id = $(this).attr("dataid");
                let url = '{{ route("category.edit", ":id") }}';
                url = url.replace(':id',id);
                let urlRename = '{{ route("category.rename", ":id") }}';
                urlRename = urlRename.replace(':id',id);
                $.ajax({
                    type: "GET",
                    url: url,
                    data: {}
                }).done(function (res) {
                    $('#form_rename_category').attr('action',urlRename);
                    $('#name').val(res.name);
                    renameModal.show();
                }).fail(function (res) {
                    Toast.fire({
                        icon: 'error',
                        title: res
                    });
                });

            })

            /**
             * rename submit
             *
             */
            $('#form_rename_category').on('submit', function (event) {
                event.preventDefault();
                const data = $(this).serialize();
                const url = $(this).attr('action');
                $.ajax({
                    type: "PUT",
                    url: url,
                    data: data,
                }).done(function (res) {
                    Toast.fire({
                        icon: 'success',
                        title: res
                    });
                    location.reload();
                }).fail(function (res) {
                    Toast.fire({
                        icon: 'error',
                        title: res
                    });
                });
            })

            /**
             * submit create category
             *
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
            });

            /**
             * delete category
             *
             */
            $('.delete-category').on('click', function (event) {
                const id = $(this).attr('dataid');
                let url = "{{ route('category.delete', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: {},
                }).done(function (res) {
                    Toast.fire({
                        icon: 'success',
                        title: res
                    });
                    location.reload();
                }).fail(function (res) {
                    Toast.fire({
                        icon: 'error',
                        title: res
                    });
                });
            })
        });
    </script>
@endsection
