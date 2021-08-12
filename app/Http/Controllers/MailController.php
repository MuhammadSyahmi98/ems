<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function create(){
        return view('admin.mail.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'file'=>'mimes:docx,doc,pdf,jpeg,jpg,png',
            'body'=>'required'

        ]);
        
        $image = $request->file('file');
        $details = [
            'body'=>$request->body,
            'file'=>$image
        ];
        if($request->department){
            $users = User::where('department_id',$request->department)->get();
            foreach($users as $user){
                
                \Mail::to($user->email)
                ->send(new SendMail($details));
            

            }
        }elseif($request->person){
            $user = User::where('id',$request->person)->first();
            $userEmail=$user->email;
            \Mail::to($user->email)
                ->send(new SendMail($details));

        }else{
            $users = User::get();
            foreach($users as $user){
                \Mail::to($user->email)
                ->send(new SendMail($details));
            }
        }
        return redirect()->back()->with('message','Email sent');
    }
}
