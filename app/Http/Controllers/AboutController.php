<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\Article;
use App\Models\category;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = about::first();
        $articles = Article::with('category')->get();
        $category = category::select([
            'categories.*',
            'parents.name as parent_name',
        ])
            ->leftJoin('categories as parents', 'parents.id', '=', 'categories.parent_id')
            ->get();
        // $categoriesARR = [];
        //     $categories = Category::whereNull('parent_id')->get();
        //     foreach ($categories as $category1) {
        //         $subcategoryCount = Category::where('parent_id', $category1->id)->count();

        //         $categoriesARR[]=['name' => $category1->name, 'count' => $subcategoryCount];
        //     }
        $categoriesARR = Category::withCount('articles')
        ->whereNull('parent_id')
        ->groupBy('id', 'name')
        ->get();
    

        // dd($categoriesARR);
            


        return view('index', [
            'about' => $about,
            'category' => $category,
            'articles'=>$articles,
            'categoriesARR' => $categoriesARR,
            'footer' => true,
        ]);
    }

    public function about()
    {
        $about = about::get();
        return view('about', [
            'about' => $about,
        ]);
    }
}
