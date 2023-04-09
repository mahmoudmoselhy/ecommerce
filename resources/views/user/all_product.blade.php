

@include('user.header')
<link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

<h1>All Product</h1>
<div class="latest-products">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-heading">
          <h1 style="color: rgb(4, 145, 67)">All Product</h1>

<form class="form-inline" style="float: right; padding: 10px;" action="{{url('search')}}" method="get">
@csrf
  <input class="form-control" type="search" name="search" placeholder="search">
  <input type="submit" value="Search" class="btn btn-success">
</form>

        </div>
      </div>
      @foreach($data as $product)
      <a  href="{{url('detail',$product->id)}}">
      <div class="col-md-4">
        <div class="product-item">
          <a href="{{url('detail',$product->id)}}"><img style="border: 5px colore: green; border-radius: 6rem;" height="300" width="150" src="/productimage/{{$product->image}}" alt=""></a>
          <div class="down-content">
            <a href="{{url('detail',$product->id)}}"><h4>{{$product->title}}</h4></a>
            <h6>${{$product->price}}</h6>
            <p>{{$product->description}}</p>
          </a>
<form action="{{url('addcart',$product->id)}}" method="POST">
  @csrf
  <input type="number" value="1" min="1" class="form-control" style="width: 100px" name="quantity">
  <br>
  <input  class="btn btn-primary" type="submit" value="Add Cart" >
</form>

          </div>
        </div>
      </div>
@endforeach
@if(method_exists($data,'links'))
<div class="d-flex justify-content-center">
{!! $data->Links() !!}
</div>
@endif
    </div>
  </div>
</div>

@include('user.footer')