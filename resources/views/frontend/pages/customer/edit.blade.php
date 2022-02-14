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
                                                <form action="{{route('customer-profile.update',$userEdit->id)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf 
												    <div class="row">
													    <div class="col-lg-6">
                                                            
                                                            <div class="form-group">
                                                                <label for="">Full Name</label>
                                                                <input type="text" name='name' class='form-control' value="{{$userEdit->name}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Phone</label>
                                                                <input type="text" name='phone' class='form-control' value="{{$userEdit->phone}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Address</label>
                                                                <input type="text" name='address' class='form-control' value="{{$userEdit->address}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">City</label>
                                                                <input type="text" name='city' class='form-control' value="{{$userEdit->city}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" name='submit' class='btn btn-info' value="Save Change">
                                                            </div>
                                                       
													    </div>
													    <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="">Cuntry</label>
                                                                <select name="cuntry" class='form-control' id="">
                                                                    <option value="">-select Cuntry-</option>
                                                                    @foreach( $cuntrys as $cuntry)
                                                                    <option value="{{$cuntry->cuntry}}" @if( $cuntry->cuntry == Auth::User()->cuntry) selected @endif >{{$cuntry->cuntry}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Zip Code</label>
                                                                <input type="text" name='zipcode' class='form-control' value="{{$userEdit->zipcode}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Profile</label>
                                                                <br>
                                                                <input type="file" name='profile' class='form-file-control' >
                                                            </div>
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
				</div>
			</div>
		</div>
	</div>

@endsection