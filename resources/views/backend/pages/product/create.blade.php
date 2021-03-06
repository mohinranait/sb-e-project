@extends('backend.layout.template')


@section('body-content')

    <section>
        <div class="br-mainpanel">
            <div class="br-pagetitle" style='background:linear-gradient(to right, #1CAF9A 0%, #17A2B8 100%);'>
                <i class="icon ion-ios-home-outline"></i>
                <div>
                    <h4>Create a new Product</h4>
                    <p class="mg-b-0">Create new Product.</p>
                </div>
            </div>

            <div class="p-4">

                <div class='product-form'>
                    <form action="{{ route('product.store') }}" method='POST' enctype='multipart/form-data'>
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 bg-white p-4">

                                <!-- product name group -->
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" name='productname' class='form-control' require placeholder='Product name...' >
                                </div>

                                <!-- product brand group -->
                                <div class="form-group">
                                    <label for="">Brand</label>
                                    <select name="brand" class='form-control' id="">
                                        <option value="">--select product brand--</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- product category group -->
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <select name="category" class='form-control' id="">
                                        <option value="">--select product category--</option>
                                        @foreach ($categorys as $category)

                                            <!-- primary category print -->
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>

                                            <!-- sub categry Print -->
                                            @foreach ( App\Models\Category::orderby('title' , 'asc')->where('is_parent' , $category->id )->get() as $scategory)
                                            <option value="{{ $scategory->id }}">-- {{ $scategory->title }}</option>

                                            <!-- ????????? ?????????????????????????????? ????????? ???????????????????????????  ????????????????????? ?????????????????? ???????????? -->
                                            @foreach ( App\Models\Category::orderby('title' , 'asc')->where('is_parent' , $scategory->id)->get() as $ssscat)
                                            <option value="{{ $ssscat->id }}">-- -- {{ $ssscat->title }}</option>
                                            @endforeach


                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Quentity group -->
                                <div class="form-group">
                                    <label for="">Quentity</label>
                                    <input type="text" name='quentity' class='form-control' placeholder='Quentity' >
                                </div>

                                <!-- Regular price group -->
                                <div class="form-group">
                                    <label for="">Product Price</label>
                                    <input type="text" name='regularPrice' class='form-control' placeholder='Price' require >
                                </div>

                                <!-- Offer price group -->
                                <div class="form-group">
                                    <label for="">Offer Price [Optional]</label>
                                    <input type="text" name='offerPrice' class='form-control' placeholder='Offer Price....'  >
                                </div>

                                 <!-- Fiture pfoduct group -->
                                 <div class="form-group">
                                    <label for="">Fiture Product</label>
                                    <select name="fitureProduct" class='form-control' id="">
                                        <option value="0">--select fiture--</option>
                                        <option value="0">In-Active</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>

                            </div>
                            <!-- /.col-lg-6 -->

                            <div class="col-lg-6 bg-white p-4">

                               
                                <!-- Sort Discription group -->
                                <div class="form-group">
                                    <label for="">Sort Discription</label>
                                    <textarea name="sortDis" id="" cols="30" class='form-control' require rows="2"></textarea>
                                </div>

                                <!-- product Status group -->
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" class='form-control' id="">
                                        <option value="1">--select status--</option>
                                        <option value="2">In-Active</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>

                                <!--  Discription group -->
                                <div class="form-group">
                                    <label for="">Product Details [ Optional ]</label>
                                    <textarea name="discrip" id="" cols="30" class='form-control'  rows="5"></textarea>
                                </div>

                                <!--  Search tags group -->
                                <div class="form-group">
                                    <label for="">Tags [ Separated with (,) ]</label>
                                    <textarea name="tags" id="" cols="30" class='form-control'  rows="1"></textarea>
                                </div>

                                <!--  Product Image group -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Main Thumnail Image</label><br>
                                            <input type="file" name='p_image[]' class='form-file-control'>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Extra Image 1</label><br>
                                            <input type="file" name='p_image[]' class='form-file-control'>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Extara image 2</label><br>
                                            <input type="file" name='p_image[]' class='form-file-control'>
                                        </div>
                                    </div>
                                </div>
                                

                            </div>
                            <!-- /.col-lg-6 -->

                            <div class="col-lg-12 pb-5 ms-auto bg-white">
                                <input type="submit" class='btn btn-info wd-600' value='Add Product'>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            
        </div>
    </section>




@endsection


