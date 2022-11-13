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
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />

      <style>
        .center{
            margin: auto 33%;
            width: 50%;
            text-align: center;
            padding: 100px;
        }

        table, th, td {
            border: solid 1px grey;
            font-size: 16px;
        }

        .th_deg {
            font-size: 20px;
            padding: 5px;
            background: rgb(195, 233, 252);
        }

        .img_deg {
            widows: 200px;
            height: 300px;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">

         <!-- header section strats -->
            @include('home.header')
         <!-- end header section -->

         @if(session()->has('message'))

            <div class="alert alert-success">
                <button class="close" type="button" data-dismiss="alert" aria-hidden="true">X</button>
                {{ session()->get('message') }}
            </div>

        @endif

      <div class="center">
        <table>
            <tr>
                <th class="th_deg">Product Title</th>
                <th class="th_deg">Product Quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Action</th>
            </tr>

            <?php $totalprice=0; ?>

            @foreach($cart as $cart)
            <tr>
                <td>{{ $cart->product_title }}</td>
                <td>{{ $cart->quantity }}</td>
                <td>${{ $cart->price }}</td>
                <td><img class="img_deg" src="/product/{{ $cart->image }}" alt=""></td>
                <td>
                    <a href="{{ url('/remove_cart', $cart->id) }}" onclick="return confirm('Are you sure to remove this product?')"
                        class="btn btn-danger">Delete</a>
                </td>
            </tr>

            <?php $totalprice=$totalprice + $cart->price ?>

            @endforeach

        </table>

        <div class="alert alert-info" style="width: 42%;">
            <h1>Total Price: ${{ $totalprice }}</h1>
        </div>

        <div style="padding-top: 20px;">
            <h1 style="font-size: 20px;">Proceed to Order</h1><br>

            <a href="{{ url('cash_order') }}" class="btn btn-dark">Cash On Delivery</a>
            <a href="{{ url('stripe', $totalprice) }}" class="btn btn-success">Pay Using Card</a>
        </div>

      </div>

      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->


      <div class="cpy_">
         <p class="mx-auto">&copy; {{ date('Y') }} All Rights Reserved By <span style="color: red"> Andrei C.</span><br></p>
      </div>

      <!-- jQery -->
      <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
      <!-- popper js -->
      <script src="{{ asset('home/js/popper.min.js') }}"></script>
      <!-- bootstrap js -->
      <script src="{{ asset('home/js/bootstrap.js') }}"></script>
      <!-- custom js -->
      <script src="{{ asset('home/js/custom.js') }}"></script>
   </body>
</html>
