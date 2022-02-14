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
							
							@if(   $products->count() > 0)
								@foreach($products as $product)
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
							@else
							<div class="alert alert-info">
								Sorry!! No Product Found on your search Keyword<strong> {{$searchResult}}</strong>
							</div>
							@endif


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