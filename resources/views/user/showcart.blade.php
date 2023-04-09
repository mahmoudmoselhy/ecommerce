
@include('user.header')
<link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    
@if ($cart->count() >0)
    
    <div  style="padding: 100px;" align="center">
  <table>
    <tr style="border-radius: 6rem;"  class="card-header bg-primary text-white">
        <th style="padding: 10px 65px; font-size:20px;">remove</th>
        <th style="padding: 10px 65px; font-size:20px;">image</th>
        <th style="padding: 10px 65px; font-size:20px;">Product</th>
        <th style="padding: 10px 65px; font-size:20px;">Quantity</th>
        <th style="padding: 10px 65px; font-size:20px;">Total Price</th>
      </tr>

      <form action="{{url('order')}}" method="POST">
        @csrf
        @if ($total = 0)  @endif
      @foreach ($cart as $carts)
          
          <tr class="cart-list-devider" align="center">
              <td>
                <a class="btn btn-danger" href="{{url('delete',$carts->id)}}">Delete</a>
              </td>

            <td>
                <img  style="border-radius: 2rem;" height="100" width="100" src="/productimage/{{$carts->image}}" alt="">

            </td>
        
                    <td>
                  {{-- <input type="text" name="productname[]" value="{{$carts->product_title}}" hidden=""> --}}
                  <h2>{{$carts->product_title}}</h2> <br>
                  <input class="iprice" type="text"  value="{{$carts->price}}" hidden="">
                  <em style="color: brown; font-size:20px;">$ {{$carts->price}}</em></td>
                    </td>

            <td>
              {{-- <input class="form-control iquantity" onchange="subTotal()" style="width: 100px" type="number" value="{{$carts->quantity}}" > --}}
              <input class="form-control iquantity changequantity iquantity" onchange="subTotal()" style="width: 100px" type="number" value="{{$carts->quantity}}" >
            
            </td>

              <td class="itotale">
              {{-- <input type="text" name="price[]" value="{{$carts->price}}" hidden=""> --}}
              <em style="color: brown; font-size:20px;">$ {{$carts->price*$carts->quantity}}.00</em></td>
          </tr>
          
          @if ($total += $carts->price * $carts->quantity)  @endif

      @endforeach

  </table>
  <br>
  <h1 class="float-end" style="font-size: 20px; " id="gtotale">Total Price : <em style="color: brown">$ {{$total}}.00</em></h1>
  <hr><br>
  <a class="btn btn-warning float-end" href="{{url('/')}}">Back</a>
  <a class="btn btn-success" href="{{url('checkout')}}">checkout</a>
</form>
</div>

@else
<div class="container py-5">
  <div class="row">
      <div style="padding: 20px" class="col-md-12"> 
          <div class="card-body">
<div class="card-header">
  <div style=" border-radius: 6rem;" class="card-header bg-primary">
                  <h1 class="text-white" align="center" style="font-size: 40px;">Your Cart  <i style="color: brown" class="fas fa-shopping-cart"></i> Is Empty
  <a class="btn btn-warning float-end" href="{{url('/')}}">Back</a>
                  </h1>
        </div>
            </div>
</div>
        </div>
  </div>
</div>

@endif
@include('user.footer')



    {{-- <script>
      var gt=0;
      var iprice=document.getElementsByClassName('iprice');
      var iquantity=document.getElementsByClassName('iquantity');
      var itotale=document.getElementsByClassName('itotale');
      var gtotale=document.getElementsById('gtotale');

      function subTotal()
      {
        gt=0;
        for(i=0;i<iprice.length;i++)
        {
          itotale[i].innerText=(iprice[i].value)*(iquantity[i].value);
          gt=gt+(iprice[i].value)*(iquantity[i].value);
        }
        gtotale.innerText=gt;
      }
      subTotal();
      </script>  --}}