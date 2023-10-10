@extends('layouts.app-main')

@section('content')
<div class="container" id="main-content">
    <h6>Recent Files</h6>
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
                dataShare="{{ route('file.create-link', $item->id) }}"
                dataDelete="{{ route('file.delete', $item->id) }}"
            >
            </x-file-row>
            @endforeach
        </div>
    </div>
    <h6 class="mt-4">Recent file link create</h6>
    <div id="content">
        <div class="box w-100">
            @foreach ($filelinks as $item)
            <div class="row box-row">
                <div class="col-4 name-file">
                    <i class="bi bi-three-dots me-2" data-bs-toggle="dropdown"></i>
                    <ul class="dropdown-menu">
                        <li class="delete-link" data-delete="{{ route('link.delete', $item->id) }}"><i class="bi bi-trash3 text-danger me-2 ms-2"></i>Delete</li>
                    </ul>
                    <i class="bi bi-file-pdf-fill text-danger"></i>
                       {{ Str::substr($item->file->file_name, 0, 30) }}..pdf
                </div>
                <div class="col-6 size">{{ Str::substr($item->url,0,70) }} ... &nbsp;<i datalink="{{ $item->url }}" class="bi bi-clipboard me-2 data-copy"></i></div>
                <div class="col-2">{{ $item->password }}</div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- modal create link --}}
    <x-form-modal
    idModal="mc_create_link"
    idForm="form_create_link"
    action=""
    method="POST"
    modalTitle="Create Link"
    defaultTextButton="Generate"
    >
        <div>
            <label class="form-label">Password</label>
            <input class="form-control" type="password" name="password" />
        </div>
        <div class="mt-4">
            <label class="form-label">Link File</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="url_link" id="url_link">
                <button class="btn btn-outline-secondary" type="button" id="btn-copy">Copy</button>
            </div>
        </div>
    </x-form-modal>
    {{-- end modal create link --}}
</div>
@endsection
@section("script")
     <script src="{{ asset('js/home.js') }}"></script>
@endsection


