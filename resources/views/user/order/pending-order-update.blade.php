@extends('user.layout.app')
@section('content')
<section class="pb-5 login_content_wraper" style="background-image:url(assets/images/gradiantbg.jpg);">
    <div class="container-lg container-fluid">
        <div class="row g-2 pt-5">
            <div class="col-lg-11 col-md-12 col-md-12 col-11  mx-auto">
                <div class="all_quote_card  vendor_rply_dtlL completed_orders">
                    <?php
                        $userbid = \App\Models\UserBid::where('id',$order->user_bid_id)->first();
                        $company = \App\Models\Company::where('id',$userbid->company_id)->first();
                        $garage = \App\Models\Garage::where('id',$order->garage_id)->first();
                        $vendor = \App\Models\Vendor::where('id',$garage->vendor_id)->first();
                        $part = \App\Models\Part::where([['vendor_bid_id',$order->vendor_bid_id],['type','services']])->first();
                        ?>
                    <div class="car_inner_imagg vendor_rply_dtl ">
                        <img @if($garage->image && $garage->image != null) src="{{asset($garage->image)}}" @else
                        src="{{ asset('public/assets/images/repair2.jpg') }}" @endif>
                    </div>
                    <div class=" w-100  quote_detail_wraper">
                        <div class="quote_info">
                            <h5 class="d-flex align-items-center active_quote">{{$garage->garage_name}}</h5>
                            <p class="mb-0">{{$vendor->name}}</p>
                            <p>{{$vendor->phone}}</p>
                            <div class="card_icons d-flex justify-content-center align-items-center">
                                <?php $category = \App\Models\GarageCategory::where('garage_id',$garage->id)->pluck('category_id');
                                    $category_name = \App\Models\Category::whereIn('id',$category)->get();
                                    ?>
                                @foreach($category_name as $catname)
                                <div class="icon_wrpaer">
                                    <img src="{{asset($catname->icon)}}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="quote_detail_btn_wraper">
                            <div class="quote_detail_btn_wraper">
                                <h3 class=" text-sm-center vendor_replies_dtl allOrder">{{$order->status}}</h3>
                            </div>
                            <h3 class=" text-sm-center">AED {{$order->total}}</h3>
                            <div class="completed_order_id">
                                <p>Order ID: <span>#{{$order->order_code}}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        $images = explode(',',$bidfile->car_image);
        ?>
        <div class="owl-carousel carousel_se_03_carousel owl-theme mt-5">
            @if(count($images) == 0)
            <div class="item">
                <div class="carAd_img_wraper doc_img customer_dashboard">
                    <img src="{{ asset('public/assets/images/no-preview.png') }}">
                </div>
            </div>
            <div class="item">
                <div class="carAd_img_wraper doc_img customer_dashboard">
                    <img src="{{ asset('public/assets/images/no-preview.png') }}">
                </div>
            </div>
            <div class="item">
                <div class="carAd_img_wraper doc_img customer_dashboard">
                    <img src="{{ asset('public/assets/images/no-preview.png') }}">
                </div>
            </div>
            @elseif(count($images) == 1)
            @foreach($images as $image)
            <div class="item">
                <div class="carAd_img_wraper doc_img customer_dashboard">
                    <img src="{{url($image) }}">
                </div>
            </div>
            <div class="item">
                <div class="carAd_img_wraper doc_img customer_dashboard">
                    <img src="{{ asset('public/assets/images/no-preview.png') }}">
                </div>
            </div>
            <div class="item">
                <div class="carAd_img_wraper doc_img customer_dashboard">
                    <img src="{{ asset('public/assets/images/no-preview.png') }}">
                </div>
            </div>
            @endforeach
            @elseif($images && count($images) ==2)
            @foreach($images as $image)
            <div class="item">
                <div class="carAd_img_wraper doc_img customer_dashboard">
                    <img src="{{ asset($image) }}">
                </div>
            </div>
            @endforeach
            <div class="item">
                <div class="carAd_img_wraper doc_img customer_dashboard">
                    <img src="{{ asset('public/assets/images/no-preview.png') }}">
                </div>
            </div>
            @else
            @foreach($images as $image)
            <div class="item">
                <div class="carAd_img_wraper doc_img customer_dashboard">
                    <img src="{{ asset($image) }}">
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <div class="row mt-5">
            <div class=" col-xl-7 col-lg-9 col-md-9 col-sm-11 mx-auto">
                <div class="all_quote_card  vendor_rply_dtlL _text">
                    <div class="over_view_part carad_data vendor_detail">
                        <h3 class=" text-center mb-5">REPAIR DETAILS</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-sm-5">
                            <div class="invoice_details mb-5">
                                <h4>Work Days</h4>
                                <h4 class="__gray">{{$order->vendorbid->time}}</h4>
                            </div>
                            <div class="invoice_details">
                                <h4>Labor Pay</h4>
                                <h4 class="__gray">AED {{$part->service_rate}}</h4>
                            </div>


                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <div class="divider_invoice">

                            </div>

                        </div>
                        <div class="col-lg-5 col-sm-5">
                            <div class="invoice_details mb-5">
                                <h4>Per Day Rate</h4>
                                <h4 class="__gray">AED 120</h4>
                            </div>
                            <div class="invoice_details">
                                <h4>Total Invoice</h4>
                                <h4 class="__gray">AED {{$order->vendorbid->net_total}}</h4>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="row  mt-5">
            <div class="col-lg-12">

                <div class="all_quote_card  vendor_rply_dtlL _text">
                    <div class="over_view_part carad_data vendor_detail">
                        <h3 class=" text-center mb-5">REPAIR DETAILS</h3>
                    </div>
                    <?php $vendor_bid = \App\Models\VendorBid::where('garage_id',$order->garage_id)->where('user_bid_id',$order->user_bid_id)->first();?>
                    <div class="vendor__rply__dttl">
                        <p>{{$vendor_bid->description}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-5 col-lg-6  col-md-8 mx-auto">
                <div class="row mt-5 mb-4 g-3">
                    <div class="col-lg-6 col-md-6 col-sm-4 mx-auto">
                        <div class="d-grid gap-2 mt-lg-3 ">
                            @if($newinvoce->part !='[]')
                            <a href="{{route('user.order.invoce',$newinvoce->id)}}" class="btn btn-secondary block get_appointment">NEW INVOICE</a>
                            @endif
                            <a href="{{url('user/print-order-details',$vendorBid->id)}}" class="btn btn-secondary block get_appointment">INVOICE</a>
                        </div>
                        <div class="d-grid gap-2 mt-lg-3 ">
                        <form enctype="multipart/form-data" method="post" action="{{ route('user.payment_page') }}"
                            class="needs-validation" novalidate>
                            @csrf
                            <input type="hidden" name="bid_id" value="{{$vendor_bid->id}}">
                            <input type="hidden" name="type" value="order">
                            <button class="btn btn-secondary block get_appointment" type="submt">MARK AS COMPLETE</button>
                        </form>
                            <!-- <a href="{{route('user.payment_page',$vendor_bid->id)}}" class="btn btn-secondary block get_appointment">MARK AS COMPLETE</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection