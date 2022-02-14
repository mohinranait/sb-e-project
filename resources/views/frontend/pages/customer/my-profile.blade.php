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

										<div class="row">
											<div class="col-lg-3">
												@if(!empty(Auth::user()->image))
												<img src="{{asset('backend/img/user/' . Auth::user()->image)}}" class='img-fluid' alt="">
												@else
												<img src="{{asset('frontend/img/img_avatar.png')}}" class='img-fluid' alt="">
												@endif
												
											</div>
											<div class="col-lg-9">
												<div class="row">
													<div class="col-lg-6">
														<table class="table table-bordered table-striped">
															<tbody>
																<tr>
																	<th>Name</th>
																	<td>{{Auth::user()->name}}</td>
																</tr>
																<tr>
																	<th>Email</th>
																	<td>{{Auth::user()->email}}</td>
																</tr>
																<tr>
																	<th>Mobile</th>
																	<td>
																		@if( !empty(Auth::user()->phone))
																		{{ Auth::user()->phone }}
																		@else 
																		-N/A-
																		@endif
																	</td>
																</tr>
																<tr>
																	<th>Profile</th>
																	<td>
																		@if( Auth::user()->status == 1)
																			@if( Auth::user()->phone )
																				@if( Auth::user()->image)
																				<span class='badge badge-success'>Active</span>
																				@else
																				<span class='badge badge-info'>Your profile is missing</span>
																				@endif
																			@else
																			<span class='badge badge-danger'>You must update your profile to activate it</span>
																			@endif
																		@else
																		<span class='badge badge-danger'>Pending</span>
																		@endif
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
													<div class="col-lg-6">
														<table class="table table-bordered table-striped">
															<tbody>
																<tr>
																	<th>Address</th>
																	<td>
																		@if( !empty(Auth::User()->address))
																		{{Auth::User()->address}}
																		@else
																		-N/A-
																		@endif
																	</td>
																</tr>
																<tr>
																	<th>City</th>
																	<td>
																		@if( !empty(Auth::User()->city))
																		{{Auth::User()->city}}
																		@else
																		-N/A-
																		@endif
																	</td>
																</tr>
																<tr>
																	<th>Cuntry</th>
																	<td>
																		@if( !empty(Auth::User()->cuntry))
																		{{Auth::User()->cuntry}}
																		@else
																		-N/A-
																		@endif
																	</td>
																</tr>
																<tr>
																	<th>Zip Code</th>
																	<td>
																		@if( !empty(Auth::User()->zipcode))
																		{{Auth::User()->zipcode}}
																		@else
																		-N/A-
																		@endif
																	</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
												<a href="{{route('customer-profile.edit', Auth::user()->id)}}" class='btn btn-info ms-auto'>Update Profile</a>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection