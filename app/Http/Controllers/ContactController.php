<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\ask;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(){
        $about = about::get();
        return view('contact',[
            'about'=>$about,
        ]);
    }

    public function save_asks(Request $request)
    {
        ask::create([
            'name'=>$request->name,
            'email' =>  $request->email,
            'subject' => $request->subject,
            'message'=> $request->message,
        ]);

        // $data = new ask;
        // $data->name = $request->name;
        // $data->subject = $request->subject ;
        // $data ->email = $request->email;
        // $data->message  = $request->message ;

        // $data -> save();

        return redirect(route('contact'))->with('message', 'Message send Successfully');


    }
    
}
