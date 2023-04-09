


<!DOCTYPE html>
<html lang="en">
  <head>
@include('admin.css')
  </head>
  <body>
@include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->

<div class="containar">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="card-header">
          </div>
          <div class="card-body">
            @if(session()->has('message'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{session()->get('message')}}
            </div>
            @endif
            <h1 class="text-white" align="center" style="font-size: 40px;">New Orders
              <a class="btn btn-warning float-end" href="{{url('order-histroy')}}">Order Histroy</a>
                            </h1>
              <table class="table table-bordered">
                  <thead>
                      <tr>
                        <th>Order Id</th>
                        <th>Order Date</th>
                          <th>Tracking Number</th>
                          <th>Total Price</th>
                          <th>Status</th>
                          <th>Country</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody> 
                      @foreach ($orders as $carts)
                          
                      <tr>
                        <td>{{$carts->id}}</td>
                        <td>{{ date('d-m-Y',strtotime($carts->created_at))}}</td>
                          <td>{{$carts->tracking_no}}</td>
                          <td>{{$carts->total_price}}</td>
                          <td>{{$carts->status == '0' ?'pending' : 'complete'}}</td>
                          <td>{{$carts->country}}</td>
                          <td>
                              <a href="{{url('orderview',$carts->id)}}" class="btn btn-primary">View </a> 
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
</div>





          <!-- partial -->
      @include('admin.script')
  </body>
</html>