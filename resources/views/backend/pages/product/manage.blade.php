@extends('backend.layout.template')


@section('body-content')

    <section>

        <div class="br-mainpanel">
            <div class="br-pagetitle" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%);'>
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
                                            <li><a class='btn btn-sm btn-primary' href="{{ route('product.edit' , $product->id )}}"><i class='fa fa-edit text-white'></i></a></li>

                                            <li><a class='btn btn-sm btn-info mx-1' href="#" data-toggle="modal" data-target="#view{{$product->id}}"><i class="fas fa-eye text-white"></i></i></a></li>
            
                                        </ul>
                                        <!-- product Details modal start code -->
    <div class="modal fade" id="view{{$product->id}}">
        <div class="modal-dialog g modal-dialog-centered">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">{{$product->name}}</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <table class='table bg-white table-bordered'>
                    <tbody>
                        
                        <tr>
                            <td style='border:none'>Price</td>
                            <td style='border:none'>:</td>
                            <td style='border:none'>
                                @if( !empty($product->offer_price))
                                {{$product->offer_price}} Tk
                                @else
                                {{$product->regular_price}} BDT
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td style='border:none'>Quentity</td>
                            <td style='border:none'>:</td>
                            <td style='border:none'>{{$product->quentity}} Psc</td>
                        </tr>
                        <tr>
                            <td style='border:none'>Offer</td>
                            <td style='border:none'>:</td>
                            <td style='border:none'>
                                @if( !empty($product->is_fiture == 1))
                                Active
                                @else
                                In-Active
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td style='border:none'>Tags</td>
                            <td style='border:none'>:</td>
                            <td style='border:none'>{{$product->tags}}</td>
                        </tr>
                        <tr>
                            <td style='border:none'>Details</td>
                            <td style='border:none'>:</td>
                            <td style='border:none'>{{$product->description}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
                                        <!-- product Details modal end code -->
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
