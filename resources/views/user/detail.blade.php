
@include('user.header')

<link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

<br><br><br>
        <div  class="continer">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 border-righ">
                            <img style=" border: 5px colore: green; border-radius: 6rem;" class="detail-img" src="/productimage/{{$data->image}}" alt="">
                        </div>
                        
                        <div class="col-md-8">
                            <h1 style="font-size: 20px" class="mb-0 badge bg-danger ">About This Product
                                <a class="btn btn-warning  float-end" href="{{url('/')}}">Back</a>
                                            
                                            </h1> <br><hr>
                            <h2 class="mb-0">{{$data->title}}
                            <label style="font-size: 16px" class="float-end badge bg-danger " for="">Trending</label>
                        </h2>
                        <hr>
                        <label style="font-size: 17px" class="me-8" >Original Price : <s> 20% OFF</s></label>
                        <label style="font-size: 25px" class="fw-bold" >Selling Price :$ {{$data->price}}</label>
                        
                            <h4>Details : {{$data['description']}}</h4>
                            
                            <div class="col-md-4 ">
                                <div class="product-item">
                    <div class="down-content">

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
                        <hr>

                        <form action="{{url('addcart',$data->id)}}" method="POST">
                            @csrf
                            <input type="number" value="1" min="1" class="form-control" style="width: 100px" name="quantity">
                            <br>
                            <button type="submit" value="Add Cart" class="btn btn-success"> Add To<i class="fas fa-shopping-cart"></i></button>
                            {{-- <input  class="btn btn-primary" type="submit" value="Add Cart" > --}}
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @include('user.footer')









