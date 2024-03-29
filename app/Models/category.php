<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    
    protected $guarded =['id'];
    protected $table='categories';
    public $timestamps = true;
   
    public function articles()
    {
        return $this->hasMany(Article::class,'category_id','id');
    }

}
