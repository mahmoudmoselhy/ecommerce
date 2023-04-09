<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\cart;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function myorder()
    {
        $user=auth()->user();
        $count=cart::where('phone',$user->phone)->count();
        $orders = Order::where('lphone',$user->phone)->get();
        return view('user.orders.myorder', compact('orders','count'));
    }
    public function view($id)
    {
        $user=auth()->user();
        $orders=Order::find($id);
        $orders=Cart::where('phone',$user->phone)->get();
        $orders = Order::where('id',$id)->where('user_id', Auth::id())->first();
        $orders = Order::where('id',$id)->where('lphone',$user->phone)->firstOrfail();
        $count=cart::where('phone',$user->phone)->count();
        return  view('user.orders.view',compact('orders','count'));
    }
}
