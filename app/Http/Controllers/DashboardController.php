<?php

namespace App\Http\Controllers;
use App\Models\about;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $about = DB::table('about')->get();
        return view('admin.personalData',[
            'about' => $about,
        ]);
    }

    public function edit(){
        $about = DB::table('about')->get();
        return view('admin.edit',[
            'about' => $about,
        ]);
    }

    public function update(Request $request,$id){
        if($request->hasFile('image')){

            $imageName = $request->image->store('public/images');
        }
        $info = about::findOrFail($id);
        $info->update([
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'image' => $imageName,
            'address' => $request->post('address'),
            'phone' => $request->post('phone'),
            'about_me' => $request->post('about_me'),
            'facebook' => $request->post('facebook'),
            'twitter' => $request->post('twitter'),
            'instagram' => $request->post('instagram'),
            'linkedin' => $request->post('linkedin'),

        ]);
       
        return redirect(route('dashboard.personalData'))->with('message', "Data updated");

    }
}
