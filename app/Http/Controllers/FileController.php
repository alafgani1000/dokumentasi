<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index($id)
    {
        return view('files.index');
    }

    public function link()
    {
        return view('links.index');
    }
}
