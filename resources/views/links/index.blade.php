@extends('layouts.app-main')

@section('content')
    <div class="container" id="main-content">
        <h5><i class="bi bi-link-45deg text-primary-color"></i></i> Links</h5>
        <div id="content">
            <div class="box w-100">
                <div class="row box-row">
                    <div class="col-3 name-file">
                        <i class="bi bi-three-dots me-2" data-bs-toggle="dropdown"></i>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-clipboard me-2"></i></i>Copy</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-share text-primary me-2"></i></i>Share to</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash3 text-danger me-2"></i>Delete</a></li>
                        </ul>
                        <i class="bi bi-file-word-fill text-primary"></i> Modul Personal Data</div>
                    <div class="col-4 size">{{ Str::substr('http://localhost:8000/email/verify?signature=3157650778&token=ZcaaOuTfTAjMKrmhf6cBN8Tt2IornZn22imTrtvVDALNuP5iUxm5TuvYpoSB',0,44) }} ...</div>
                    <div class="col-2 author">Saya</div>
                    <div class="col-3 last-date">2022-06-14 08:00:00</div>
                </div>
            </div>
        </div>
    </div>
@endsection
