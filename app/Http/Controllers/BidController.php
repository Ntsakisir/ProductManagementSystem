<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Bids;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
      //  $placed_bids = Bid::all();
        //Display all the products in the database
       // return view ('products.show')->with('placed_bids', $placed_bids);

        $price = DB::table('bids')->max('price');
        
        return view ('products.show')->with('placed_bids',$price);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('products.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //save form data into the database
          $this->validate($request,[
            'email'=>'required',
            'price'=>'required'
        ]);
        
        //make a bid

        $bid = new Bids;
        $bid->email = $request->input('email');
        $bid->price = $request->input('price'); 
        $bid->product_id = $request->input('product_id');
        $bid->save();

        return redirect('/products')->with('success','Bid Placed Successfully!!!');
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
