<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\category;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $about = about::get();
        $category = category::select([
            'categories.*',
            'parents.name as parent_name',
        ])
        ->leftJoin('categories as parents' ,'parents.id' ,'=' , 'categories.parent_id')
        ->get();
        return view('index',[
            'about' => $about,
            'category' => $category ,
           
        ]);
    }

    public function about(){
        $about = about::get();
        return view('about',[
            'about' => $about,
        ]);
    }

 
}
