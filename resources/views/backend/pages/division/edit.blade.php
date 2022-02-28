@extends('backend.layout.template')


@section('body-content')

    <section>

        <div class="br-mainpanel">
            <div class="br-pagetitle" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%);'>
                <i class="icon ion-ios-home-outline"></i>
                <div>
                    <h4>Update Division Form</h4>
                    <p class="mg-b-0">Update division all information.</p>
                </div>
            </div>



            <div class='p-4'>
                <div class="col-lg-6">
                    <form action="{{ route('division.update' , $division->id)}}" method='POST' enctype='multipart/form-data'>
                        @csrf 
                        <div class="form-group">
                            <label for="">Division Name</label>
                            <input type="text" name='divisionname' class='form-control' placeholder='Division name...' value='{{$division->name}}' autocomplate='off' >
                        </div>
                        <div class="form-group">
                            <label for="">Division Priority</label>
                            <input type="number" name='priority' class='form-control' value="{{$division->priority}}" placeholder='priority number [1-9]'>
                        </div>
                        <div class="form-group">
                            <label for="">Division Status</label>
                           <select name="status" class='form-control' id="">
                               <option value="1">--Select Status--</option>
                               <option value="1" @if( $division->status == 1 ) selected @endif >Active</option>
                               <option value="0" @if( $division->status == 0 ) selected @endif >In-Active</option>
                           </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" name='addDivision' class='btn btn-info' value='Update  Division' >
                        </div>

                    </form>
                </div>
            </div>



        </div>

    </section>




@endsection


