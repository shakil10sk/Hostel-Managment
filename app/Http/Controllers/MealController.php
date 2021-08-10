<?php

namespace App\Http\Controllers;

use App\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meal_view=Meal::all();
        return view('frontend.meals.view',compact('meal_view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $view=Meal::all();
        return view('frontend.meals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meals=new Meal();
        $meals->meal_name=$request->meal_name;
        $meals->meal_price=$request->meal_price;
        if($meals->save()){
            return redirect()->back()->with('success','Successfully Meals  Added');
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
        $meal_edit=DB::table('meals')->where('id',$id)->first();
        return view('frontend.meals.edit',compact('meal_edit'));
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
        $data['meal_name']=$request->meal_name;
        $data['meal_price']=$request->meal_price;
        $update=DB::table('meals')->where('id',$id)->update($data);
        if($update){
            return Redirect('/meals/view');
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
        $delete=Meal::find($id);
        $delete->delete();
        return redirect('/meals/create');
    }
}
