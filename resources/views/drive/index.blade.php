@extends('layouts.app-main')

@section('content')
    <div class="container" id="main-content">
        <div class="row mb-2">
            <div class="col-12">
                <h5 class="float-start">My Drive</h5>
                <div class="float-end">
                    <div class="btn-group shadow-btn float-end">
                        <button class="btn btn-primary btn-sm new-directory text-white"><i class="bi bi-folder-plus text-white me-1 fw-bold"></i> New</button>
                    </div>

                    <div class="row g-4 float-end me-1">
                        <div class="col">
                            <div class="input-group">
                                <form method="GET" id="category_search" action="{{ route('drive.search') }}">
                                    <input type="text" class="form-control form-control-sm" name="search">
                                </form>
                                <button class="btn btn-sm btn-secondary" type="submit" form="category_search"><i class="bi bi-search"></i></button>
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
                        size="{{ $category->files()->count() }}"
                        author="{{ $category->user->name }}"
                        lastDate="{{ date('Y-m-d',strtotime($category->created_at)) }}"
                        dataId="{{ $category->id }}"
                        dataLink="{{ route('file', [$category->id,$category->name]) }}"
                        actionClass="category"
                        dataEdit="{{ route('category.edit',$category->id) }}"
                        dataUpdate="{{ route('category.rename',$category->id) }}"
                        dataDelete="{{ route('category.delete',$category->id) }}"
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
     <script src="{{ asset('js/drive.js') }}"></script>
@endsection
