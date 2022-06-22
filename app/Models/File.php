<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','name','size','file_type','visibility','user_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
