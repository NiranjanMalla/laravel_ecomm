<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">

        @foreach ($product as $products)


          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{ route('product_detail',$products->id) }}" class="option1">
                      Details
                      </a>
                      <a href="" class="option2">
                      Buy Now
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="product/{{ $products->image }}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      {{ $products->title }}
                   </h5>

                   @if ($products->discount_price!=0)

                   <h6 style="color: blue;">
                    <span>Discount</span>
                    ${{ $products->discount_price }}
                 </h6>
                   <h6 style="color:red; text-decoration:line-through;">
                      ${{ $products->price }}
                   </h6>

                   @else

                   <h6 style="color:blue;">
                    ${{ $products->price }}
                 </h6>



                   @endif

                </div>
             </div>
          </div>

          @endforeach

       </div>


       {{-- to show the more products as if there are more than 10 products to show in the page for paginagation use following --}}
       <span class="bg-secondary">
            {!! $product->WithQueryString()->links('pagination::bootstrap-5') !!}

        </span>
       {{-- <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div> --}}
    </div>
 </section>
