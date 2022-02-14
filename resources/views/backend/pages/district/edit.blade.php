@extends('backend.layout.template')


@section('body-content')

    <section>

        <div class="br-mainpanel">
            <div class="br-pagetitle">
                <i class="icon ion-ios-home-outline"></i>
                <div>
                    <h4>Update District Information </h4>
                    <p class="mg-b-0">Update District Form.</p>
                </div>
            </div>


            <div class='p-4' >
                <div class="row">
                    <div class="col-lg-6">
                        <form action="{{ route('district.update' , $edit->id ) }}" method='POST'>
                            @csrf 
                            <div class="form-group">
                                <label for="">District Name</label>
                                <input type="text" name='dname' class="form-control" value='{{$edit->name}}' placeholder='district name'>
                            </div>
                            @csrf 
                            <div class="form-group">
                                <label for="">Division Name</label>
                                <select name="divisinis" class='form-control' id="">
                                    <option value="1">--Select Division--</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}" @if( $edit->division_id == $division->id  ) selected @endif >{{ $division->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">District Status</label>
                                <select name="status" class='form-control' id="">
                                    <option value="1">--Select Status--</option>
                                    <option value="1" @if( $edit->status == 1 ) selected @endif >Active</option>
                                    <option value="0" @if( $edit->status == 0 ) selected @endif >In-Active</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="submit" name='addDistrict' class="btn btn-success" value="Add new District">
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            
        </div>

    </section>




@endsection


