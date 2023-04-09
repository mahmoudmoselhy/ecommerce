@include('user.header')
<link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

<div style="padding: 100px; " align="center">
    <div style=" border-radius: 6rem;" class="card-header bg-primary">

<h1 class="text-white" align="center" style="font-size: 40px;">CHECKOUT 
    <a class="btn btn-warning float-end" href="{{url('showcart')}}">Back</a>

</h1> 
</div>
<div class="container mt-5"> 
    <form action="{{url('confirm_order')}}" method="POST">
        @csrf
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    <div class="row checkout-form">
                        <div class="col-md-6">
                            <label for="">First Name</label>
                            <input type="text" value="{{Auth::user()->name}}" name="fname" class="form-control" placeholder="Enter Your First Name">
                        </div>

                        <div class="col-md-6">
                            <label for="">Last Name</label>
                            <input type="text" value="{{Auth::user()->lname}}" name="lname" class="form-control" placeholder="Enter Your last Name">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Email</label>
                            <input type="text" value="{{Auth::user()->email}}" name="email" class="form-control" placeholder="Enter Your Email">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Phone number</label>
                            <input type="text" value="{{Auth::user()->phone}}" name="lphone" class="form-control" placeholder="Enter Your Phone number">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="">Adderss 1</label>
                            <input type="text" value="{{Auth::user()->address1}}" name="address1" class="form-control" placeholder="Enter Your Adderss 1">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="">Adderss 2</label>
                            <input type="text" value="{{Auth::user()->address2}}" name="address2" class="form-control" placeholder="Enter Your Adderss 2">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="">City</label>
                            <input type="text" value="{{Auth::user()->city}}" name="city" class="form-control" placeholder="Enter Your City">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="">State</label>
                            <input type="text" value="{{Auth::user()->state}}" name="state" class="form-control" placeholder="Enter Your State">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="">Country</label>
                            <input type="text" value="{{Auth::user()->country}}" name="country" class="form-control" placeholder="Enter Your Country">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="">Pin Code</label>
                            <input type="text" value="{{Auth::user()->pincode}}" name="pincode" class="form-control" placeholder="Enter Your Pin Code">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h6>Order Details</h6>
                    <hr>
        @if ($total = 0)  @endif

                    @foreach ($cart as $carts)
                    <table class="table table-striped table-pordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$carts->product_title}}</td>
                                <td>{{$carts->quantity}}</td>
                                <td> <em style="color: brown; font-size:15px;">$ {{$carts->price*$carts->quantity}}</em></td>
                            </tr>
                        </tbody>
                        @if ($total += $carts->price * $carts->quantity)  @endif

                        @endforeach
                        
                    </table>
                <hr>
                    <h1 style="font-size: 24px; " id="gtotale">TOTAL PRICE : <em style="color: brown; font-size:24px;"> $ {{$total}}.00</em></h1>


                    <hr>

                    <button type="submit" class="btn btn-primary flaot-end">Confirm Order</button>

                </div>
            </div>
        </div>
    </div>
</div>
</form>
</div>


@include('user.footer')