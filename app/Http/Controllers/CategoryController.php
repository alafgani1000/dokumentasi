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
            'category' => 'required|unique:categories,name'
        ]);

        Category::create([
            'user_id' => Auth::user()->id,
            'name' => $request->category
        ]);

        return response('Category Created');
    }

}
