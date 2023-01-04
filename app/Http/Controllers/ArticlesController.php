<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\Article;
use App\Models\category;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    // public function index(){

    // }

    public function index()
    {
        $articles = Article::with('category')->get();
        $about = about::get();
        $parents = category::get()->where('parent_id', '=', null);
        return view('admin.articles', [
            'articles' => $articles,
            'about' => $about,
            'parents' => $parents,
        ]);
    }


    /**
     * Show the form for creating a new article.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $about = about::get();


        return view('articles.create', [
            'categories' => $categories,
            'about' => $about,

        ]);
    }

    /**
     * Store a newly created article in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){

            $imageName = $request->image->store('public/images');
        }else{
            $imageName = null;
        }

        if($request->hasFile('video')){

            $videoName = $request->video->store('public/videos');
        }else{
            $videoName = null;
        }
        if($request->hasFile('file')){

            $fileName = $request->file->store('public/files');
        }else{
            $fileName = null;
        }
        // $request->validate([
        //     'name' => 'required',
        //     'title' => 'required',
        //     'disc' => 'required',
        //     'image' => 'required|image',
        //     'video' => 'required|mimetypes:video/mp4,video/x-m4v,video/quicktime',
        //     'category_id' => 'required'
        // ]);

        Article::create([
            'name' => $request->post('name'),
            'title' => $request->post('title'),
            'disc' => $request->post('disc'),
            'image' => $imageName,
            'video' => $videoName,
            'file'=>$fileName,
            'created_at'=> now(),
            'category_id' => $request->post('category_id')
        ]);

        return redirect(route('dashboard.articles'))->with('message', "Article created");

    }

    public function show($id)
{
    $article = Article::find($id);
    $about = about::first();

    return view('article',[
        'article'=>$article,
        'about'=>$about,
    ]);
}


    /**
     * Show the form for editing the specified article.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $categories = category::all();

        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified article in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'disc' => 'required',
            'image' => 'sometimes|image',
            'video' => 'sometimes|mimetypes:video/mp4,video/x-m4v,video/quicktime',
            'category_id' => 'required'
        ]);

        $article = Article::find($id);
        $article->name = $request->get('name');
        $article->title = $request->get('title');
        $article->disc = $request->get('disc');
        if ($request->hasFile('image')) {
            $article->image = $request->file('image')->store('images', 'public');
        }
        if ($request->hasFile('video')) {
            $article->video = $request->file('video')->store('videos', 'public');
        }
        $article->category_id = $request->get('category_id');
        $article->save();

        return redirect('/articles')->with('success', 'Article updated!');
    }
    /**
     * Remove the specified article from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/articles')->with('success', 'Article deleted!');
    }
}
