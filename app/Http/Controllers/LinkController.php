<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileLink;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    /**
     * menampilkan links file
     *
     */
    public function index()
    {
        $filelinks = FileLink::with(['file', 'user'])->where('user_id', Auth::user()->id)->paginate(10)->onEachSide(1);
        return view('links.index', compact('filelinks'));
    }

    /**
     * delete link
     */
    public function delete($id)
    {
        $deleteLink = FileLink::find($id);
        $deleteLink->delete();
        return "Link deleted";
    }
}
