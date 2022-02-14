@extends('backend.layout.template')


@section('body-content')


<section class="p-3">

    <div class="br-mainpanel">
        <div class="br-pagetitle">
            <i class="icon ion-ios-home-outline"></i>
            <div>
                <h4>All Category </h4>
                <p class="mg-b-0">All category management</p>
            </div>
        </div>

      
          <div class="row">
            <div class="col-lg-12">

              <table class="table table-bordered table-colored table-teal">
                <thead>
                  <tr>
                    <th class="wd-10p">si</th>
                    <th class="wd-20p">Image</th>
                    <th class="wd-35p">Name</th>
                    <th class="wd-20p">Category</th>
                    <th class="wd-15p">Status</th>
                    <th class="wd-35p">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php $i = 1; @endphp
                  @foreach ( $categorys as  $category)
                  <tr>
                    <th scope="row">{{ $i }}</th>
                    <td>
                      @if(!empty($category->image) )
                        <img src="{{ asset('backend/img/category/' . $category->image ) }}" width="35px" alt="">
                      @elseif( empty( $category->image ) )
                        <span>not image found</span>
                      @endif
                    </td>
                    <td>{{ $category->title }}</td>
                    <td>
                      @if( $category->is_parent === 0 )
                      <span class='badge badge-info'>Primary</span>
                      @elseif( $category->is_parent != 0 )
                      <span class="badge badge-danger" >Sub Category</span>
                      @endif
                    </td>
                    <td>
                      @if( $category->status === 0 )
                      <span class='badge badge-danger'>In-Active</span>
                      @elseif( $category->status === 1 )
                      <span class="badge badge-success" >Active</span>
                      @endif
                    </td>
                    <td>
                      <div>
                        <ul class="d-flex justify-content-around">
                          <li><a href="{{ route('category.edit', $category->id) }}"><i class="fa fa-edit text-primary"></i></a></li>
                          <li><a href="" data-toggle="modal" data-target="#delete{{$category->id}}"><i class="fa fa-trash text-danger"></i></a></li>
                        </ul>
                         <!-- model code start -->
                          <div class="modal fade" id="delete{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Delete This category Data?</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <div>
                                          
                                          <ul class="d-flex text-center justify-content-center">
                                              <li style="margin-right:20px"><button type="button" class="btn btn-success" data-dismiss="modal">Close</button></li>
                                              <li>
                                                  <form action="{{ route('category.destroy', $category->id)}}" method="POST" enctype="multipart/form-data">
                                                      @csrf
                                                      <input type="submit" class="btn btn-danger" value='Confirm'>
                                                  </form>
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                                  </div>
                              </div>
                          </div>
                          <!-- model code end -->
                      </div>
                    </td>
                  </tr>

                  <!-- child category decoration start -->
                    @foreach (App\Models\Category::orderby('title', 'asc')->where('is_parent' , $category->id )->get() as $childCategory )
                      <tr>
                        <th scope="row">-- </th>
                        <td>
                          @if(!empty($childCategory->image) )
                            <img src="{{ asset('backend/img/category/' . $childCategory->image ) }}" width="35px" alt="">
                          @elseif( empty( $childCategory->image ) )
                            <span>not image found</span>
                          @endif
                        </td>
                        <td>{{ $childCategory->title }}</td>
                        <td>
                          @if( $childCategory->is_parent === 0 )
                          <span class='badge badge-info'>Primary</span>
                          @elseif( $childCategory->is_parent != 0 )
                          <span class="badge badge-danger" >Sub Category</span>
                          @endif
                        </td>
                        <td>
                          @if( $childCategory->status === 0 )
                          <span class='badge badge-danger'>In-Active</span>
                          @elseif( $childCategory->status === 1 )
                          <span class="badge badge-success" >Active</span>
                          @endif
                        </td>
                        <td>
                          <div>
                            <ul class="d-flex justify-content-around">
                              <li><a href="{{ route('category.edit', $childCategory->id) }}"><i class="fa fa-edit text-primary"></i></a></li>
                              <li><a href="" data-toggle="modal" data-target="#delete{{$childCategory->id}}"><i class="fa fa-trash text-danger"></i></a></li>
                            </ul>
                            <!-- model code start -->
  <div class="modal fade" id="delete{{$childCategory->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete This category Data?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <div>
                  
                  <ul class="d-flex text-center justify-content-center">
                      <li style="margin-right:20px"><button type="button" class="btn btn-success" data-dismiss="modal">Close</button></li>
                      <li>
                          <form action="{{ route('category.destroy', $childCategory->id)}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="submit" class="btn btn-danger" value='Confirm'>
                          </form>
                      </li>
                  </ul>
              </div>
          </div>
          </div>
      </div>
  </div>
                              <!-- model code end -->
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  <!-- child category decoration end -->
                  @php $i++ @endphp
                  @endforeach
                </tbody>
                @if( $categorys->count() == 0 )
                <div class="alert alert-info">
                  no image found
                </div>
                @endif
              </table>

            </div>
          </div>
    </div>

</section>

        


        


@endsection