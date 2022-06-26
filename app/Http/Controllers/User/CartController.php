<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
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
        dd('テスト');
    }
}
