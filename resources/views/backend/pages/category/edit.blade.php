@extends('backend.layout.template')


@section('body-content')

    <section>
        <div class="br-mainpanel" >
            <div class="br-pagetitle" style="background-image:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)">
                <i class="icon ion-ios-home-outline"></i>
                <div>
                    <h4>Add a new Category </h4>
                    <p class="mg-b-0">Create your new Category.</p>
                </div>
            </div>
            <!-- body content start -->
            <div class="container mt-4">
                <div class="col-lg-6">
                    <div style="background:#ffffff; border:1px solid #dddddd; padding:20px">
                        <form action="{{ route('category.update', $category->id )}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Category Name</label>
                                <input type="text" name='name' class="form-control" placeholder='category name...' value="{{$category->title}}" >
                            </div>

                            <div class="form-group">
                                <label for="">Category Discription</label>
                                <textarea name="dis" class='form-control' id="" cols="30" rows="2">{{$category->dis}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Select your category</label>
                                <select name="is_parent" class="form-control" id="">
                                    <option value="0">--select category--</option>
                                    @foreach ( $parents as $parent )
                                    <option value="{{ $parent->id }}"
                                    @if( $category->is_parent == 0 ) 

                                    @elseif ( $category->is_parent != 0 )
                                        @if( $parent->id == $category->is_parent )
                                            selected
                                        @endif
                                    @endif
                                    >{{ $parent->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Category Status</label>
                                <select name="status" class="form-control" id="">
                                    <option value="0">--select Status--</option>
                                    <option value="1" @if( $category->status == 1 ) selected @endif >Active</option>
                                    <option value="0" @if( $category->status == 0 ) selected @endif >In-Active</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="file" name='image' class='form-file-control'>
                            </div>
                            <div class="form-group">
                            <input type="submit" name="addBrand" class="btn" value="Add New Brand" style="background-image:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%)">
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
            <!-- body content end -->  
        </div>
    </section>


@endsection