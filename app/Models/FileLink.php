<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileLink extends Model
{
    use HasFactory;
    protected $table = 'file_links';
    protected $fillable = ['signature', 'token', 'key', 'url', 'status', 'password', 'file_id'];
}
