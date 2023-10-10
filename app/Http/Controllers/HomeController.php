<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\FileLink;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $files = File::with('user')->where('user_id', Auth::user()->id)->limit(5)->orderBy('created_at', 'desc')->get();
        $filelinks = FileLink::where('user_id', Auth::user()->id)->limit(5)->orderBy('created_at', 'desc')->get();
        return view('home', compact('files', 'filelinks'));
    }
}
