<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}">
        <div class="sidebar-brand-text mx-3">{{ __('Trang Quản Trị') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">



    <!-- Divider -->
    <hr class="sidebar-divider">

   

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseTwo">
            <span>{{ __('Sản Phẩm') }}</span>
        </a>
        <div id="collapseProduct" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}" href="{{ route('category.index') }}"> <i class="fa fa-briefcase mr-2"></i> {{ __('Danh Mục') }}</a>
                <a class="collapse-item {{ request()->is('admin/tags') || request()->is('admin/tags/*') ? 'active' : '' }}" href="{{ route('brand.index') }}"> <i class="fa fa-briefcase mr-2"></i> {{ __('Thương Hiệu') }}</a>
                <a class="collapse-item {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}" href="{{ route('product.index') }}"> <i class="fa fa-briefcase mr-2"></i> {{ __('Sản Phẩm') }}</a>

                <a class="collapse-item {{ request()->is('admin/slides') || request()->is('admin/slides/*') ? 'active' : '' }}" href="{{ route('banner.index') }}"> <i class="fa fa-briefcase mr-2"></i> {{ __('Banner') }}</a>
                <a class="collapse-item {{ request()->is('admin/slides') || request()->is('admin/slides/*') ? 'active' : '' }}" href="{{ route('coupon.index') }}"> <i class="fa fa-briefcase mr-2"></i> {{ __('Mã Giảm Giá') }}</a>
                <a class="collapse-item {{ request()->is('admin/slides') || request()->is('admin/slides/*') ? 'active' : '' }}" href="{{route('supplier.index')}}"> <i class="fa fa-briefcase mr-2"></i> {{ __('Nhà Cung Cấp') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseOrder" aria-expanded="true" aria-controls="collapseTwo">
            <span>{{ __('Quản Lý Đơn Hàng') }}</span>
        </a>
        <div id="collapseOrder" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item " href="{{route('order.index')}}"> <i class="fa fa-briefcase mr-2"></i> {{ __('Tất cả đơn hàng') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true" aria-controls="collapseTwo">
            <span>{{ __('Quản Lý Bài Viết') }}</span>
        </a>
        <div id="collapseReports" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}" href="{{route('post-category.index')}}"> <i class="fa fa-briefcase mr-2"></i> {{ __('Loại Bài Viết') }}</a>

                <a class="collapse-item {{ request()->is('admin/reports/revenue') ? 'active' : '' }}" href="{{ route('post.index') }}"> <i class="fa fa-briefcase mr-2"></i> {{ __('Bài Viết') }}</a>
            </div>
        </div>
    </li>


</ul>