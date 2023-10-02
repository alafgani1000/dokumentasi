@extends('layouts.app-main')

@section('content')
    <div class="container" id="main-content">
        <div class="row mb-2">
            <div class="col-12">
                <h5 class="float-start"><i class="bi bi-folder-fill text-info me-2"></i>{{ $category->name }}</h5>
                <div class="float-end">
                    <div class="btn-group shadow-btn float-end">
                        <button class="btn btn-primary btn-sm new-file fw-bold"><i class="bi bi-upload fw-bold me-1"></i></i> Upload</button>
                    </div>

                    <div class="row g-4 float-end me-1">
                        <div class="col">
                            <div class="input-group">
                                <form method="GET" id="category_search" action="{{ route('drive.search') }}">
                                    <input type="text" class="form-control form-control-sm" name="search">
                                </form>
                                <button class="btn btn-sm btn-primary" type="submit" form="category_search"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="content">
            <div class="box w-100">
                @foreach ($files as $item)
                    <div class="row box-row">
                        <div class="col-3 name-file">
                            <i class="bi bi-three-dots me-2" data-bs-toggle="dropdown"></i>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square text-primary me-2"></i>Rename</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-share text-success me-2"></i></i>Share</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-trash3 text-danger me-2"></i>Delete</a></li>
                            </ul>
                            <i class="bi bi-file-pdf-fill text-danger"></i>{{ $item->file_name }}</div>
                        <div class="col-3 size">{{ $item->display_size }}</div>
                        <div class="col-3 author">{{ $item->display_author  }}</div>
                        <div class="col-3 last-date">{{ $item->created_at }}</div>
                    </div>
                @endforeach
            </div>
        </div>
        <x-form-modal
            idModal="mc_file"
            idForm="form_upload_file"
            action="{{ route('file.upload') }}"
            method="POST"
            modalTitle="Upload File">
        <input type="hidden" name="category", id="category" value="{{ $category->id }}" />
        <input type="file" class="form-control" name="document" id="document" />
        </x-form-modal>
    </div>
@endsection
@section("script")
     <script src="{{ asset('js/file.js') }}"></script>
@endsection

