<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;
use App\Models\User;

class FileLink extends Model
{
    use HasFactory;
    protected $table = 'file_links';
    protected $fillable = ['signature', 'token', 'key', 'url', 'status', 'password', 'file_id', 'user_id'];

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
