@extends("frontend.layout.template")

@section('body-content')

	<div role="main" class="main shop py-4">

		<div class="container">

			<div class="row">
				<div class="col">

					<div class="featured-boxes">
						<div class="row">
							<div class="col">
								<div class="featured-box featured-box-primary text-left mt-2">
									<div class="box-content">
										
										
										<table class="shop_table cart">
											<thead>
												<tr>
													<th class="product-remove">
														&nbsp;
													</th>
													<th class="product-thumbnail">
														&nbsp;
													</th>
													<th class="product-name">
														Product
													</th>
													<th class="product-price">
														Price
													</th>
													<th class="product-quantity">
														Quantity
													</th>
													<th class="product-subtotal">
														Total
													</th>
												</tr>
											</thead>
											<tbody>
												@php $totalPrice = 0 @endphp
												@if( $cardProduct->count() > 0)
												@foreach($cardProduct as $item)
												<tr class="cart_table_item">
													<td class="product-remove">
														<form action="{{route('card.destroy',$item->id)}}" method='POST'>
															@csrf 
															<button type='submit' title="Remove this item" class="remove remove-card-item-page">
																<i class="fas fa-times"></i>
															</button>
														</form>
													</td>
													<td class="product-thumbnail">
														@if( $item->products->images->count() > 0 )
														<a href="{{route('product-details', $item->products->slug)}}">
															<img width="100" height="100" alt="" class="img-fluid" src="{{asset('backend/img/product/'.$item->products->images->first()->image)}}">
														</a>
														@endif
													</td>
													<td class="product-name">
														<a href="{{route('product-details', $item->products->slug)}}">{{$item->products->name}}</a>
													</td>
													<td class="product-price">
														<span class="amount">
													@if(!empty($item->products->offer_price))
													{{$item->products->offer_price}} BDT
													@else
													{{$item->products->regular_price}} BDT
													@endif
														</span>
													</td>
													<td class="product-quantity">
													<form action="{{route('card.update', $item->id)}}" method="POST" class="cart">
														@csrf 
														<div class="quantity">
															<input type="submit"  class="minus" value="-">
															<input type="text" class="input-text qty text" title="Qty" value="{{$item->product_qty}}" name="quantity" min="1" step="1">
															<input type="submit"  class="plus" value="+">
														</div>
													</form>
													</td>
													<td class="product-subtotal">
														<span class="amount">
															@if(!empty($item->products->offer_price))
															{{$totalPrice = $item->products->offer_price * $item->product_qty;}} BDT
															@else
															{{$totalPrice = $item->products->regular_price * $item->product_qty;}} BDT
															@endif
														</span>
													</td>
												</tr>
												@endforeach
												@else
												<p class="alert alert-info text-center">
													No Item Found In your Card
												</p>
												@endif
											
												<!-- <tr>
													<td class="actions" colspan="6">
														<div class="actions-continue">
															<input type="submit" value="Update Cart" name="update_cart" class="btn btn-xl btn-light pr-4 pl-4 text-2 font-weight-semibold text-uppercase">
														</div>
													</td>
												</tr> -->
											</tbody>
										</table>
								
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="featured-boxes">
						<div class="row">
							<div class="col-sm-6">
								
							</div>
							<div class="col-sm-6">
								<div class="featured-box featured-box-primary text-left mt-3 mt-lg-4">
									<div class="box-content">
										<h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Cart Totals</h4>
										<table class="cart-totals">
											<tbody>
												<tr class="cart-subtotal">
													<th>
														<strong class="text-dark">Cart Subtotal</strong>
													</th>
													<td>
														<strong class="text-dark"><span class="amount">{{App\Models\Card::totalPrice()}} BDT</span></strong>
													</td>
												</tr>
												<tr class="shipping">
													<th>
														Shipping
													</th>
													<td>
														Free Shipping<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
													</td>
												</tr>
												<tr class="total">
													<th>
														<strong class="text-dark">Order Total</strong>
													</th>
													<td>
														<strong class="text-dark"><span class="amount">{{App\Models\Card::totalPrice()}} BDT</span></strong>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col">
							<div class="actions-continue">
								<a href="{{route('checkout')}}" class="btn btn-primary btn-modern text-uppercase">Proceed to Checkout <i class="fas fa-angle-right ml-1"></i></a>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>

	</div>

@endsection