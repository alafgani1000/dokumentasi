@extends('layouts.app-main')

@section('content')
    <div class="container" id="main-content">
        <div class="row">
            <div class="col-12">
                <h5 class="ms-auto">My Drive</h5>
            </div>
        </div>
        <div id="content">
            <div class="box w-100">
                <x-folder-row
                    name="Panduan Penggunaan Aplikasi HRIS"
                    size="200 Kb"
                    author="Saya"
                    lastDate="2022-02-11"
                    dataId="1"
                    dataLink="http://localhost:8000/file/1/Panduan Penggunaan Aplikasi HRIS"
                ></x-folder-row>
                <x-folder-row
                    name="Dokumentasi Aplikasi HRIS"
                    size="200 Kb"
                    author="Saya"
                    lastDate="2022-02-11"
                    dataId="2"
                    dataLink="http://localhost:8000/file/2/Dokumentasi Aplikasi HRIS"
                ></x-folder-row>
            </div>
        </div>
    </div>
@endsection
