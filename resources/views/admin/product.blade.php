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
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->
        {{-- @include('admin.body') --}}
        <div class="main-panel">
            <div class="content-wrapper">

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        {{ session()->get('message') }}
                    </div>

                @endif
                <div class="">
                    <h2>Add Product</h2>

                    <form action="{{ route('add_product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label class="form-check-label" for="Product Title">Product Title :</label>
                        <input type="text" name="title" placeholder="write Product Name" class="input_textcolor form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-check-label" for="Product Description">Product Description :</label>
                        <input type="text" name="description" placeholder="write Description" class="input_textcolor form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-check-label" for="Product category">Product Category :
                            <select name="category" class="input_textcolor form-control" required>
                                @foreach ($category as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                @endforeach

                            </select>
                        </label>


                    </div>
                    <div class="mb-2">
                        <label class="form-check-label" for="Product Quantity">Product Quantity :</label>
                        <input type="number" name="quantity" placeholder="write Product Quantity" class="input_textcolor form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-check-label" for="Product Price">Product Price :</label>
                        <input type="text" name="price" placeholder="write Product Price" class="input_textcolor form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-check-label" for="Product Discount Price">Product Discount Price :</label>
                        <input type="number" name="des_price" placeholder="write Product Discount Price" class="input_textcolor form-control">
                    </div>
                    <div class="mb-2">
                        <label class="form-check-label" for="Product Image">Product Discount Image :</label>
                        <input type="file" name="image" required>
                    </div>

                    <div class="mb-2">
                        <input type="submit" name="submit" value="Add Product" class="btn btn-success">
                    </div>


                    </form>


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
