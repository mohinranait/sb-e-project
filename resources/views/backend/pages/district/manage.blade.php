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
                                    <li><a href="{{ route('district.edit' , $district->id) }}"><i class='fa fa-edit text-primary' ></i></a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#delete{{$district->id}}"><i class='fa fa-trash text-danger' ></i></a></li>
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


