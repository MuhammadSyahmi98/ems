<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leave::get();
        return view('admin.leave.index', ['leaves'=>$leaves]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leaves = Leave::where('user_id', auth()->user()->id)->get();
        return view('admin.leave.create', ['leaves'=>$leaves]);
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
            'from'=>'required',
            'to'=>'required',
            'description'=>'required',
            'type'=>'required',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['message']='';
        $data['status']= 0;
        Leave::create($data);
        return redirect(route('leaves-create'))->with('message', 'Successful Created Leave');
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
        $leave = Leave::find($id);
        return view('admin.leave.edit', ['leave'=>$leave]);
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
        $this->validate($request, [
            'from'=>'required',
            'to'=>'required',
            'description'=>'required',
            'type'=>'required',
        ]);
        $leave = Leave::find($id);
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['message']='';
        $data['status']= 0;
        $leave->update($data);
        return redirect(route('leaves-create'))->with('message', 'Successful Updated Leave');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leave = Leave::find($id);
        $leave->delete();
        return redirect(route('leaves-create'))->with('message', 'Successful Deleted Leave');
    }

    public function acceptReject(Request $request, $id){
        $status = $request->status;
        $message = $request->message;
        $leave = Leave::find($id);
 
        $leave->update([
            'status' => $status,
            'message' => $message,
        ]);

        return redirect(route('leaves-index'))->with('message', 'Succesful updated leave');
    }
}
