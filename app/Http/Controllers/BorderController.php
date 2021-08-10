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
        // dd($request);

            // if ($request->hasFile('photo')) {
            //     $image = $request->file('photo');
            //     $file_name = time().'.'.$image->getClientOriginalExtension();
            //     // $request->photo->move('images/border/', $file_name);
            //     $path=('images/');
            //     $image->move($path.$file_name);

            //     $store->photo = $file_name;
            // }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
