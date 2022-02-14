@extends('backend.layout.template')


@section('body-content')

    <section>
        <div class="br-mainpanel">
            <div class="br-pagetitle">
                <i class="icon ion-ios-home-outline"></i>
                <div>
                    <h4>Change Information This Brand</h4>
                    <p class="mg-b-0">Create your new Brand.</p>
                </div>
            </div>
            <!-- body content start -->
            <div class="container">
                <div class="col-lg-6">
                    <div style="background:#ffffff; border:1px solid #dddddd; padding:20px">
                        <form action="{{ route('brand.update', $brand->id )}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Brand Name</label>
                                <input type="text" name="name" class="form-control" placeholder="brand name...." value="{{ $brand->name}}">
                            </div>
                            <div class="form-group">
                                <label for="">Brand Name</label>
                               <select name="status" class="form-control" id="">
                                   <option value="1">--Select Status--</option>
                                   <option value="1" @if( $brand->status == 1 ) selected @endif >Active</option>
                                   <option value="0" @if( $brand->status == 0 ) selected @endif >Inactive</option>
                               </select>
                            </div>
                            <div class="form-group">
                                
                                <input type="file" name="image" class="form-file-control" >
                            </div>
                            <div class="form-group">
                                <input type="submit" name="addBrand" class="btn" value="Save Change" style="background-image:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)">
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
            <!-- body content end -->  
        </div>
    </section>
    <section>
        
  
              
        


    </section>

@endsection