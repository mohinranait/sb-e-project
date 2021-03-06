@extends('backend.layout.template')


@section('body-content')

    <section>

        <div class="br-mainpanel">
            <div class="br-pagetitle" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%);'>
                <i class="icon ion-ios-home-outline"></i>
                <div>
                    <h4>All Division Information</h4>
                    <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
                </div>
            </div>

            <div class='p-4'>
            
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
                        <th>ID</th>
                        <th>Division Name</th>
                        <th>Division Priority</th>
                        <th>Division Status</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 ; @endphp
                        @foreach ($divisions as $divisin)
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $divisin->name}}</td>
                            <td>{{ $divisin->priority}}</td>
                            <td>
                                @if( $divisin->status == 1 )
                                    <span class='badge badge-info' >Active</span>
                                @elseif( $divisin->status == 0 )
                                    <span class='badge badge-danger' >In-active</span>
                                @endif
                            </td>
                            <td>
                                <div>
                                    <ul class='d-flex justify-content-around' >
                                        <li><a class='btn btn-primary btn-sm' href="{{ route('division.edit' , $divisin->id) }}"><i class='fa fa-edit text-white'></i> EDIT</a></li>
                                        <li><a class='btn btn-danger btn-sm' href="#" data-toggle="modal" data-target="#delete{{$divisin->id}}"><i class='fa fa-trash text-white'></i> DELETE</a></li>
                                    </ul>
                                    <!-- Delete Modal code Start -->
                                        <div class="modal fade" id="delete{{$divisin->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete This [ {{ $divisin->name }} ] Division Delete? </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class='d-flex justify-content-center'>
                                                    <button type="button" class="btn btn-secondary mx-4" data-dismiss="modal">Cancle</button>
                                                    <form action="{{ route('division.destroy' , $divisin->id) }}" method='POST'>
                                                        @csrf 
                                                        <input type="submit" class='btn btn-danger' value='Confirm' >
                                                    </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    <!-- Delete Modal code end -->
                                </div>
                            </td>
                        </tr>
                        @php $i++ @endphp
                        @endforeach
                    </tbody>
                    @if( $divisions->count() === 0 )
                        <div class="alert alert-info">
                            no data found in our database
                        </div>
                    @endif
                </table>
            </div>

        </div>

    </section>




@endsection


