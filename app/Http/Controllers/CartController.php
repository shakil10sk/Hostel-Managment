<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Illuminate\Support\Facades\Request as FacadesRequest;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data=array();
        $data['id']=$request->id;
        $data['name']=$request->name;
        $data['qty']=$request->qty;
        $data['price']=$request->price;
        $add=Cart::add($data);
        return Redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function CreateInvoice(Request $request)
    {
        $request->validate([
            'border_id'=>'required',
        ],
        [
            'border_id.required'=>'Select a Border First',
        ]);
        $border_id=$request->border_id;
        $border=DB::table('borders')->where('id',$border_id)->first();
        $contents=Cart::content();
        return view('frontend.meal_report.invoice',compact('border','contents'));
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
    public function CartUpdate(Request $request, $rowId)
    {
        $qty=$request->qty;
        $update=Cart::update($rowId,$qty);

            return Redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function CartRemove($rowId){
        $remove=Cart::remove($rowId);
        return Redirect()->back();
    }
    public function FinalInvoice(Request $request){

        $data=array();
        $data['border_id']=$request->border_id;
        $data['order_date']=$request->order_date;
        $data['order_status']=$request->order_status;
        $data['total_meal']=$request->total_meal;
        $data['sub_total']=$request->sub_total;
        $data['vat']=$request->vat;
        $data['payment_status']=$request->payment_status;
        $data['pay']=$request->pay;
        $data['due']=$request->due;

       $order_id=DB::table('order_details')->insertGetId($data);
       $contents=Cart::content();
       $odata=array();
       foreach ($contents as $content) {
          $odata['order_id']= $order_id;
          $odata['meal_id']= $content->id;
          $odata['quentity']= $content->qty;
          $odata['unitcost']= $content->price;
          $odata['total']= $content->subtotal;
          $insert=DB::table('orders')->insert($odata);
       }
       if($insert){
        Cart::destroy();
        return Redirect('/order/view');
        }else{

            return Redirect()->back();
        }
    }
}
