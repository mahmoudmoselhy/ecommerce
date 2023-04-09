


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
        <div style="padding-bottom:30px;" class="container-fluid page-body-wrapper">
            <div class="container" align="center">

                @if(session()->has('message'))
        <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{session()->get('message')}}
        </div>
        @endif

                <table>
                    
                <tr style="background-color: rgb(129, 129, 126)">
                    <td style="padding: 20px;">Id</td>
                    <td style="padding: 20px;">Name</td>
                    <td style="padding: 20px;">Email</td>
                    <td style="padding: 20px;">Phone</td >
                    <td style="padding: 20px;">Address</td>
                    <td style="padding: 20px;">Usertype</td>
                    <td style="padding: 20px;">Add Admin</td>
                    <td style="padding: 20px;">Delete</td>


                </tr>
                @foreach ($data as $user)
                    
                

                <tr align="center" style="background-color: rgb(10 13 22); ">
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td >
                    <td>{{$user->address}}</td>
                    <td>{{$user->usertype}}</td>

                    <td>
                        <a class="btn btn-primary" href="{{url('addadmin',$user->id)}}">Add Admin</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" onclick="return confirm('Are You Sure ')" href="{{url('deleteuser',$user->id)}}">Delete</a>
                    </td>

                </tr>
                @endforeach

                </table>
            </div>
        </div>
          <!-- partial -->
      @include('admin.script')
  </body>
</html>