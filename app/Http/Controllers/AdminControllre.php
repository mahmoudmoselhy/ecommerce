<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\data;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminControllre extends Controller
{
    public function product()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='1')
            {
                return view('admin.product');
            }
            else
            {
                return redirect()->back();
            }
        }


        else
        {
            return redirect('login');
        }
    
    }
    public function uploadproduct(Request $request)
    {
        
    $data=new product;
    $image=$request->file;
    $imagename=time().'.'.$image->getClientOriginalExtension();
    $request->file->move('productimage',$imagename);
    $data->image=$imagename;
    $data->title=$request->title;
    $data->category=$request->category;
    $data->price=$request->price;
    $data->description=$request->description;
    $data->quantity=$request->quantity;
    $data->save();
    return redirect()->back()->with('message','Product Add successfully');
    }

    public function showproduct()
    {
        $data=product::all();
        return view('admin.showproduct',compact('data'));
    }

    public function deleteproduct($id)
    {
        $data=product::find($id);
        $data->delete();
        return redirect()->back()->with('message','Product Deleted');

    }
    public function updateview($id)
    {
        $data = Product::where('id',$id)->firstOrfail();
        return view('admin.updateview',compact('data'));
    }

    public function updateproduct(Request $request,$id)
    {

        $data=product::find($id);
        $image=$request->file;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->file->move('productimage',$imagename);
            $data->image=$imagename;
        }
    $data->title=$request->title;
    $data->category=$request->category;
    $data->price=$request->price;
    $data->description=$request->description;
    $data->quantity=$request->quantity;
    $data->save();
    return redirect()->back()->with('message','Product Updated successfully');
    }

    public function showuser()
    {
        $data=user::all();
        return view('admin.showuser',compact('data'));
    }
    public function deleteuser($id)
    {
        $data=user::find($id);
        $data->delete();
        return redirect()->back()->with('message','User Deleted');

    }
    public function addadmin($id)
    {
        $data=user::find($id);
        $data->usertype='1';
        $data->save();
        return redirect()->back()->with('message','Order Delivered successfully');
    }

    public function showorder()
    {
        $orders = Order::where('status','0')->get();
        return view('admin.showorder',compact('orders'));
    }
    
    public function orderview($id)
    {
        $orders = order::where('id',$id)->first();
        return view('admin.orderview',compact('orders'));
    }
    public function updateorder(Request $request, $id )
    {
        $orders = order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('showorder')->with('message','Status Updated successfully');
    }
    public function orderhistroy()
    {
        $orders =Order::where('status','1')->get();
        return view('admin.history',compact('orders'));
    }
}

