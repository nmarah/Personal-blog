<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\ask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AskController extends Controller
{
    public function index (){
        $asks = ask::get();
        $about = about::get();
        return view ('admin.ask',[
            'asks'=>$asks,
            'about'=> $about,
        ]);

    }
}
