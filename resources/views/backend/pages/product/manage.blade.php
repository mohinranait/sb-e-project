@extends('backend.layout.template')


@section('body-content')

    <section>

        <div class="br-mainpanel">
            <div class="br-pagetitle">
                <i class="icon ion-ios-home-outline"></i>
                <div>
                    <h4>All Product Information</h4>
                    <p class="mg-b-0">All products information board.</p>
                </div>
            </div>  

             
            <div class="m-4 p-4 bg-white">

                <div>
                    <table class="table table-bordered table-colored table-teal">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Offer Price</th>                                
                                <th>Fiture</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 @endphp
                            @foreach ( $products as $product)
                            <tr>
                                <th>{{ $i }}</th>
                                <td>
                                    @php $j = 1 @endphp
                                    @foreach ( $product->images as $image)
                                        @if( $j > 0 )
                                        <img src="{{ asset('backend/img/product/' . $image->image)}}" width='50px' alt="">
                                        @endif
                                        @php $j-- @endphp
                                    @endforeach
                                </td>
                                <td>{{ $product->name; }}</td>
                                <td>{{ $product->category->title; }}</td>
                                <td>{{ $product->brand->name }}</td>
                                <td>{{ $product->regular_price; }}</td>
                               
                                <td>
                                    @if ( !is_null($product->offer_price) )
                                        <span>{{$product->offer_price}}</span>
                                    @elseif( is_null($product->offer_price))
                                        <span>N/N</span>
                                    @endif
                                </td>
                                <td>
                                    @if ( $product->is_fiture == 1 )
                                        <span class='badge badge-success'>Active</span>
                                    @elseif( $product->is_fiture == 0)
                                        <span class='badge badge-danger'>In-Active</span>
                                    @endif
                                </td>
                                <td>
                                    @if ( $product->status == 1)
                                        <span class='badge badge-primary'>Active</span>
                                    @elseif ( $product->status == 2)
                                        <span class='badge badge-danger' >In-Active</span>
                                    @endif 
                                </td>
                                <td>
                                    <div>
                                        <ul class='d-flex justify-content-around'>
                                            <li><a href="{{ route('product.edit' , $product->id )}}"><i class='fa fa-edit text-primary'></i></a></li>
                                            <li><a href="#"><i class='fa fa-trash text-danger'></i></a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @php $i++ @endphp
                            @endforeach
                        </tbody>
                        @if  ($products->count() <= 0 )
                            <div class="alert alert-info">
                                No data found
                            </div>
                        @endif
                    </table>
                </div>

            </div>
        </div>

    </section>




@endsection
