<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Product;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    private $product, $totalCartItem;

    public function directAddToCart(Request $request)
    {
        $this->product = Product::find($request->prod_id);
        Cart::add([
            'id'    => $request->prod_id,
            'name'  => $this->product->name,
            'qty'   => $request->quantity,
            'price' =>  $this->product->selling_price,
            'options' => [
                'image' => $this->product->image,
                'category' => $this->product->category->name,
                'brand' => $this->product->brand->name
            ]
        ]);
        return response()->json(
            [
                'status'=>'success',
            ]
        );
    }

    public function index(Request $request,$id){

        // return $request;
        $this->product = Product::find($id);
        if($this->product->stock_amount < $request->qty)
        {
//            if($this->product->stock_amount < Session::get('qty') ){
//                return back()->with('message','Sorry.. you can purchase maximum Quantity is... '.$this->product->stock_amount);
//            }
            return back()->with('message','Sorry.. you can purchase maximum Quantity is... '.$this->product->stock_amount);
        }

        foreach(Cart::content() as $item)
        {
            if($item->id == $this->product->id)
            {
                $this->totalCartItem = $item->qty + $request->qty;
                if($this->product->stock_amount < $this->totalCartItem)
                {
                    return back()->with('message','Sorry.. you can purchase maximum Quantity is... '. $this->product->stock_amount - $item->qty);
                }
            }
        }



//        Session::put('qty',$request->qty);
        Cart::add([
            'id' => $id,
            'name' =>  $this->product->name,
            'qty' => $request->qty,
            'price' =>  $this->product->selling_price,
            'options' => [
                'image' => $this->product->image,
                'category' => $this->product->category->name,
                'brand' => $this->product->brand->name
            ]
        ]);

       return redirect('/shopping-cart');
    }

    public function show(){
        // return Cart::content();
        return view('frontEnd.cart.cart',[
            'cartProducts' => Cart::content()
        ]);
    }

    public function update(Request $request){

        // return $request;
        $this->product = Product::find($request->prod_id);
        if($this->product->stock_amount < $request->quantity){
            return back()->with('message','Sorry.. you can purchase maximum Quantity is... '.$this->product->stock_amount);
        }


        Cart::update($request->id, $request->quantity);
        return response()->json(
            [
                'update'=>'success',
            ]
        );
    }

    public function delete($id){
        Cart::remove($id);
        return back()->with('message', 'Cart Product Remove Successfully  ');
    }

}
