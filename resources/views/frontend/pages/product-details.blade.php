@extends("frontend.layout.template")

@section('body-content')

	<div role="main" class="main shop py-4">

		<div class="container">

			<div class="row">
				@include('frontend.includes.left-sidebar')
				<div class="col-lg-9">
					<div class="row">
						<div class="col-lg-6">

							<div class="owl-carousel owl-theme" data-plugin-options="{'items': 1, 'margin': 10}">
								@php $i = 1 @endphp
								@foreach( $products->images as $img)
									@if( $i > 0)
									<div>
										<img alt="" height="300" class="img-fluid" src="{{ asset('backend/img/product/' . $img->image)}}">
									</div>
									@endif
									@php $i++ @endphp
								@endforeach
								
							</div>
						</div>

						<div class="col-lg-6">

							<div class="summary entry-summary">
								<h1 class="mb-0 font-weight-bold text-7">{{ $products->name}}</h1>

								<div class="pb-0 clearfix">
									<div title="Rated 3 out of 5" class="float-left">
										<input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
									</div>

									<div class="review-num">
										<span class="count" itemprop="ratingCount">2</span> reviews
									</div>
								</div>

								<p class="price">
									
									@if( $products->is_fiture == 0)
										<span class="amount">{{ $products->regular_price}}৳</span>									
										@elseif($products->is_fiture == 1)
											<del><span class="amount" style='font-size:15px'>{{ $products->regular_price}}</span></del>

											<span class="amount">{{ $products->offer_price}}৳</span>
										@endif
								</p>

								<p class="">{{ substr(strip_tags($products->description) , 0 , 150) }} </p>

								<p class=""><strong>Quentity </strong> : 
									@if( $products->quentity > 0)
										{{$products->quentity}} Pcs Available
									@else
									<span class='badge badge-danger'>Stock Out</span>
									@endif
								</p>

								<form action="{{route('card.store')}}" enctype="multipart/form-data"  method="POST" class="cart">
									@csrf 
									<div class="quantity quantity-lg">
										<input type="hidden" name='productid' value="{{$products->id}}">
										<input type="button" class="minus" value="-">
										<input type="text" class="input-text qty text" title="Qty" value="1" name="product_qty" min="1" step="1">
										<input type="button" class="plus" value="+">
									</div>
									<button type="submit" class="btn btn-primary btn-modern text-uppercase">Add to cart</button>
								</form>

								<div class="product-meta">
									<span class="posted-in">Categories: <a rel="tag" href="#">{{ $products->category->title; }}</a> <a rel="tag" href="#"></a></span>
								</div>

							</div>


						</div>
					</div>

					<div class="row">
						<div class="col">
							<div class="tabs tabs-product mb-2">
								<ul class="nav nav-tabs">
									<li class="nav-item active"><a class="nav-link py-3 px-4" href="#productDescription" data-toggle="tab">Description</a></li>
									<li class="nav-item"><a class="nav-link py-3 px-4" href="#productInfo" data-toggle="tab">Additional Information</a></li>
									<li class="nav-item"><a class="nav-link py-3 px-4" href="#productReviews" data-toggle="tab">Reviews (2)</a></li>
								</ul>
								<div class="tab-content p-0">
									<div class="tab-pane p-4 active" id="productDescription">
										<p>{{$products->description}}</p>
										
									</div>
									<div class="tab-pane p-4" id="productInfo">
										<table class="table m-0">
											<tbody>
												<tr>
													<th class="border-top-0">
														Size:
													</th>
													<td class="border-top-0">
														Unique
													</td>
												</tr>
												<tr>
													<th>
														Colors
													</th>
													<td>
														Red, Blue
													</td>
												</tr>
												<tr>
													<th>
														Material
													</th>
													<td>
														100% Leather
													</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="tab-pane p-4" id="productReviews">
										<ul class="comments">
											<li>
												<div class="comment">
													<div class="img-thumbnail border-0 p-0 d-none d-md-block">
														<img class="avatar" alt="" src="{{asset('frontend/img/avatars/avatar-2.jpg')}}">
													</div>
													<div class="comment-block">
														<div class="comment-arrow"></div>
														<span class="comment-by">
															<strong>Jack Doe</strong>
															<span class="float-right">
																<div class="pb-0 clearfix">
																	<div title="Rated 3 out of 5" class="float-left">
																		<input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
																	</div>
							
																	<div class="review-num">
																		<span class="count" itemprop="ratingCount">2</span> reviews
																	</div>
																</div>
															</span>
														</span>
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
													</div>
												</div>
											</li>
											<li>
												<div class="comment">
													<div class="img-thumbnail border-0 p-0 d-none d-md-block">
														<img class="avatar" alt="" src="{{asset('frontend/img/avatars/avatar.jpg')}}">
													</div>
													<div class="comment-block">
														<div class="comment-arrow"></div>
														<span class="comment-by">
															<strong>John Doe</strong>
															<span class="float-right">
																<div class="pb-0 clearfix">
																	<div title="Rated 3 out of 5" class="float-left">
																		<input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
																	</div>
							
																	<div class="review-num">
																		<span class="count" itemprop="ratingCount">2</span> reviews
																	</div>
																</div>
															</span>
														</span>
														<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra odio, gravida urna varius vitae, gravida pellentesque urna varius vitae.</p>
													</div>
												</div>
											</li>
										</ul>
										<hr class="solid my-5">
										<h4>Add a review</h4>
										<div class="row">
											<div class="col">
							
												<form action="" id="submitReview" method="post">
													<div class="form-row">
														<div class="form-group col pb-2">
															<label class="required font-weight-bold text-dark">Rating</label>
															<input type="text" class="rating-loading" value="0" title="" data-plugin-star-rating data-plugin-options="{'color': 'primary', 'size':'xs'}">
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col-lg-6">
															<label class="required font-weight-bold text-dark">Name</label>
															<input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" required>
														</div>
														<div class="form-group col-lg-6">
															<label class="required font-weight-bold text-dark">Email Address</label>
															<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" required>
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col">
															<label class="required font-weight-bold text-dark">Review</label>
															<textarea maxlength="5000" data-msg-required="Please enter your review." rows="8" class="form-control" name="review" id="review" required></textarea>
														</div>
													</div>
													<div class="form-row">
														<div class="form-group col mb-0">
															<input type="submit" value="Post Review" class="btn btn-primary btn-modern" data-loading-text="Loading...">
														</div>
													</div>
												</form>
											</div>
							
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<hr class="solid my-5">

					<h4 class="mb-3">Related <strong>Products</strong></h4>
					
					<div class="masonry-loader masonry-loader-showing">
						<div class="row products product-thumb-info-list mt-3" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
							@foreach( $productsRel as $item)
							<div class="col-12 col-sm-6 col-lg-4 product">
								<span class="product-thumb-info border-0 ">
									<form action="{{route('card.store')}}" method="POST">
										@csrf 
										<a class="add-to-cart-product bg-color-primary">
											<input type="hidden" name='productid' value="{{$item->id}}">
											<input type="submit" value='Add to Cart' class='w-100 btn-sm text-white' style='background:transparent;border:none'>
										</a>
									</form>
									
									@if( $item->images->count() > 0 )
									<a href="{{route('product-details' , $item->slug)}}">
										<span class="product-thumb-info-image">
											<img alt="" class="img-fluid" src="{{asset('backend/img/product/'. $item->images->first()->image)}}">
										</span>
									</a>
									@endif
									<span class="product-thumb-info-content product-thumb-info-content pl-0 bg-color-light text-center">
										<a href="{{route('product-details' , $item->slug)}}">
											<h4 class="text-4 text-primary">{{$item->name}}</h4>
											<span class="price">
												<span class="amount text-dark font-weight-semibold">
													@if( !empty($item->offer_price))
													{{$item->offer_price}} TK
													@else
													{{$item->regular_price}} TK
													@endif
												</span>
											</span>
										</a>
									</span>
								</span>
							</div>
							@endforeach
						</div>
					</div>

				</div>
			</div>
		</div>

	</div>

@endsection