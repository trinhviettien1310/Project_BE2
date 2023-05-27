@extends('frontend.layouts.master')
@section('main-content')
@section('title', 'Chi Tiết Sản Phẩm')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">Trang Chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>{{ $product_detail->cat_info->title }} / {{ $product_detail->title }}</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->


<!--product wrapper start-->
<div class="product_details">
    <div class="row">
        <div class="col-lg-8 col-md-6">
            <div class="product_tab fix">
                <div class="product_tab_button">
                    <ul class="nav" role="tablist">
                        @php
                            $photo = explode(',', $product_detail->photo);
                        @endphp
                        {{-- <li>
                            <a class="active" data-toggle="tab" href="#p_tab1" role="tab" aria-controls="p_tab1"
                                aria-selected="false"><img src="{{ $photo[0] }}" alt=""></a>
                        </li> --}}
                        @foreach ($photo as $data)
                            <li>
                                <a data-toggle="tab" href="#p_tab2" role="tab" aria-controls="p_tab2"
                                    aria-selected="false"><img src="{{$data}}" alt=""></a>
                            </li>
                        @endforeach

                        {{-- <li>
                                 <a data-toggle="tab" href="#p_tab2" role="tab" aria-controls="p_tab2" aria-selected="false"><img src="assets\img\cart\cart2.jpg" alt=""></a>
                            </li>
                            <li>
                               <a data-toggle="tab" href="#p_tab3" role="tab" aria-controls="p_tab3" aria-selected="false"><img src="assets\img\cart\cart4.jpg" alt=""></a>
                            </li> --}}
                    </ul>
                </div>
                <div class="tab-content produc_tab_c">

                    <div class="tab-pane fade show active" id="p_tab1" role="tabpanel">
                        <div class="modal_img">
                            <a href="#"><img src="{{ $photo[0] }}" alt="{{ $photo[0] }}"></a>
                            <div class="img_icone">
                                <img src="assets\img\cart\span-new.png" alt="">
                            </div>
                            <div class="view_img">
                                <a class="large_view" href="{{ $photo[0] }}"><i class="fa fa-search-plus"></i></a>
                            </div>
                        </div>
                    </div>

                    @foreach ($photo as $data1)
                        <div class="tab-pane fade" id="p_tab2" role="tabpanel">
                            <div class="modal_img">
                                <a href="#"><img src="{{ $data1 }}" alt=""></a>
                                <div class="img_icone">
                                    <img src="assets\img\cart\span-new.png" alt="">
                                </div>
                                <div class="view_img">
                                    <a class="large_view" href="assets\img\product\product14.jpg"><i
                                            class="fa fa-search-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="tab-pane fade" id="p_tab3" role="tabpanel">
                            <div class="modal_img">
                                <a href="#"><img src="assets\img\product\product15.jpg" alt=""></a>
                                <div class="img_icone">
                                   <img src="assets\img\cart\span-new.png" alt="">
                               </div>
                                <div class="view_img">
                                    <a class="large_view" href="assets\img\product\product15.jpg"> <i class="fa fa-search-plus"></i></a>
                                </div>     
                            </div>
                        </div> --}}
                </div>

            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="product_d_right">
                <h1>{{ $product_detail->title }}</h1>
                <div class="product_ratting mb-10">
                    <div class="product__details__option">
                        <div class="product__details__option__size">
                            <span style="font-size: 1rem">Kích Thước:</span>
                            @php
                                $size = explode(',', $product_detail->size);
                            @endphp
                            @foreach ($size as $sizes)
                                <label for="{{ $sizes }}">{{ $sizes }}
                                    <input type="radio" id="{{ $sizes }}">
                                </label>
                            @endforeach

                        </div>
                    </div>
                    <div class="sidebar_widget color">
                        <h2>Màu Sắc</h2>
                        <div class="widget_color">
                            <ul>
                                <li><a href="#"></a></li>
                                <li><a href="#"></a></li>
                                <li> <a href="#"></a></li>
                                <li><a href="#"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="content_price mb-15">
                        @php
                            $discount = $product_detail->price - ($product_detail->price * $product_detail->discount) / 100;
                        @endphp
                        @if ($product_detail->discount != 0)
                            <span>{{ number_format($discount), 2 }}đ</span>
                            <span class="old-price">{{ number_format($product_detail->price), 2 }}đ</span>
                        @else
                            <span>{{ number_format($product_detail->price), 2 }}đ</span>
                        @endif
                    </div>
                    <div class="box_quantity mb-20">
                        <form action="{{ route('single-add-cart', $product_detail->id) }}" method="POST">
                            @csrf

                            <input min="1" name="quantity" max="max="{{ $product_detail->stock }}""
                                value="1" type="number">
                            <button type="submit"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</button>
                        </form>

                        {{-- <a href="#" title="add to wishlist"><i class="fa fa-heart" aria-hidden="true"></i></a> --}}
                    </div>

                    <div class="mb-20">
                        <div class="product-policy">
                            <div class="product-policy-header">
                                <h4>
                                    SẼ CÓ TẠI NHÀ BẠN
                                </h4>
                                <span>từ 1 đến 5 ngày làm việc</span>
                            </div>
                            <div class="product-policy-content">
                                <ul class="list-policy">
                                    <li class="item-policy clearfix">
                                        <div class="item-policy-icon">
                                            <img src="//theme.hstatic.net/200000232953/1000728047/14/pd_policies_3.png?v=79"
                                                alt="THANH TOÁN" />
                                        </div>
                                        <div class="item-policy-text">
                                            <h5>
                                                THANH TOÁN
                                            </h5>
                                            <p>Thanh toán khi nhận hàng</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Sản phẩm liên quan-->
<div class="new_product_area product_page">
    <div class="row">
        <div class="col-12">
            <div class="block_title">
                <h3>Sản Phẩm Liên Quan</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="single_p_active owl-carousel">
            @foreach ($product_relate as $product)
                @php
                    $photo = explode(',', $product->photo);
                @endphp
                <div class="col-lg-3">
                    <div class="single_product">
                        <div class="product_thumb">
                            <a href="{{ route('product-detail', $product->slug) }}"><img src="{{ $photo[0] }}"
                                    alt=""></a>
                            <div class="img_icone">
                                <img src="assets\img\cart\span-new.png" alt="">
                            </div>
                            <div class="product_action">
                                <a href="#"> <i class="fa fa-shopping-cart"></i>Thêm Vào Giỏ Hàng</a>
                            </div>
                        </div>
                        <div class="product_content">
                            <span class="old-price">{{ number_format($product->price), 2 }}đ</span>
                            <h3 class="product_title"><a
                                    href="{{ route('product-detail', $product->slug) }}">{{ $product->title }}</a>
                            </h3>
                        </div>
                        <div class="product_info">
                            <ul>
                                <li><a href="#" data-toggle="modal" data-target="#modal_box"
                                        title="Quick view">Chi Tiết</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!--new product area start-->

</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">
@endpush
