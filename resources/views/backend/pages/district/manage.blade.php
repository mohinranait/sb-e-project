@extends('backend.layout.template')


@section('body-content')

    <section>

        <div class="br-mainpanel">
            <div class="br-pagetitle" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%);'>
                <i class="icon ion-ios-home-outline"></i>
                <div>
                    <h4>All District</h4>
                    <p class="mg-b-0">All District Informatin.</p>
                </div>
            </div>


            <div class="p-4"> 
            <table class="table table-bordered table-colored table-dark">
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
                <thead>
                    <tr>
                        <th class="wd-10p">ID</th>
                        <th class="wd-35p">District Name</th>
                        <th class="wd-35p">Division Name</th>
                        <th class="wd-35p">District Status</th>
                        <th class="wd-35p">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1 @endphp
                    @foreach( $districts as $district )
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $district->name }}</td>
                        <td>{{ $district->division->name }}</td>
                        <td>
                            @if( $district->status == 1 )
                                <span class='badge badge-success'>Active</span>
                            @elseif ( $district->status == 0 )
                                <span class='badge badge-danger'>In-Active</span>
                            @endif
                        </td>
                        <td>
                            <div>
                                <ul class='d-flex justify-content-around' >
                                    <li><a class='btn btn-primary btn-sm mx-2' href="{{ route('district.edit' , $district->id) }}"><i class='fa fa-edit text-white' ></i> EDIT</a></li>
                                    <li><a class='btn btn-danger btn-sm' href="#" data-toggle="modal" data-target="#delete{{$district->id}}"><i class='fa fa-trash text-white' ></i> DELETE</a></li>
                                </ul>
                                <!-- delete District Modal code start -->
                                    <div class="modal fade" id="delete{{$district->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete This Data ?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-flex justify-content-center" >
                                                <button type="button" class="btn btn-secondary mx-4" data-dismiss="modal">Close</button>
                                                    <form action="{{route('district.destroy' , $district->id)}}" method='POST'>
                                                        @csrf 
                                                        <input type="submit" class="btn btn-primary" name='deletebtn' value="Confirm">
                                                    </form>
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                <!-- delete District Modal code end -->
                            </div>
                        </td>
                    </tr>
                    @php $i++ @endphp
                    @endforeach
                </tbody>
                @if( $districts->count() == 0 )
                    <div class="alert alert-info text-black text-center">
                        no data found our database
                    </div>
                @endif
            </table>
            </div>


        </div>

    </section>




@endsection


