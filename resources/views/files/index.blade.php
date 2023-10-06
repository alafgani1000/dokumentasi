@extends('layouts.app-main')

@section('content')
    <div class="container" id="main-content">
        <div class="row mb-2">
            <div class="col-12">
                <h5 class="float-start"><i class="bi bi-folder-fill text-primary me-2"></i>{{ $category->name }}</h5>
                <div class="float-end">
                    <div class="btn-group shadow-btn float-end">
                        <button class="btn btn-primary btn-sm new-file fw-bold"><i class="bi bi-upload fw-bold me-1"></i></i> Upload</button>
                    </div>

                    <div class="row g-4 float-end me-1">
                        <div class="col">
                            <div class="input-group">
                                <form method="GET" id="file_search" action="{{ route('file', [$category->id, $category->name]) }}">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control form-control-sm" name="search" value="{{ $search }}">
                                        <button class="btn btn-sm btn-secondary" type="submit"><i class="bi bi-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="content">
            <div class="box w-100">
                @foreach ($files as $item)
                    <x-file-row
                        actionClass="file"
                        dataId="{{ $item->id }}"
                        icon="bi-file-pdf-fill text-danger"
                        linkRead="{{ route('file.read', [$item->id, $item->file_name]) }}"
                        name="{{ $item->file_name }}"
                        size="{{ $item->display_size }}"
                        author="{{ $item->display_author }}"
                        createDate="{{ $item->created_at }}"
                        dataShare="test"
                        dataDelete="{{ route('file.delete', $item->id) }}"
                    >
                    </x-file-row>
                @endforeach
                {{ $files->links() }}
            </div>
        </div>
        <x-form-modal
            idModal="mc_file"
            idForm="form_upload_file"
            action="{{ route('file.upload') }}"
            method="POST"
            modalTitle="Upload File">
        <label class="form-label">File (* Pdf file only</label>
        <input type="hidden" name="category", id="category" value="{{ $category->id }}" />
        <input type="file" class="form-control" name="document" id="document" />
        </x-form-modal>
    </div>
@endsection
@section("script")
     <script src="{{ asset('js/file.js') }}"></script>
@endsection

