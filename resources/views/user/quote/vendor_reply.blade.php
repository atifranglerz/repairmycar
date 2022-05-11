@extends('user.layout.app')
@section('content')
<section class="pb-5 login_content_wraper" style="background-image:url(public/assets/images/gradiantbg.jpg);">
    <div class="container-lg container-fluid" >
        <div class="row">
            <div class="col-xl-8 col-lg-7 col-sm-9  col-md-10 mx-auto">
                <div class="row mt-5 mb-4 g-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="d-grid gap-2 mt-lg-3 ">
                            <a href="{{route('user.quoteindex')}}" class="btn text-center btn-primary get_quot block get_appointment d-flex justify-content-center align-items-center" type="button">GO BACK TO ALL QUOTES
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-6">
                        <div class="d-grid gap-2 mt-lg-3 ">
                            <a href="{{route('user.payment_page',$data->id)}}" class="btn btn-secondary block get_appointment d-flex justify-content-center align-items-center" type="button">ACCEPT QUOTE
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-lg-11 col-md-12 col-sm-12 col-11  mx-auto">
                <div class="all_quote_card  vendor_rply_dtlL">
                    <?php
                    $userbid = \App\Models\UserBid::where('id',$data->user_bid_id)->first();
                    $company = \App\Models\Company::where('id',$userbid->company_id)->first();
                    $garage = \App\Models\Garage::where('id',$data->garage_id)->first();
                    ?>
                    <div class="car_inner_imagg vendor_rply_dtl ">
                        <img @if($garage->image && $garage->image != null) src="{{asset($garage->image)}}" @else src="{{ asset('public/assets/images/repair2.jpg') }}" @endif>
                    </div>
                    <div class=" w-100  quote_detail_wraper">
                        <div class="quote_info">
                            <h3 class="d-flex align-items-center active_quote rply_dtl">{{$garage->garage_name}}</h3>
                            <p class="mb-0 rply__dtl">{{$data->vendordetail->name}}</p>
                            <p class="rply__dtl" >{{$data->vendordetail->phone}}</p>
                            <div class="card_icons respons_qoute d-flex align-items-center">
                                <?php $category = \App\Models\GarageCategory::where('garage_id',$data->garage_id)->pluck('category_id');
                                $category_name = \App\Models\Category::whereIn('id',$category)->get();
                                ?>
                                @foreach($category_name as $catname)
                                    <div class="icon_wrpaer vendor_qoute_dtl">
                                        <img src="{{asset($catname->icon)}}">
                                    </div>
                                @endforeach


                            </div>
                        </div>
                        <div class="quote_detail_btn_wraper">
                            <h3 class=" text-sm-center vendor_replies_dtl">AED {{$data->price}}</h3>
                            <div class="quote_info">
                                <p class="quote_rev vndr_rply__dtl">Time Frame Offered<span> {{$data->time}}  Days</span></p>
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
                    <div class="vendor__rply__dttl">
                        <p>{{$data->description}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  mt-5">
            <div class="col-lg-12">

                <div class="all_quote_card  vendor_rply_dtlL _text">
                    <div class="over_view_part carad_data vendor_detail">
                        <h3 class=" text-center mb-5">CAR DETAILS</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-9 col-md-10 col-sm-8  mx-auto">
                            <div class="row mt-1 g-3">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="d-grid gap-2 ">
                                        <button class="btn text-center btn-primary get_quot block get_appointment" type="button">Car Model : {{$userbid->model}}</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="d-grid gap-2 ">
                                        <button class="btn text-center btn-primary get_quot block get_appointment" type="button">Car Make : {{$company->company}}</button>
                                    </div>
                                </div>
                                <?php $userbidcateg = \App\Models\UserBidCategory::where('user_bid_id',$data->user_bid_id)->pluck('category_id');
                                $userbidcategories = \App\Models\Category::whereIn('id',$userbidcateg)->get(); ?>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="d-grid gap-2 ">
                                        <button class="btn text-center btn-primary get_quot block get_appointment" type="button">Type of Service : @foreach($userbidcategories as $userbidcategory)  {{$userbidcategory->name}}, @endforeach</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="d-grid gap-2 ">
                                        <button class="btn text-center btn-primary get_quot block get_appointment" type="button">Customer Name : {{auth()->user()->name}}</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
