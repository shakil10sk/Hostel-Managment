<?php

namespace App\Http\Controllers;

use App\Border;
use App\Room;
use Illuminate\Http\Request;
use Image;
use File;

class BorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view=Border::all();
        return view('frontend.border.viewBorder',compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $room=Room::all();
        return view('frontend.border.create',compact('room'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Border;
            if($request->hasFile('photo')){
                $image=$request->file('photo');
                // return $image ;
                $file_name=time().'.'.$image->getClientOriginalExtension();
                // return $file_name ;

                $image_resize=Image::make($image->getRealPath());
                $image_resize->resize(300,400);

                $image_resize->save('images/borders/'.$file_name);
                $store->photo=$file_name;

            }
        $store->name=$request->name;
        $store->your_phone=$request->your_phone;
        $store->father_name=$request->father_name;
        $store->father_phone=$request->father_phone;
        $store->email=$request->email;
        $store->address=$request->address;
        $store->nid_number=$request->nid_number;
        $store->room_id=$request->room_id;
        //  dd($store);
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
        $border_edit=Border::where('id',$id)->first();
        $room_num_edit=Room::all();
        return view('frontend.border.edit',compact('border_edit','room_num_edit'));
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
        $data=Border::find($id);
            if($request->hasFile('photo')){
                $image=$request->file('photo');
                // return $image ;
                $file_name=time().'.'.$image->getClientOriginalExtension();
                // return $file_name ;

                $image_resize=Image::make($image->getRealPath());
                $image_resize->resize(300,400);
                // unlink old photo
                $old_file=$data->photo;
                if(!empty($old_file)){
                    $path=("images/borders/$old_file");
                    unlink($path);
                }

                $image_resize->save('images/borders/'.$file_name);
                $data->photo=$file_name;

            }
        $data->name=$request->name;
        $data->your_phone=$request->your_phone;
        $data->father_name=$request->father_name;
        $data->father_phone=$request->father_phone;
        $data->email=$request->email;
        $data->address=$request->address;
        $data->nid_number=$request->nid_number;
        $data->room_id=$request->room_id;
        //  dd($store);
        if(  $data->save()){
            return redirect()->back()->with('success','Successfully Border Updated');
        }else{
            return redirect()->back()->with('error','Somtheing is Wrong .Please give information again');
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
        $delete=Border::find($id);
        $old_file=$delete->photo;
           if(!empty($old_file)){
             $path=("images/borders/$old_file");
             unlink($path);
          }
        $delete->delete();
        return back()->with('success','Data Deleted successfully');
    }
}
