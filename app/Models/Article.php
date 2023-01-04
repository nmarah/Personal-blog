<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'title', 'disc', 'image', 'video'
    ];
    public function category()
    {
        return $this->belongsTo(category::class,'category_id');
    }
}
