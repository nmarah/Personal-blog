<?php

namespace App\Http\Controllers;

use App\Events\CommentAdded;
use App\Mail\NewComment;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use HTMLPurifier;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{

    // public function index(Article $article)
    // {
    //     $comments = $article->comments;
    //     return view('article',[
    //         'comments'=>$comments,
    //     ]);
    // }
    public function store(Request $request, Article $article)
    {
    
        // validate the request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'body' => 'required|max:2000',
        ]);

    
        // $config = HTMLPurifier_Config::createDefault();
        // $purifier = new HTMLPurifier($config);
        // $body= $purifier->purify($request->body);

        $body = strip_tags($request->body);

        // create a new comment
        $comment = new Comment([
            'name' => $request->name,
            'email' => $request->email,
            'body' => $body,
            'article_id' => $article->id,
        ]);

        // save the comment
        $comment->save();

       // event(new CommentAdded($comment));

        $admin = User::where('type', 'super-admin')->first();
        $adminEmail = $admin->email;


        Mail::to($adminEmail)->send(new NewComment($comment));



        // redirect back to the article detail view
        return redirect()->back();
    }
}
