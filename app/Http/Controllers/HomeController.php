<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

//call the Product model
use App\Product;

use App\Bids;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = Product::all();

        $products = DB::table('products')
        ->leftJoin('bids','products.id' , '=', 'bids.product_id')
        ->select('products.*' ,'bids.product_id' ,'bids.price')
        ->get();
        //max bid
        $results = DB::table('products')
        ->leftJoin('bids','products.id' , '=', 'bids.product_id')
        ->select(DB::raw('max(bids.price) AS max_bid'))
        ->groupBy('products.id')
        ->first();
        //min bid
        $minimum = DB::table('products')
        ->leftJoin('bids','products.id' , '=', 'bids.product_id')
        ->select(DB::raw('min(bids.price) AS min_bid'))
        ->groupBy('products.id')
        ->first();
        //average
        $average = DB::table('products')
        ->leftJoin('bids','products.id' , '=', 'bids.product_id')
        ->select(DB::raw('avg(bids.price) AS avg_bid'))
        ->groupBy('products.id')
        ->first(3);

        //total bids
        $total = DB::table('products')
        ->leftJoin('bids','products.id' , '=', 'bids.product_id')
        ->select(DB::raw('count(bids.price) AS tot_bid'))
        ->groupBy('products.id')
        ->first();

        return view('home',compact('products' ,'results' ,'minimum' ,'average' ,'total'));
       // return view('home')->with('products' ,$joined);
    }

   public function show($id)
    {
        //get a single product by id
        $products = Product::find($id);
        //$products->increment('views');
        //$pbids = Bids::all();
        $highestBid = DB::table('products')
        ->leftJoin('bids','products.id' , '=', 'bids.product_id')
        ->select('products.*' ,'bids.price' ,DB::raw('max(bids.price) AS max_bid') ,'bids.product_id')
        ->get();

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

        
        echo $avg;
        
        echo $price;
        echo $mini;
        echo $counto;
        echo $tot;
        //$price = Bids::max('price');
   
        //return view('home')->with('products_list' ,$price);
        return view('home',compact('highestBid'));
        //return view('products.product')->with('average',$avg);
        echo $counto;
        echo $mini;
       // return view('products.show')->with('bids' ,$pbids);
    }
 
}
