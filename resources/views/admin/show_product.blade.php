<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.styles')

    <style>
        .div_center{
            text-align: center;
            padding-top: 40px;
            margin-left: -30px;
        }

        .input_textcolor
        {
            color: black;
        }

        .center
        {
          margin: auto;
          width: 50%;
          text-align: center;
          margin-top: 30px;
          border: 3px solid blanchedalmond;
        }

    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        {{-- @include('admin.body') --}}
        <div class="main-panel">
            <div class="container-fluid content-wrapper">

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        {{ session()->get('message') }}
                    </div>

                @endif
                <div class="div_center">
                    <h2 class="p-5">Show Product</h2>

                    <table class="table table-hover p-2">
                  <tr>
                    <td>Title</td>
                    <td>Description</td>
                    <td>Category</td>
                    <td>Quantity</td>
                    <td>price</td>
                    <td>Discount Price</td>
                    <td>image</td>
                    <td>Action</td>
                  </tr>
                  @foreach ($product as $product)


                  <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->discount_price }}</td>
                    <td>
                        <img src="/product/{{ $product->image }}" alt="">
                    </td>
                    <td>update</td>
                  </tr>

                  @endforeach
                    </table>
                </div>
                </div>
            </div>

        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.scripts')
    <!-- End custom js for this page -->
  </body>
</html>
