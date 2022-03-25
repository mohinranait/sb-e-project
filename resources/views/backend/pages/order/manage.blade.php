@extends('backend.layout.template')


@section('body-content')

    <section>
        <div class="br-mainpanel">
            <div class="br-pagetitle" style="background-image:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)">
                <i class="icon ion-ios-home-outline"></i>
                <div>
                    <h4>All Brands</h4>
                    <p class="mg-b-0" style="color:#555">All Brand Information</p>
                </div>
            </div>
            <!-- body content start -->
            <div class="container mt-4">
                
                <div class="card bd-0">
                    <div class="card-header tx-medium ">
                        Description
                    </div><!-- card-header -->
                    <div class="card-body bd bd-t-0 rounded-bottom">
                        <table class="table table-bordered table-colored table-info">
                            <thead>
                                <tr>
                                    <th class="wd-5p">ID</th>
                                    <th class="wd-20p">Name</th>
                                    <th class="wd-20p">Email</th>
                                    <th class="wd-12p">Phone</th>
                                    <th class="wd-10p">Amount</th>
                                    <th class="wd-15p">TxtID</th>
                                    <th class="wd-20p">status</th>
                                    <th class="wd-20p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach($orders as $item)
                                <tr>
                                    <th scope="row">{{$i}}</th>
                                    <td>{{$item->first_name}} {{$item->last_name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->amount}} ৳</td>
                                    <td>{{$item->transaction_id}}</td>
                                    <td>
                                        @if( $item->status == 4)
                                        <span class='badge badge-danger'>Cancled</span>
                                        @elseif( $item->status == 1)
                                        <span class='badge badge-info'>Prosessing</span>
                                        @elseif( $item->status == 2)
                                        <span class='badge badge-warning'>Hold</span>
                                        @elseif( $item->status == 3)
                                        <span class='badge badge-success'>Delevery Success</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class='d-flex '>
                                            <a href="{{route('order.show', $item->id)}}" class='btn btn-info btn-sm text-white '>VIEW</a>
                                            <a href="" class='btn btn-primary btn-sm text-white mx-2'>EDIT</a>
                                            <a href="" class='btn btn-danger btn-sm text-white'>DELETE</a>
                                        </div>
                                    </td>
                                </tr>
                                @php $i++ @endphp
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div><!-- card-body -->
                </div>
                
            </div><!---container-->
            <!-- body content end -->  
        </div>
    </section>


@endsection