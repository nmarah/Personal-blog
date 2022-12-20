<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = category::select([
            'categories.*',
            'parents.name as parent_name',
        ])
        ->leftJoin('categories as parents' ,'parents.id' ,'=' , 'categories.parent_id')
        ->get();

        $about = about::get();
        return view('admin.categories', [
            'categories' => $categories,
            'about'=>$about,
        ]);
    }

    public function create()
    {
        $parents = category::orderBy('name', 'ASC')->get();
        $about = about::get();
        return view('admin.create', [
            'parents' => $parents,
            'about'=>$about,
        ]);
    }
    public function store(Request $request)
    {
        if($request->hasFile('image')){

            $imageName = $request->image->store('public/images');
        }else{
            $imageName = null;
        }
        category::create([
            'name' => $request->post('name'),
            'parent_id' => $request->post('parent_id'),
            'title'=>$request->post('title'),
            'disc' => $request->post('disc'),
            'image' => $imageName,
            'created_at'=> now(),
        ]); 

        return redirect(route('dashboard.categories'))->with('message', "Category created");

    }
    public function edit($id)
    {
        $category = category::findOrFail($id);
        $parents = category::orderBy('name')->get();
        $about = about::get();

        return view('admin.editCat', [
            'category' => $category,
            'parents' => $parents,
            'about'=>$about,
        ]);
    }

    public function update(Request $request, $id)
    {  
        $about = about::get();

        $category = category::findOrFail($id);
        if($request->hasFile('image')){

            $imageName = $request->image->store('public/images');
        }
       
        $category->update([
            'name' => $request->post('name'),
            'title' => $request->post('title'),
            'parent_id' => $request->post('parent_id'),
            'image'=> $imageName,
            'disc' => $request->post('disc'),
        ]);
     
         return redirect(route('dashboard.categories'))->with('message', "Category updated");

    }

    public function delete($id)
    {
        category::destroy($id);
        return redirect(route('dashboard.categories'))->with('message', "Category deleted");
    }

}