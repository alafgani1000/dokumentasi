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
     *
     */
    public function store(Request $request)
    {
        // validateion
        $request->validate([
            'category' => 'required|unique:categories,name'
        ]);
        // insert data
        Category::create([
            'user_id' => Auth::user()->id,
            'name' => $request->category
        ]);
        // response
        return response('Category Created');
    }

    /**
     * delete category
     *
     * @param $id
     * @return Illuminate\Http\Response
     *
     */
    public function delete($id)
    {
        // get category and check
        $category = Category::where('id',$id)->first();
        if(isset($category)) {
            $category->files()->each(function ($item) {
                $item->delete();
            });
            $category->delete();
        }
        // response
        return response('Category Deleted');
    }

    /**
     * show form rename
     *
     * @param $id
     * @return Illuminate\Http\Response
     *
     */
    public function edit($id)
    {
        $category = Category::where('id', $id)->first();
        return response()->json($category);
    }

    /**
     * rename category
     *
     * @param $id
     * @return Illuminate\Http\Response
     *
     */
    public function rename(Request $req, $id)
    {
        $category = Category::where('id',$id)->update([
            'name' => $req->name
        ]);
        return response('Rename Success');
    }

}
