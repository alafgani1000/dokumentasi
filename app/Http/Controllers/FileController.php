<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\UploadFileRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    /**
     * show data file file
     *
     */
    public function index(Request $req, $id)
    {
        $category = Category::find($id);
        $search = $req->search;
        $files = File::with('user')
            ->where('file_name', 'like', '%'.$search.'%')
            ->where('category_id',$id)
            ->paginate(10)->onEachSide(1);
        return view('files.index', compact('category', 'files', 'search'));
    }

    /**
     *
     */
    public function link()
    {
        return view('links.index');
    }

    /**
     * upload file
     */
    public function store(UploadFileRequest $req)
    {
        $file = $req->file('document');
        $name = $file->hashName();
        $file_name = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        /**
         * byte to kb 1024
         */
        $size = $file->getSize();
        $path = $file->storeAs('documents', $name);
        File::create([
            'category_id' => $req->category,
            'name' => $path,
            'file_name' => $file_name,
            'size' => $size,
            'file_type' => $extension,
            'visibility_id' => 1,
            'user_id' => Auth::user()->id
        ]);
        return 'File Uploaded';
    }

    /**
     * memudahkan membaca file
     * konversi dari byte ke kb, mb, or gb
     */
    public function convert($size,$unit = 'B')
    {
        if ($size >= 1024) {
            $size = $size / 1024;
            $unit = 'KB';
        } else if ($size >= 1048576) {
            $size = $size / 1048576;
            $unit = 'MB';
        } else if ($size >= 1073741824) {
            $size = $size / 1073741824;
            $unit = 'GB';
        }
        return [round($size,2), $unit];
    }

    /**
     * read file
     * @var id
     */
    public function readFIle($id, $name)
    {
        $file = File::find($id);
        return response()->file(storage_path('app/'.$file->name));
    }

    /**
     * delete file
     */
    public function delete($id)
    {
        $file = File::find($id);
        if (!is_null($file)) {
            $delete = Storage::delete($file->name);
            if ($delete) {
                $file->delete();
            }
            return 'File deleted';
        } else {
            return 'File not found';
        }
    }

    /**
     * create file link
     */
    public function createLink()
    {

    }

    /**
     * file verification
     * memverifikasi akses file
     */
    public function accessVerification()
    {

    }
}
