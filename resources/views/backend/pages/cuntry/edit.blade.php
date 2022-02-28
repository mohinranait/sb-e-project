@extends('backend.layout.template')


@section('body-content')

    <section>

        <div class="br-mainpanel">
            <div class="br-pagetitle" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%);'>
                <i class="icon ion-ios-home-outline"></i>
                <div>
                    <h4>Create New Cuntry Form</h4>
                    <p class="mg-b-0">Add a new Cuntry.</p>
                </div>
            </div>

            <div class='p-4 bg-white'>
                <div class="col-lg-6">
                    <form action="{{ route('cuntry.update',$cuntrys->id)}}" method='POST' enctype='multipart/form-data'>
                        @csrf 
                        <div class="form-group">
                            <label for="">Cuntry Name</label>
                            <input type="text" name='cuntry' value="{{$cuntrys->cuntry}}" class='form-control' placeholder='Cuntry name...' autocomplate='off' >
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                           <select name="status" class='form-control' id="">
                               <option value="1">--Select Status--</option>
                               <option value="1" @if($cuntrys->status == 1 ) selected @endif >Active</option>
                               <option value="2" @if($cuntrys->status == 2 ) selected @endif >In-Active</option>
                           </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name='cuntrybtn' class='btn btn-info' value='Update Cuntry'>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

@endsection


