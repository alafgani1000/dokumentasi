<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriveController extends Controller
{
    /**
     * show index controller
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return view('drive.index');
    }
}
