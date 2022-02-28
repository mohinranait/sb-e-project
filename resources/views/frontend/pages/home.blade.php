@if (\Session::has('register'))

	<div class="alert alert-primary alert-dismissible  text-center" role="alert">
		<strong>Congratulations </strong> {!! \Session::get('register') !!} ! . Thanks For Register.
	</div>
@endif
<!--  user Ragistr Congratulation -->
@extends('frontend.layout.template')

@section('body-content')

<div role="main" class="main shop py-4">

		<div class="container">
		

			<div class="row">
				<!-- left-sidebar file -->
				@include("frontend.includes.left-sidebar")
				

				<div class="col-lg-9">

					<div class="masonry-loader masonry-loader-showing">
						<div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">

							@foreach( $products as $product)
							<div class="col-sm-6 col-lg-4 product">
								<a href="shop-product-sidebar-left.html">
									@if( $product->is_fiture == 0)
									@elseif ( $product->is_fiture == 1)
										<span class="onsale">Sale!</span>
									@endif
									
								</a>
								<span class="product-thumb-info border-0">
									
									<a href="{{route('product-details' , $product->slug)}}">
										<span class="product-thumb-info-image">
										@php $j = 1 @endphp
										@foreach ( $product->images as $image)
											@if( $j > 0 )
											<img src="{{ asset('backend/img/product/' . $image->image)}}"  class="img-fluid" alt="">
											@endif
											@php $j-- @endphp
										@endforeach

										</span>
									</a>
									<a href="#" class="add-to-cart-product bg-color-primary">
										<span class="text-uppercase text-1">Add to Cart</span>
									</a>
									<span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
										<a class="text-center" href="{{route('product-details' , $product->slug)}}">
											<h4 class="text-4 text-primary">{{ $product->name}}</h4>
											@if( $product->is_fiture == 0)
											<span class="price">
												<ins><span class="pamount text-dark font-weight-semibold " >{{$product->regular_price}} ৳</span></ins>
											</span>
											@elseif($product->is_fiture == 1)
											<span class="price">
												<del><span class="amount">{{$product->regular_price}}</span></del>
												<ins><span class="pamount text-dark font-weight-semibold">{{ $product->offer_price}} ৳</span></ins>
											</span>
											@endif
											
										</a>
									</span>
								</span>
							</div>
							@endforeach


							<!-- <div class="col-sm-6 col-lg-4 product">
								<a href="shop-product-sidebar-left.html">
									<span class="onsale">Sale!</span>
								</a>
								<span class="product-thumb-info border-0">
									<a href="shop-cart.html" class="add-to-cart-product bg-color-primary">
										<span class="text-uppercase text-1">Add to Cart</span>
									</a>
									<a href="shop-product-sidebar-left.html">
										<span class="product-thumb-info-image">
											<img alt="" class="img-fluid" src="{{ asset('frontend/img/products/product-grey-1.jpg')}}">
										</span>
									</a>
									<span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
										<a href="shop-product-sidebar-left.html">
											<h4 class="text-4 text-primary">Photo Camera</h4>
											<span class="price">
												<del><span class="amount">$325</span></del>
												<ins><span class="amount text-dark font-weight-semibold">$299</span></ins>
											</span>
										</a>
									</span>
								</span>
							</div>
							<div class="col-sm-6 col-lg-4 product">
								<span class="product-thumb-info border-0">
									<a href="shop-cart.html" class="add-to-cart-product bg-color-primary">
										<span class="text-uppercase text-1">Add to Cart</span>
									</a>
									<a href="shop-product-sidebar-left.html">
										<span class="product-thumb-info-image">
											<img alt="" class="img-fluid" src="{{ asset('frontend/img/products/product-grey-2.jpg')}}">
										</span>
									</a>
									<span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
										<a href="shop-product-sidebar-left.html">
											<h4 class="text-4 text-primary">Golf Bag</h4>
											<span class="price">
												<span class="amount text-dark font-weight-semibold">$72</span>
											</span>
										</a>
									</span>
								</span>
							</div>
							<div class="col-sm-6 col-lg-4 product">
								<span class="product-thumb-info border-0">
									<a href="shop-cart.html" class="add-to-cart-product bg-color-primary">
										<span class="text-uppercase text-1">Add to Cart</span>
									</a>
									<a href="shop-product-sidebar-left.html">
										<span class="product-thumb-info-image">
											<img alt="" class="img-fluid" src="{{ asset('frontend/img/products/product-grey-3.jpg')}}">
										</span>
									</a>
									<span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
										<a href="shop-product-sidebar-left.html">
											<h4 class="text-4 text-primary">Workout</h4>
											<span class="price">
												<span class="amount text-dark font-weight-semibold">$60</span>
											</span>
										</a>
									</span>
								</span>
							</div>
							<div class="col-sm-6 col-lg-4 product">
								<span class="product-thumb-info border-0">
									<a href="shop-cart.html" class="add-to-cart-product bg-color-primary">
										<span class="text-uppercase text-1">Add to Cart</span>
									</a>
									<a href="shop-product-sidebar-left.html">
										<span class="product-thumb-info-image">
											<img alt="" class="img-fluid" src="{{ asset('frontend/img/products/product-grey-4.jpg')}}">
										</span>
									</a>
									<span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
										<a href="shop-product-sidebar-left.html">
											<h4 class="text-4 text-primary">Luxury bag</h4>
											<span class="price">
												<span class="amount text-dark font-weight-semibold">$199</span>
											</span>
										</a>
									</span>
								</span>
							</div>
							<div class="col-sm-6 col-lg-4 product">
								<span class="product-thumb-info border-0">
									<a href="shop-cart.html" class="add-to-cart-product bg-color-primary">
										<span class="text-uppercase text-1">Add to Cart</span>
									</a>
									<a href="shop-product-sidebar-left.html">
										<span class="product-thumb-info-image">
											<img alt="" class="img-fluid" src="{{ asset('frontend/img/products/product-grey-5.jpg')}}">
										</span>
									</a>
									<span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
										<a href="shop-product-sidebar-left.html">
											<h4 class="text-4 text-primary">Ladies' handbag</h4>
											<span class="price">
												<span class="amount text-dark font-weight-semibold">$189</span>
											</span>
										</a>
									</span>
								</span>
							</div>
							<div class="col-sm-6 col-lg-4 product">
								<a href="shop-product-sidebar-left.html">
									<span class="onsale">Sale!</span>
								</a>
								<span class="product-thumb-info border-0">
									<a href="shop-cart.html" class="add-to-cart-product bg-color-primary">
										<span class="text-uppercase text-1">Add to Cart</span>
									</a>
									<a href="shop-product-sidebar-left.html">
										<span class="product-thumb-info-image">
											<img alt="" class="img-fluid" src="{{ asset('frontend/img/products/product-grey-6.jpg')}}">
										</span>
									</a>
									<span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
										<a href="shop-product-sidebar-left.html">
											<h4 class="text-4 text-primary">Baseball Cap</h4>
											<span class="price">
												<del><span class="amount">$25</span></del>
												<ins><span class="amount text-dark font-weight-semibold">$22</span></ins>
											</span>
										</a>
									</span>
								</span>
							</div>
							<div class="col-sm-6 col-lg-4 product">
								<span class="product-thumb-info border-0">
									<a href="shop-cart.html" class="add-to-cart-product bg-color-primary">
										<span class="text-uppercase text-1">Add to Cart</span>
									</a>
									<a href="shop-product-sidebar-left.html">
										<span class="product-thumb-info-image">
											<img alt="" class="img-fluid" src="{{ asset('frontend/img/products/product-grey-7.jpg')}}">
										</span>
									</a>
									<span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
										<a href="shop-product-sidebar-left.html">
											<h4 class="text-4 text-primary">Blue Ladies Handbag</h4>
											<span class="price">
												<span class="amount text-dark font-weight-semibold">$290</span>
											</span>
										</a>
									</span>
								</span>
							</div>
							<div class="col-sm-6 col-lg-4 product">
								<span class="product-thumb-info border-0">
									<a href="shop-cart.html" class="add-to-cart-product bg-color-primary">
										<span class="text-uppercase text-1">Add to Cart</span>
									</a>
									<a href="shop-product-sidebar-left.html">
										<span class="product-thumb-info-image">
											<img alt="" class="img-fluid" src="{{ asset('frontend/img/products/product-grey-8.jpg')}}">
										</span>
									</a>
									<span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
										<a href="shop-product-sidebar-left.html">
											<h4 class="text-4 text-primary">Military Rucksack</h4>
											<span class="price">
												<span class="amount text-dark font-weight-semibold">$49</span>
											</span>
										</a>
									</span>
								</span>
							</div>
							<div class="col-sm-6 col-lg-4 product">
								<a href="shop-product-sidebar-left.html">
									<span class="onsale">Sale!</span>
								</a>
								<span class="product-thumb-info border-0">
									<a href="shop-cart.html" class="add-to-cart-product bg-color-primary">
										<span class="text-uppercase text-1">Add to Cart</span>
									</a>
									<a href="shop-product-sidebar-left.html">
										<span class="product-thumb-info-image">
											<img alt="" class="img-fluid" src="{{ asset('frontend/img/products/product-grey-9.jpg')}}">
										</span>
									</a>
									<span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light">
										<a href="shop-product-sidebar-left.html">
											<h4 class="text-4 text-primary">Baseball</h4>
											<span class="price">
												<del><span class="amount">$15</span></del>
												<ins><span class="amount text-dark font-weight-semibold">$12</span></ins>
											</span>
										</a>
									</span>
								</span>
							</div> -->
						</div>
						<div class="row">
							<div class="col">
								<ul class="pagination float-right">
									<li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
									<li class="page-item active"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	

@endsection