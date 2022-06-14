@extends('layouts.app-main')

@section('content')
    <div class="container" id="main-content">
        <h5>Panduan Penggunaan Aplikasi HRIS</h5>
        <div id="content">
            <div class="box w-100">
                <div class="row box-row">
                    <div class="col-3 name-file">
                        <i class="bi bi-three-dots me-2" data-bs-toggle="dropdown"></i>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square text-primary me-2"></i>Rename</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash3 text-danger me-2"></i>Delete</a></li>
                        </ul>
                        <i class="bi bi-file-word-fill text-primary"></i> Modul Payroll</div>
                    <div class="col-3 size">200 Kb</div>
                    <div class="col-3 author">Saya</div>
                    <div class="col-3 last-date">2022-06-14 08:00:00</div>
                </div>

                <div class="row box-row">
                    <div class="col-3 name-file">
                        <i class="bi bi-three-dots me-2" data-bs-toggle="dropdown"></i>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square text-primary me-2"></i>Rename</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trash3 text-danger me-2"></i>Delete</a></li>
                        </ul>
                        <i class="bi bi-file-pdf-fill text-danger"></i></i> Modul Payroll</div>
                    <div class="col-3 size">200 Kb</div>
                    <div class="col-3 author">Saya</div>
                    <div class="col-3 last-date">2022-06-14 08:00:00</div>
                </div>
            </div>
        </div>
    </div>
@endsection
