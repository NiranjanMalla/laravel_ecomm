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
                        {{ session()->get('message') }}
                    </div>

                @endif
                <div class="div_center">
                    <h2>Add Category</h2>

                    <form action="{{ route('add_category') }}" method="POST">
                    @csrf
                        <input type="text" name="category" placeholder="write category Name" class="input_textcolor">
                        <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
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
