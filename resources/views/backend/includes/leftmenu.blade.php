<div class="br-logo"><a href=""><span>[</span>bracket <i>plus</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="{{ route('admin.dashboard') }}" class="br-menu-link active">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Information Summary</label>

        <!-- product left menu start -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-grid "></i>
            <span class="menu-item-label">Manage Product</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('product.index')}}" class="sub-link">All Products</a></li>
            <li class="sub-item"><a href="{{ route('product.create')}}" class="sub-link">Add Product</a></li>
          </ul>
        </li>
        <!-- product left menu end -->

        <!-- Brand left menu start-->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-grid "></i>
            <span class="menu-item-label">Manage Brand</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('brand.index')}}" class="sub-link">All Brands</a></li>
            <li class="sub-item"><a href="{{ route('brand.create')}}" class="sub-link">Create Brand</a></li>
          </ul>
        </li>
        <!-- brand left menu end -->

        <!-- category menu start -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-grid "></i>
            <span class="menu-item-label">Manage Category</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('category.index')}}" class="sub-link">All Category</a></li>
            <li class="sub-item"><a href="{{ route('category.create')}}" class="sub-link">Create Category</a></li>
           
          </ul>
        </li>
        <!-- category menu end -->


        <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Location manage menu</label>
        <!-- division menu start -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-grid "></i>
            <span class="menu-item-label">Division</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('division.index')}}" class="sub-link">All Division</a></li>
            <li class="sub-item"><a href="{{ route('division.create')}}" class="sub-link">Create Division</a></li>
           
          </ul>
        </li>
        <!-- division menu end -->

        <!-- district menu start -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-grid "></i>
            <span class="menu-item-label">District</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('district.index')}}" class="sub-link">All District</a></li>
            <li class="sub-item"><a href="{{ route('district.create')}}" class="sub-link">Create District</a></li>
           
          </ul>
        </li>
        <!-- district menu end -->

        <!-- Cuntry menu start -->
        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub">
            <i class="menu-item-icon icon ion-grid "></i>
            <span class="menu-item-label">Cuntrys</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('cuntry.index')}}" class="sub-link">All Cuntry</a></li>
            <li class="sub-item"><a href="{{ route('cuntry.create')}}" class="sub-link">Create Cuntry</a></li>
           
          </ul>
        </li>
        <!-- Cuntry menu end -->

      </ul><!-- br-sideleft-menu -->

      <!-- <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-info">Information Summary</label> -->


      <br>
    </div><!-- br-sideleft -->