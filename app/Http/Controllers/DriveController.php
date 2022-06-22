<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $categories = Category::paginate(5);
        return view('drive.index', compact('categories'));
    }

    /**
     * show data
     *
     * @return Illumintate\Http\Response
     */
    public function data()
    {
        $categories = Category::paginate(5);
        return view('drive.data', compact('categories'));
    }

    /**
     * show data searching
     *
     * @return Illuminae\Http\Response
     */
    public function search(Request $req)
    {
        $categories = Category::where('name','like','%'.$req->search.'%')->paginate(5);
        return view('drive.search', compact('categories'));
    }
}
