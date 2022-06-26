<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $ItemInCart = Cart::Where('user_id',Auth::id())
        ->Where('product_id',$request->product_id)->first();

        if($ItemInCart){
            $ItemInCart->quantity += $request->quantity;
            $ItemInCart->save();

        }else{
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }

        return redirect()->route('user.cart.index');
    }

    public function index(){
        $user=User::findOrFail(Auth::id());
        $products=$user->products;
        $totalPrice=0;
        foreach($products as $product){
            $totalPrice +=$product->price*$product->pivot->quantity;
        }

        // dd($products,$totalPrice);

        return view('user.cart',compact('products','totalPrice'));
    }

    public function delete($id){
        Cart::where('product_id',$id)->where('user_id',Auth::id())->delete();

        return redirect()->route('user.cart.index');
    }
}
