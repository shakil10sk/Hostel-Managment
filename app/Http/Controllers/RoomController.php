<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view=Room::all();
        return view('frontend.room.view',compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Room();
        // dd($request);

        $store->room_num=$request->room_num;
        $store->floor_num=$request->floor_num;
        $store->status=$request->status;
        if(  $store->save()){
            return redirect()->back()->with('success','Successfully Border Added');
        }else{
            return redirect()->back()->with('error','Somtheing is Wrong .Please give information again');
        }
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
        $room_edit=DB::table('rooms')->where('id',$id)->first();
        return view('frontend.room.edit',compact('room_edit'));
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
        $data=array();
        $data['room_num']=$request->room_num;
        $data['floor_num']=$request->floor_num;
        $data['status']=$request->status;
        $update=DB::table('rooms')->where('id',$id)->update($data);
        if($update){
            return Redirect('/room/view');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delt=Room::find($id);
        $delt->delete();
        return Redirect('/room/view');
    }
}
