@include('user.header')
<link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<div class="container py-5"><br><br>
    <div class="row">
        <div style="padding: 20px" class="col-md-12"> 
            <div class="card">
                <div style=" border-radius: 6rem;" class="card-header bg-primary">
                    <h1 class="text-white" align="center">Order View
                        <a class="btn btn-warning float-end" href="{{ url('my-order') }}">Back</a>
                    </h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 order-details">
                            <h4>Shoping Details</h4><hr>
                            <label for="">First Name</label>
                            <div class="border">{{$orders->fname}}</div>
                            <label for="">Last Name</label>
                            <div class="border">{{$orders->lname}}</div>
                            <label for="">Email</label>
                            <div class="border">{{$orders->email}}</div>
                            <label for="">Contact No</label>
                            <div class="border">{{$orders->lphone}}</div>
                            <label for="">Shipping Adress</label>
                            <div class="border">
                            {{$orders->address1}},<br>
                            {{$orders->address2}},<br>
                            {{$orders->city}},<br>
                            {{$orders->state}},
                            {{$orders->country}},
                            </div>
                            <label for="">Zip Code</label>
                            <div class="border p-2">{{$orders->pincode}}</div>
                        </div>
                        <div class="col-md-6">
                            <h4>Orders Details</h4><hr>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderitemes as $carts)
                                        
                                    <tr>
                                        <td>{{{$carts->product_title}}}</td>
                                        <td>{{$carts->quantity}}</td>
                                        <td><em style="color: brown; font-size:15px;">$ {{$carts->price*$carts->quantity}} .00</em></td>
                                        <td><img  width="50" src="/productimage/{{$carts->product_image}}" alt=""></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4 class="px-2">Grand Total: <span class="float-end"><em style="color: brown; font-size:25px;">$ {{$orders->total_price}} .00</em></span></h4>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@include('user.footer')