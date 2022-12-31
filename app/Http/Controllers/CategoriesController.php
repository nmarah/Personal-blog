<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $parents = category::get()->where('parent_id', '=', null);
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
        $old = null;

        $category = category::findOrFail($id);
        if($request->hasFile('image')){

            $imageName = $request->image->store('public/images');
            $old = $category->image_path;
        }
       
        $category->update([
            'name' => $request->post('name'),
            'title' => $request->post('title'),
            'parent_id' => $request->post('parent_id'),
            'image'=> $imageName,
            'disc' => $request->post('disc'),
        ]);

        if($old){
            Storage::disk('local')->delete($old);
        }
     
         return redirect(route('dashboard.categories'))->with('message', "Category updated");

    }

    public function delete($id)
    {
       // category::destroy($id);
        $category = category::findOrFail($id);
        $category->delete();
        if($category->image_path){
            Storage::disk('local')->delete($category->image_path);
        }

        return redirect(route('dashboard.categories'))->with('message', "Category deleted");
    }

}