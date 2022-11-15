<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    @include('admin.css')

    <style>
        .title_deg {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
        }

        .table_deg {
            border: 2px solid #fff;
            width: 70%;
            margin: auto;
            padding-top: 50px;
            text-align: center;
            margin-top: 20px;
            font-size: 17px;
        }

        .th_deg {
            background-color: green;
        }
    </style>

  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">

        <!-- partial:partials/_navbar.html -->
        @include('admin.header')

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <h1 class="title_deg">All Orders</h1>

                <div style="padding-left: 400px; padding-bottom: 30px;">
                    <form action="{{ url('search') }}" method="GET">
                        @csrf
                        <input type="text" style="color:#000;" name="search" placeholder="Search For Something">

                        <input type="submit" value="Search" class="btn btn-outline-primary">
                    </form>
                </div>

                <table class="table_deg">
                    <tr class="th_deg">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Delivery</th>
                        <th>Print PDF</th>
                    </tr>

                    @forelse($order as $order)

                    <tr>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->product_title }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->payment_status }}</td>
                        <td>{{ $order->delivery_status }}</td>
                        <td>
                            <img style="width: 200px; height: 320px;" src="/product/{{ $order->image }}" alt="">
                        </td>
                        <td>

                            @if($order->delivery_status=='processing')

                            <a href="{{ url('delivered', $order->id) }}" class="btn btn-primary" onclick="return confirm('Are you sure this product is delivered')">Delivery</a>

                            @else

                            <p style="color: green; font-size: 17px;">Delivered</p>

                            @endif
                        </td>

                        <td>
                            <a href="{{ url('print_pdf', $order->id) }}" class="btn btn-danger">Print PDF</a>
                        </td>
                    </tr>

                    @empty
                        <tr>
                            <td colspan="16">
                                No Data Found
                            </td>
                        </tr>
                    @endforelse

                </table>

            </div>
        </div>

        <!-- main-panel ends -->

      </div>

      <!-- page-body-wrapper ends -->

    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
