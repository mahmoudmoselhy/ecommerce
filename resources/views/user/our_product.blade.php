@include('user.header')
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


{{-- <div class="page-heading products-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <h4>new arrivals</h4>
            <h2>sixteen products</h2>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

  {{-- <div  class="products">
    <div class="container">
      <div class="row">
  <div class="col-md-12">
    <div class="filters">
      <ul>
          <li class="active" data-filter="*">All Products</li>
          <li data-filter=".des">Trending</li>
          <li data-filter=".dev">kids</li>
          <li data-filter=".gra">Girls</li>
      </ul>
    </div>
  </div>
</div>
</div> 
</div> --}}
  {{-- <div class="products"> --}}
    <div class="container">
      <div class="row">
        <div class="latest-products">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <div class="section-heading">
                    <h2>Popular Products</h2>
                    <a href="{{url('all_product')}}">view all products <i class="fa fa-angle-right"></i></a>
          
          <form class="form-inline" style="float: right; padding: 10px;" action="{{url('search')}}" method="get">
          @csrf
            <input class="form-control" type="search" name="search" placeholder="search">
            <input type="submit" value="Search" class="btn btn-success">
          </form>
          
                  </div>
                </div>

                @foreach($data as $product)
                <a  href="#">
                <div class="col-md-4 ">
                  <div class="product-item">
                    <a href="{{url('detail',$product->id)}}"><img style="height: 450px; width: 450;"  height="585" width="450 " src="/productimage/{{$product->image}}" alt=""></a>
                    <div class="down-content">
                      <a href="{{url('detail',$product->id)}}"><h4>{{$product->title}}</h4></a>
                      <h6>${{$product->price}}</h6>
                      <p>{{$product->description}}</p>
                    </a>
                    
          <form action="{{url('addcart',$product->id)}}" method="POST">
            @csrf
            <input  type="number" value="1" min="1" class="form-control" style="width: 100px" name="quantity">
            <br>
  <button type="submit" value="Add Cart" class="btn btn-primary"> Add To<i class="fas fa-shopping-cart"></i></button>

            {{-- <input  class="btn btn-primary" type="submit" value="Add Cart " > --}}
          </form>
          <ul class="stars">
            <li><i class="fa fa-star"></i></li>
            <li><i class="fa fa-star"></i></li>
            <li><i class="fa fa-star"></i></li>
            <li><i class="fa fa-star"></i></li>
            <li><i class="fa fa-star"></i></li>
          </ul>
          <span>Reviews (12)</span>
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

