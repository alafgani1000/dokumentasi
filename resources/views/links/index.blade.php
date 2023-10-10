@extends('layouts.app-main')

@section('content')
    <div class="container" id="main-content">
        <h5><i class="bi bi-link-45deg text-primary-color"></i></i> Links</h5>
        <div id="content">
            <div class="box w-100">
                <div class="row box-row fw-bold">
                    <div class="col-4 ps-4">Name</div>
                    <div class="col-6">Link</div>
                    <div class="col">Password</div>
                </div>
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
                {{ $filelinks->links() }}
            </div>
        </div>
    </div>
@endsection
@section("script")
     <script src="{{ asset('js/link.js') }}"></script>
@endsection

