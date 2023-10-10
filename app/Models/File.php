<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use App\Models\FileLink;
use Illuminate\Support\Facades\Auth;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','name','size','file_name','file_type','visibility_id','user_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fileLinks()
    {
        return $this->hasMany(FileLink::class);
    }

    public function getDisplaySizeAttribute()
    {
        $size = 0;
        $unit = "";
        if ($this->size < 1024) {
            $size = $this->size;
            $unit ='B';
        } else if ($this->size >= 1024) {
            $size = $this->size / 1024;
            $unit = 'KB';
        } else if ($this->size >= 1048576) {
            $size = $this->size / 1048576;
            $unit = 'MB';
        } else if ($this->size >= 1073741824) {
            $size = $this->size / 1073741824;
            $unit = 'GB';
        }
        return round($size,2)." ".$unit;
    }

    public function getDisplayAuthorAttribute()
    {
        return $this->user_id == Auth::user()->id ? 'Saya' : $this->user->name;
    }
}
