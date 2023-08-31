<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>

      <base href="/public">
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')

         {{-- SHOW CART  --}}

         <div class="container mt-5">

            <table class="table table-dark">
              <thead>
                <tr>
                  <th>Product Name</th>
                  <th>price</th>
                  <th>quantity</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>


                <?php $totalprice=0 ?>

                @foreach ($cart as $cart)


                <tr>
                  <td>{{ $cart->product_title }}</td>
                  <td>{{ $cart->price }}</td>
                  <td>{{ $cart->quantity }}</td>
                  <td><img src="/product/{{ $cart->image }}" alt="" style="height: 100px; width:100px;"></td>
                  <td><a class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="REMOVE" href="{{ route('remove_cart',$cart->id) }}" onclick="return confirm('Are you sure to remove this item?')"><i class="fa fa-minus-circle" aria-hidden="true"></i></a></td>
                </tr>

                <?php $totalprice=$totalprice + $cart->price ?>

                @endforeach


              </tbody>
            </table>

            <div>
                <h1 class="h1 bg-primary">Total Price : {{ $totalprice }}</h1>
            </div>

          </div>


         <!-- end header section -->
         <!-- slider section -->
         {{-- @include('home.slider') --}}
         <!-- end slider section -->
      </div>





      <!-- why section -->
        {{-- @include('home.why')
      <!-- end why section -->

      <!-- arrival section -->
      @include('home.arrival')
      <!-- end arrival section -->

      <!-- product section -->
      @include('home.product')
      <!-- end product section -->

      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.client') --}}
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
