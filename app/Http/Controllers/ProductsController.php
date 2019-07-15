<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//call the Product model
use App\Product;

use App\Bids;

use DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        //Display all the products in the database
        return view('products.index')->with('products' ,$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //bid on a product
        return view('products.product');
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
            'name'=>'required',
            'SKU'=>'required',
            'price'=>'required',
            'description'=>'required'
        ]);
        
        //make a bid

        $product = new Product;
        $product->name = $request->input('name');
        $product->SKU = $request->input('SKU'); 
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->save();

        return redirect('/products')->with('success','Product Added Successfully!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get a single product by id
        $products = Product::find($id);
       $views = DB::table('products')
          ->where('id',$id)
        ->increment('views',1);

        //$products->increment('views');
        //$pbids = Bids::all();

        //max bid amount
        $price = DB::table('bids')
                //->where('id', $id)
                ->max('price');
        
                //min bid amount
        $mini = DB::table('bids')
        //->where('product_id', $id)
        ->min('price');

        $counto = DB::table('bids')
        ->where('product_id', $id)
        ->count('price');

        //total number of bids
        $tot = DB::table('bids')
        //->where('product_id', $id)
        ->count('price');

        //count bids per product
        $counto = DB::table('bids')
        ->where('product_id', $id)
        ->count('price');

        //avg bid

        $avg = DB::table('bids')
        //->where('product_id', $id)
        ->avg('price');

        
        // echo $avg;
        
        // echo $price;
        // echo $mini;
        // echo $counto;
        // echo $tot;
        //$price = Bids::max('price');
   
        //return view('home')->with('products_list' ,$price);
        return view('products.show',compact('products' ,'avg','price','mini','counto','tot','views'));
        //return view('products.product')->with('average',$avg);
        // echo $counto;
        // echo $mini;
       // return view('products.show')->with('bids' ,$pbids);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $products = Product::find($id);
        //Display all the products in the database
        return view('products.edit')->with('products' ,$products);
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
        //update form data into the database
        $this->validate($request,[
            'name'=>'required',
            'SKU'=>'required',
            'price'=>'required',
            'description'=>'required'
        ]);
        
        
        $products = Product::find($id);
        $products -> name = $request->input('name');
        $products->price = $request->input('price');
        $products->SKU = $request->input('SKU');
        $products->description = $request->input('description'); 
        $products->save();

        return redirect('/home')->with('success','Product Updated Successfully!!!');



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
        $product = Product::find($id);
        $product->delete();
     
        return redirect('/home')->with('success','Product Deleted Successfully!!!');


    }
}
