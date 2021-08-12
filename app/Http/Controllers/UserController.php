<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('admin.user.index', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email|string|max:255|unique:users',
            'address'=>'string',
            'mobile_number'=>'string',
            'password'=>'required|string',
            'department_id'=>'required',
            'role_id'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg',
            'start_from'=>'required',
            'designation'=>'required',
        ]);

        $data = $request->all();
        if($request->hasFile('image')){
            // $image = $request->image->hasName();
            // $request->image->move(public_path('profile'), $image)
            $image = $request->file('image')->store('public/avatar');
        }else {
            $image = 'public/product/avatar1.png';
        }

        $data['name'] = $request->firstname . $request->lastname;
        $data['image'] = $image;
        $data['password']=bcrypt($request->password);
        User::create($data);
        return redirect()->back()->with('message', 'Successful Added New User');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', ['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|string|email|max:255|unique:users,email,'.$id,
            'department_id'=>'required',
            'role_id'=>'required',
            'image'=>'mimes:png,jpg,jpeg',
            'start_from'=>'required',
            'designation'=>'required',
        ]);

        $data = $request->all();
        $user = User::find($id);
        if($request->hasFile('image')){
            $image = $request->file('image')->store('public/avatar');
            Storage::delete($user->image);
        }else{
            $image = $user->image;
        }

        if($request->password){
            $password = bcrypt($request->password);
        }else{
            $password = $user->password;
        }

        $data['image']= $image;
        $data['password'] = $password;
        $user->update($data);
        return redirect()->back()->with('message', 'Successful Updated User');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        Storage::delete($user->image);
        $user->delete();
        return redirect()->back()->with('message', 'Successful Deleted User');
    }
}
