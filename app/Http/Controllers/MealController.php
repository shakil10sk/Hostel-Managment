<?php

namespace App\Http\Controllers;

use App\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view=Meal::all();
        return view('frontend.meals.create',compact('view'));
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
        $edit=Meal::find($id);
        return view('frontend.meals.edit',compact('edit'));
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

        $update=Meal::find($id);
        // dd($update);
        $update->meal_name=$request->meal_name;
        $update->meal_price=$request->meal_price;
        $update->save();
        return Redirect('/meals/create');
        // dd($update);
        // if($update->save()){
        //     return redirect()->back()->with('success','Successfully Meals  Added');
        // }else{
        //     return redirect()->back()->with('error','Somtheing is Wrong .Please give information again');
        // }

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
