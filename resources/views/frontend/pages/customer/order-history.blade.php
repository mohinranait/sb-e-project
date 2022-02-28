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

										<!-- order history tab manage code start -->
                    <div class="row">
                      <div class="col-2">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                          <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">BUY</a>
                          <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">SELL</a>
                          <!-- <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                          <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a> -->
                        </div>
                      </div>
                      <div class="col-10">
                        <div class="tab-content" id="v-pills-tabContent">
                          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <!-- order history table code start -->
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row">SL</th>
                                        <th>Order ID</th>
                                        <th>Order Date</th>
                                        <th>Items</th>
                                        <th>Totle Amount</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>102154</td>
                                        <td>10 january 2022</td>
                                        <td>
                                            <a href="#" class='btn btn-info btn-sm'  >Details</a>
                                        </td>
                                        <td>20000</td>
                                        <td>Barguna</td>
                                        <td>
                                            <span class='badge badge-success'>Delevery</span>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            <!-- order history table code end -->

                          </div>
                          <div class="tab-pane fade p-3" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea distinctio atque consequatur fugit aliquam illum quasi odit ducimus vitae cupiditate odio porro rem, reprehenderit doloremque excepturi harum sequi. Quibusdam, vero!</div>
                          <!-- <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">Message</div>
                          <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">Setting</div> -->
                        </div>
                      </div>
                    </div>
										<!-- order history tab manage code end -->

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