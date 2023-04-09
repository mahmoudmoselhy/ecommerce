<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function checkout()
    {
            $data = product::all();
            $user=auth()->user();
            $count=cart::where('phone',$user->phone)->count();

            $cart = cart::where('phone',$user->phone)->get();
            return view('user.checkout',compact('data','count','cart'));
    }

    public function confirmorder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname=$request->input('fname');
        $order->lname=$request->input('lname');
        $order->email=$request->input('email');
        $order->lphone=$request->input('lphone');
        $order->address1=$request->input('address1');
        $order->address2=$request->input('address2');
        $order->city=$request->input('city');
        $order->state=$request->input('state');
        $order->country=$request->input('country');
        $order->pincode=$request->input('pincode');
        $total =0;
        $user=auth()->user();
        $cart_total =cart::where('phone',$user->phone)->get();
        foreach($cart_total as $product)
        {
             $total += $product->price * $product->quantity;
        }
        $order->total_price = $total;
        $order->tracking_no='sharma'.rand(1111,9999);
        $order->save();
        
        $user=auth()->user();
        $cart = cart::where('phone',$user->phone)->get();
        foreach($cart as $carts)
        {
            $OrderItem= OrderItem::create ([
                'order_id'=>$order->id,
                'product_id'=>$carts->id,
                'quantity'=>$carts->quantity,
                'price'=>$carts->price,
                'product_title'=>$carts->product_title,
                'product_image'=>$carts->image,
            ]);
            $product = Product::where('id',$carts->id)->first();
        }
        // if(Auth::user()->address1 == NULL)
        // {
        // $user = User::where('id', Auth::id())->first();
        // $user->name=$request->input('fname');
        // $user->lname=$request->input('lname');
        // $user->lphone=$request->input('lphone');
        // $user->address1=$request->input('address1');
        // $user->address2=$request->input('address2');
        // $user->city=$request->input('city');
        // $user->state=$request->input('state');
        // $user->country=$request->input('country');
        // $user->pincode=$request->input('pincode');
        // $user->update();
        // }
        $cart = cart::where('phone',$user->phone)->get();
        cart::destroy($cart);
        return redirect('/')->with('message','Order Successfully');

    }
}
