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
                <div class="bd rounded table-responsive">
                    <table class="table table-bordered mg-b-0">
                    @if (\Session::has('success'))

                        <div class="alert alert-success alert-solid" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="d-flex align-items-center justify-content-start">
                                <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                <span><strong>Well done! </strong> {!! \Session::get('success') !!}</span>
                            </div><!-- d-flex -->
                        </div>

                    @endif
                        <thead class='thead-colored thead-info'>
                            <tr>
                                <th>#</th>
                                <th>Brand Logo</th>
                                <th>Brand Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1 ; @endphp
                            @foreach( $brands as $brand)
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>
                                    @if( !empty( $brand->image ))
                                        <img src="{{ asset('backend/img/brands/' . $brand->image)}}" width="35px" alt="">
                                    @elseif (empty( $brand->image))
                                     image not found
                                     @endif
                                </td>
                                <td>{{ $brand->name}}</td>
                                <td>
                                    @if(  $brand->status == 1 )
                                        <span class="badge badge-success">Active</span>
                                    @elseif ( $brand->status == 0)
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <ul class="d-flex justify-content-around">
                                        <li><a class='btn btn-primary btn-sm' href="{{ route('brand.edit', $brand->id)}}" class=''><i class="fa fa-edit text-white"></i> EDIT</a></li>
                                        <li><a class='btn btn-danger btn-sm' href="" data-toggle="modal" data-target="#delete{{$brand->id}}"><i class="fa fa-trash text-white"></i> DELETE</a></li>
                                    </ul>
                                    <!-- model code start -->
                                        <div class="modal fade" id="delete{{$brand->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete This Brand Data?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div>
                                                        
                                                        <ul class="d-flex text-center justify-content-center">
                                                            <li style="margin-right:20px"><button type="button" class="btn btn-success" data-dismiss="modal">Close</button></li>
                                                            <li>
                                                                <form action="{{ route('brand.destroy', $brand->id)}}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="submit" class="btn btn-danger" value='Confirm'>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- model code end -->
                                </td>
                                
                            </tr>
                            @php $i++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!---container-->
            <!-- body content end -->  
        </div>
    </section>


@endsection