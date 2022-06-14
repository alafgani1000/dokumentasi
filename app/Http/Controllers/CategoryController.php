<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * create new category
     *
     * @param Illuminate\Http\Request;
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Category::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name
        ]);

        return response('Category Created');
    }

    /**
     * show form create category
     *
     * @return Illuminate\Http\Response
     */
    public function formCreate()
    {
        return view('category.create');
    }

}
