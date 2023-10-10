<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriveController extends Controller
{
    /**
     * show index controller
     *
     * @return Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $search = $req->search;
        $categories = Category::where('name','like','%'.$search.'%')->where('user_id', Auth::user()->id)->paginate(10)->onEachSide(1);
        return view('drive.index', compact('categories', 'search'));
    }

    /**
     * show data
     *
     * @return Illumintate\Http\Response
     */
    public function data()
    {
        $categories = Category::where('user_id', Auth::user()->id)->paginate(5);
        return view('drive.data', compact('categories'));
    }

    /**
     * show data searching
     *
     * @return Illuminae\Http\Response
     */
    public function search(Request $req)
    {
        $categories = Category::where('name','like','%'.$req->search.'%')->where('user_id', Auth::user()->id)->paginate(5);
        return view('drive.search', compact('categories'));
    }
}
