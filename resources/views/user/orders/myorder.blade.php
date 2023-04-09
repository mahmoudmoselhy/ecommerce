@include('user.header')
<link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<div class="container py-5">
    <div class="row">
        <div style="padding: 20px" class="col-md-12"> 
            <div class="card-body">
                <div class="card-header">
    <div style=" border-radius: 6rem;" class="card-header bg-primary">
                    <h1 class="text-white" align="center" style="font-size: 40px;">My Orders
    <a class="btn btn-warning float-end" href="{{url('/')}}">Back</a>
                    </h1>
                </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Order Date</th>
                                <th>Tracking Number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach ($orders as $carts)
                                
                            <tr>
                                <td>{{ date('d-m-Y',strtotime($carts->created_at))}}</td>
                                <td>{{$carts->tracking_no}}</td>
                                <td>{{$carts->total_price}}</td>
                                <td>{{$carts->status == '0' ?'pending' : 'completed'}}</td>
                                <td>
                                    <a href="{{url('view-order',$carts->id)}}" class="btn btn-primary">View </a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@include('user.footer')