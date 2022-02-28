@extends("frontend.layout.template")

@section('body-content')

	<div role="main" class="main shop py-4">

		<div class="container">

			

			<div class="row">
				<div class="col-lg-9">

					<div class="accordion accordion-modern" id="accordion">
						<div class="card card-default">
							<div class="card-header">
								<h4 class="card-title m-0">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
										Shipping Address
									</a>
								</h4>
							</div>
							<div id="collapseOne" class="collapse show">
								<div class="card-body">
									<form action="{{route('make-payment')}}"  method="POST" id="frmBillingAddress"  class="needs-validation">
										<input type="hidden" value="{{ csrf_token() }}" name="_token" />
										<div class="form-row">
											<div class="form-group col-lg-6">
												<label class="font-weight-bold text-dark text-2">First Name</label>
												<input type="text" name="first_name" value="" class="form-control">
											</div>
											<div class="form-group col-lg-6">
												<label class="font-weight-bold text-dark text-2">Last Name</label>
												<input type="text" name="last_name" value="" class="form-control">
											</div>
										</div>

										<div class="form-row">
											<div class="form-group col-lg-6">
												<label class="font-weight-bold text-dark text-2">E-mail Address</label>
												<input type="text" name="email" value="" class="form-control">
											</div>
											<div class="form-group col-lg-6">
												<label class="font-weight-bold text-dark text-2">Mobile</label>
												<input type="text" name='phone' value="" class="form-control">
											</div>
										</div>

										<div class="form-row">
											<div class="form-group col">
												<label class="font-weight-bold text-dark text-2">Shipping Address </label>
												<input type="text" name='address' value="" class="form-control">
											</div>
										</div>

										<div class="form-row">
											<div class="form-group col-lg-6">
												<label class="font-weight-bold text-dark text-2">Division</label>
												<select name="division" class='form-control' id="">
													<option value="">Select Division</option>
													@foreach( $divisions as $division)
													<option value="{{$division->id}}">{{$division->name}}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group col-lg-6">
												<label class="font-weight-bold text-dark text-2">District</label>
												<select name="district" class='form-control' id="">
													<option value="">Select District</option>
													@foreach( $districts as $district)
													<option value="{{$district->id}}">{{$district->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										
										<div class="form-row">
											<div class="form-group col">
												<label class="font-weight-bold text-dark text-2">Post Code </label>
												<input type="text" name='post_code' class='form-control'>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col">
												<label class="font-weight-bold text-dark text-2">Cuntry </label>
												
												<select name="cuntry" class='form-control' id="">
													<option value="">Select District</option>
													@foreach( $cuntrys as $cuntry)
													<option value="{{$cuntry->id}}">{{$cuntry->cuntry}}</option>
													@endforeach
												</select>
											</div>
										</div>

										<div class="form-row">
											<div class="form-group col">
												<label class="font-weight-bold text-dark text-2">Message  </label>
												<textarea name="message" class="form-control" id="" cols="30" rows="3" placeholder='Write your masseg to us...'></textarea>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col">
												<input type="hidden" name='ammount' value="{{App\Models\Card::totalPrice()}}">
												<input type="submit" value="Place order" class="btn btn-xl btn-light pr-4 pl-4 text-2 font-weight-semibold text-uppercase float-right mb-2" data-loading-text="Loading...">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						
						<div class="card card-default">
							<div class="card-header">
								<h4 class="card-title m-0">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
										Review &amp; Payment
									</a>
								</h4>
							</div>
							<div id="collapseThree" class="collapse">
								<div class="card-body">
									@if( $cards->count() > 0)
									<table class="shop_table cart">
										<thead>
											<tr>
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
											@foreach($cards as $card)
											<tr class="cart_table_item">
												<td class="product-thumbnail">
													@if( $card->products->images->count() > 0)
													<a href="{{'product-details'}}/{{$card->products->slug}}">
														<img width="100" height="100" alt="" class="img-fluid" src="{{asset('backend/img/product/' . $card->products->images->first()->image)}}">
													</a>
													@endif
												</td>
												<td class="product-name">
													<a href="{{'product-details'}}/{{$card->products->slug}}">{{$card->products->name}}</a>
												</td>
												<td class="product-price">
													<span class="amount">
														@if( !empty($card->products->offer_price) )
															{{$card->products->offer_price}} BDT
														@else
															{{$card->products->regular_price}} BDT
														@endif
													</span>
												</td>
												<td class="product-quantity">
													{{$card->product_qty}}
												</td>
												<td class="product-subtotal">
													<span class="amount">
														@if(!empty($card->products->offer_price))
															{{ $card->products->offer_price * $card->product_qty}} BDT
														@else
														{{ $card->products->regular_price * $card->product_qty}} BDT
														@endif
													</span>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
									@else
									<div class="alert alert-info">No Items Found</div>
									@endif
									
					
									<hr class="solid my-5">
					
									<h4 class="text-primary">Cart Totals</h4>
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
					
									<hr class="solid my-5">
					
									<h4 class="text-primary">Payment</h4>
					
									<form action="/" id="frmPayment" method="post">
										<div class="form-row">
											<div class="form-group col">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="paymentdirectbank">
													<label class="custom-control-label" for="paymentdirectbank">Direct Bank Transfer</label>
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="paymentcheque">
													<label class="custom-control-label" for="paymentcheque">Cheque Payment</label>
												</div>
											</div>
										</div>
										<div class="form-row">
											<div class="form-group col">
												<div class="custom-control custom-checkbox">
													<input type="checkbox" class="custom-control-input" id="paymentpaypal">
													<label class="custom-control-label" for="paymentpaypal">Paypal</label>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					
					<div class="actions-continue">
						<input type="submit" value="Place Order" name="proceed" class="btn btn-primary btn-modern text-uppercase mt-5 mb-5 mb-lg-0">
					</div>

				</div>
				<div class="col-lg-3">
					<h4 class="text-primary">Cart Totals</h4>
					<table class="cart-totals">
						<tbody>
							<tr class="cart-subtotal">
								<th>
									<strong class="text-dark">Cart Subtotal</strong>
								</th>
								<td>
									<strong class="text-dark"><span class="amount">$431</span></strong>
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
									<strong class="text-dark"><span class="amount">$431</span></strong>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

		</div>

	</div>

@endsection