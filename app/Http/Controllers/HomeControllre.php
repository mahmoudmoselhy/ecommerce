<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class HomeControllre extends Controller
{
    public function redirect()
    {
        $usertype=Auth::user()->usertype;

        if($usertype=='1')
        {
            return view('admin.home');
            
        }
        else
            {
                $data = product::paginate(6);
                $user=auth()->user();
                $count=cart::where('phone',$user->phone)->count();
                return view('user.home',compact('data','count'));
            }
    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else
        {
            $data = product::paginate(6);
            return view('user.home',compact('data'));
        }
        
    }
    public function search(Request $request)
    {
        $data = product::all();
        $search=$request->search;
        if($search=='')
        {
            $data = product::paginate(6);
            return view('user.home',compact('data'));
        }
        $data=product::where('title','like','%'.$search.'%')->get();
        if(Auth::id())
        {
            $user=auth()->user();
            $count=cart::where('phone',$user->phone)->count();
        return view('user.home',compact('data','count'));
        }
        else
        {
            return view('user.home',compact('data'));
        }

    }

    public function addcart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user=auth()->user();
            $product=product::find($id);
            $cart=new cart;
            $cart->name=$user->name;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->product_title=$product->title;
            $cart->price=$product->price;
            $cart->category=$product->category;
            $cart->image=$product->image;
            $cart->quantity=$request->quantity;
            $cart->save();
            return redirect()->back()->with('message','Product Add successfully');
        }
        else
        {
            return redirect('login');
        }

    }
        public function showcart()
        {
            $user=auth()->user();
            $cart=cart::where('phone',$user->phone)->get();

            $count=cart::where('phone',$user->phone)->count();

            return view('user.showcart',compact('count','cart'));
        }
        public function deletecart($id)
        {
            
            $data=cart::find($id);

            $data->delete();

            return redirect()->back()->with('message','Product Deleted');
        }

        public function detail($id)
        {
            $data = Product::where('id',$id)->firstOrfail();

            if(Auth::id())
            {
                $data = Product::where('id',$id)->firstOrfail();
                $user=auth()->user();
                $count=cart::where('phone',$user->phone)->count();
                return view('user.detail',compact('data','count'));
            }
            else
            {
                return view('user.detail',compact('data'));
            }

        }
        public function about()
        {
            if(Auth::id())
            {
                $data = product::all();
                $user=auth()->user();
                $count=cart::where('phone',$user->phone)->count();
                return view('user.about',compact('data','count'));
            }
            else
            {
                $data = product::all();
                return view('user.about',compact('data'));
            }
        }

        public function contact()
        {
            if(Auth::id())
            {
                $data = product::all();
                $user=auth()->user();
                $count=cart::where('phone',$user->phone)->count();
                return view('user.contact',compact('data','count'));
            }
            else
            {
                $data = product::all();
                return view('user.contact',compact('data'));
            }
        }
        // public function our_product()
        // {
        //     if(Auth::id())
        //     {
        //         $data = product::all();
        //         $user=auth()->user();
        //         $count=cart::where('phone',$user->phone)->count();
        //         return view('user.our_product',compact('data','count'));
        //     }
        //     else
        //     {
        //         $data = product::all();
        //         return view('user.our_product',compact('data'));
        //     }
        // }

        public function all_product()
        {
            if(Auth::id())
            {
                $data = product::all();
                $user=auth()->user();
                $count=cart::where('phone',$user->phone)->count();
                return view('user.all_product',compact('data','count'));
            }
            else
            {
                $data = product::all();
                return view('user.all_product',compact('data'));
            }
            
        }
    

        public function men()
        {
            if(Auth::id())
            {
                $data = Product::where('category','men')->get();
                // $data = product::all();
                $user=auth()->user();
                $count=cart::where('phone',$user->phone)->count();
                return view('user.our_product',compact('data','count'));
            }
            else
            {
                $data = product::all();
                return view('user.our_product',compact('data'));
            }
        }


        public function women()
        {
            if(Auth::id())
            {
                $data = Product::where('category','women')->get();
                // $data = product::all();
                $user=auth()->user();
                $count=cart::where('phone',$user->phone)->count();
                return view('user.our_product',compact('data','count'));
            }
            else
            {
                $data = product::all();
                return view('user.our_product',compact('data'));
            }
        }

        public function kids()
        {
            if(Auth::id())
            {
                $data = Product::where('category','kids')->get();
                // $data = product::all();
                $user=auth()->user();
                $count=cart::where('phone',$user->phone)->count();
                return view('user.our_product',compact('data','count'));
            }
            else
            {
                $data = product::all();
                return view('user.our_product',compact('data'));
            }
        }
}
