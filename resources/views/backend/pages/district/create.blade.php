@extends('backend.layout.template')


@section('body-content')

    <section>

        <div class="br-mainpanel">
            <div class="br-pagetitle" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%);'>
                <i class="icon ion-ios-home-outline"></i>
                <div>
                    <h4>Create New District</h4>
                    <p class="mg-b-0">Create new District Form.</p>
                </div>
            </div>


            <div class='p-4' >
                <div class="row">
                    <div class="col-lg-6">
                        <form action="{{ route('district.store') }}" method='POST'>
                            @csrf 
                            <div class="form-group">
                                <label for="">District Name</label>
                                <input type="text" name='dname' class="form-control" placeholder='district name'>
                            </div>
                            @csrf 
                            <div class="form-group">
                                <label for="">Division Name</label>
                                <select name="divisinis" class='form-control' id="">
                                    <option value="1">--Select Division--</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">District Status</label>
                                <select name="status" class='form-control' id="">
                                    <option value="1">--Select Status--</option>
                                    <option value="1">Active</option>
                                    <option value="0">In-Active</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="submit" name='addDistrict' class="btn btn-info" value="Add new District">
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            
        </div>

    </section>




@endsection


