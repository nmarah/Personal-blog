<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'title', 'disc', 'image', 'video','file','category_id'
    ];
    public function category()
    {
        return $this->belongsTo(category::class,'category_id','id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
