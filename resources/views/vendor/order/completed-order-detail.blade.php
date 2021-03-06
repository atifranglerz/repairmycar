@extends('vendor.layout.app')
@section('content')
<section class="pb-5 login_content_wraper">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                    <h1 class="sec_main_heading text-center mb-0">ORDER COMPLETED</h1>
                    <!-- <p class="sec_main_para text-center">See what are the active orders you have</p> -->
                </div>
            </div>
        </div>
        <?php          
            $company = \App\Models\Company::where('id',$order->userbid->company_id)->first();
            $modelYear = \App\Models\ModelYear::find($order->userbid->model_year_id);
            $user = \App\Models\User::find($order->userbid->user_id);
            $userbidimage = \App\Models\UserBidImage::where([['user_bid_id',$order->userbid->id],['type','image']])->first();
            $userbidimage = explode(',',$userbidimage->car_image);
            $review_prev = \App\Models\UserReview::where('user_id',$user->id)->where('garage_id',$order->garage_id)->first();
        ?>
        <div class="row g-2">
            <div class="col-lg-5 col-md-12 col-11  mx-auto">
                <div class="all_quote_card replies_allquot ">
                    <div class=" w-100  quote_detail_wraper replies ">
                        <div class="quote_info">
                            <h3 class="d-flex align-items-center active_quote nowrape ">Car Details</h3>
                            <p class="mb-0">{{$order->customer_name}}</p>

                            <p class="mb-0">{{$user->phone}}</p>
                            <p class="milage">Mileage <span>{{$order->userbid->mileage}}km</span></p>
                        </div>
                        <div class="quote_detail_btn_wraper replies">
                            <h3 class="vendor_order_id">Order Id: #{{$order->order_code}}</h3>
                            <div class="d-flex chat_view__detail qoute_replies vendor_order ">
                                <h3 class="">{{$order->vendorbid->time}} Days</h3>
                                <a href="{{url('vendor/chat/'.$user->id)}}" class="justify-content-center chat_icon"> <i class="fa-solid fa-message"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-11  mx-auto">
                <div class="all_quote_card replies_allquot h-100 ">
                    <div class=" w-100  quote_detail_wraper replies ">
                        <div class="quote_info">
                            <h3 class="d-flex align-items-center active_quote nowrape  ">{{ $company->company}}</h3>
                            <p class="mb-0">{{$modelYear->model_year}}</p>
                            <p class="mb-0">{{ $company->company}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-11  mx-auto">
                <div class="all_quote_card  replies_allquot h-100">
                    <div class=" w-100  quote_detail_wraper replies payviainsu">
                        <div class="quote_detail_btn_wraper">
                            <div class="d-flex align-items-center chat_view__detail allreplies ">
                                <div class="pay_via_insurance_header_garages">
                                    <p>Payed Via Insurance</p>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                        </div>
                        <div class="quote_info">
                            <h3 class="d-flex align-items-center active_quote nowrape"> Budget</h3>
                            <div class="quote_detail_btn_wraper">
                                <h3 class="quotereplies">AED {{$order->total}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  mt-5">
            <div class="col-lg-12">
                <div class="all_quote_card  vendor_rply_dtlL _text mb-5">
                    <h3 class="active_order_req">Requirments</h3>

                    <div class="vendor__rply__dttl">
                        <p>{{$order->vendorbid->description}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  ">
            <div class="col-lg-12">
                <div class="all_quote_card  vendor_rply_dtlL _text mb-5">
                    <div class="owl-carousel carousel_se_03_carousel owl-theme mt-5">
                        @if($userbidimage && count($userbidimage) == 0)
                        <div class="item">
                            <div class="carAd_img_wraper doc_img customer_dashboard">
                                <img src="{{ asset('public/assets/images/no-preview.png') }}">
                            </div>
                        </div>
                        <div class="item">
                            <div class="carAd_img_wraper carAd_img_wraper doc_img customer_dashboard">
                                <img src="{{ asset('public/assets/images/no-preview.png') }}">
                            </div>
                        </div>
                        <div class="item">
                            <div class="carAd_img_wraper carAd_img_wraper doc_img customer_dashboard">
                                <img src="{{ asset('public/assets/images/no-preview.png') }}">
                            </div>
                        </div>
                        @elseif($userbidimage && count($userbidimage) == 1)
                        @foreach($userbidimage as $image)
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
                        <div class="item">
                            <div class="carAd_img_wraper carAd_img_wraper doc_img customer_dashboard">
                                <img src="{{ asset('public/assets/images/no-preview.png') }}">
                            </div>
                        </div>
                        <div class="item">
                            <div class="carAd_img_wraper carAd_img_wraper doc_img customer_dashboard">
                                <img src="{{ asset('public/assets/images/no-preview.png') }}">
                            </div>
                        </div>
                        @elseif($userbidimage && count($userbidimage) == 2)
                        @foreach($userbidimage as $image)
                        <div class="item">
                            <div class="carAd_img_wraper doc_img customer_dashboard">
                                <img src="{{ asset($image) }}">
                            </div>
                        </div>
                        @endforeach
                        <div class="item">
                            <div class="carAd_img_wraper carAd_img_wraper doc_img customer_dashboard">
                                <img src="{{ asset('public/assets/images/no-preview.png') }}">
                            </div>
                        </div>
                        @else
                        @foreach($userbidimage as $image)
                        <div class="item">
                            <div class="carAd_img_wraper doc_img customer_dashboard">
                                <img src="{{ asset($image) }}">
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row  ">
            <div class="col-lg-12">

                <div class="all_quote_card  vendor_rply_dtlL _text">
                    <div class="over_view_part carad_data vendor_detail">
                        <h3 class=" text-center mb-5">REPAIR DETAILS</h3>
                    </div>
                    <div class="vendor__rply__dttl">
                        <p>{{$order->vendorbid->description}}</p>
                    </div>
                </div>
            </div>
        </div>
        @if(isset($review_prev))
        <div class="row  mt-5">
                <div class="col-lg-12">
                    <div class="all_quote_card  vendor_rply_dtlL _text">
                        <div class="over_view_part carad_data vendor_detail">
                            <h3 class=" text-center mb-4">YOUR REVIEW</h3>
                        </div>
                        <div class="d-flex align-items-center rating-stars">
                            <div class="rating-group">
                                @if($review_prev->rating == '0')
                                <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                <label aria-label="0.5 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                <label aria-label="1 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                <label aria-label="1.5 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                <label aria-label="2 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                <label aria-label="2.5 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                @elseif($review_prev->rating == '0.5')
                                <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                <label aria-label="0.5 stars" class="rating__label rating__label--half" for="rating2-05"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="1 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                <label aria-label="1.5 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                <label aria-label="2 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                <label aria-label="2.5 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                <label aria-label="3 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                @elseif($review_prev->rating == '1')
                                <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                <label aria-label="0.5 stars" class="rating__label rating__label--half" for="rating2-05"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="1 star" class="rating__label" for="rating2-10"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="1.5 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                <label aria-label="2 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                <label aria-label="2.5 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                <label aria-label="3 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                @elseif($review_prev->rating == '1.5')
                                <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                <label aria-label="0.5 stars" class="rating__label rating__label--half" for="rating2-05"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="1 star" class="rating__label" for="rating2-10"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="1.5 stars" class="rating__label rating__label--half" for="rating2-15"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="2 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                <label aria-label="2.5 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                <label aria-label="3 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                <label aria-label="3.5 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                @elseif($review_prev->rating == '2')
                                <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                <label aria-label="0.5 stars" class="rating__label rating__label--half" for="rating2-05"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="1 star" class="rating__label" for="rating2-10"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="1.5 stars" class="rating__label rating__label--half" for="rating2-15"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="2 stars" class="rating__label" for="rating2-20"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="3.5 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                <label aria-label="4 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                <label aria-label="3.5 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                @elseif($review_prev->rating == '2.5')
                                <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                <label aria-label="0.5 stars" class="rating__label rating__label--half" for="rating2-05"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="1 star" class="rating__label" for="rating2-10"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="1.5 stars" class="rating__label rating__label--half" for="rating2-15"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="2 stars" class="rating__label" for="rating2-20"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="2.5 stars" class="rating__label rating__label--half" for="rating2-25"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="3 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                <label aria-label="3.5 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                <label aria-label="4 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                @elseif($review_prev->rating == '3')
                                <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                <label aria-label="0.5 stars" class="rating__label rating__label--half" for="rating2-05"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="1 star" class="rating__label" for="rating2-10"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="1.5 stars" class="rating__label rating__label--half" for="rating2-15"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="2 stars" class="rating__label" for="rating2-20"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="2.5 stars" class="rating__label rating__label--half" for="rating2-25"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="3 stars" class="rating__label" for="rating2-30"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="3.5 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                <label aria-label="4 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                @elseif($review_prev->rating == '3.5')
                                <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                <label aria-label="0.5 stars" class="rating__label rating__label--half" for="rating2-05"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="1 star" class="rating__label" for="rating2-10"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="1.5 stars" class="rating__label rating__label--half" for="rating2-15"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="2 stars" class="rating__label" for="rating2-20"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="2.5 stars" class="rating__label rating__label--half" for="rating2-25"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="3 stars" class="rating__label" for="rating2-30"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="3.5 stars" class="rating__label rating__label--half" for="rating2-35"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="4 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                <label aria-label="4.5 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>

                                @elseif($review_prev->rating == '4')
                                <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                <label aria-label="0.5 stars" class="rating__label rating__label--half" for="rating2-05"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="1 star" class="rating__label" for="rating2-10"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="1.5 stars" class="rating__label rating__label--half" for="rating2-15"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="2 stars" class="rating__label" for="rating2-20"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="2.5 stars" class="rating__label rating__label--half" for="rating2-25"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="3 stars" class="rating__label" for="rating2-30"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="3.5 stars" class="rating__label rating__label--half" for="rating2-35"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="4 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="4.5 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                @elseif($review_prev->rating == '4.5')
                                <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                <label aria-label="0.5 stars" class="rating__label rating__label--half" for="rating2-05"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="1 star" class="rating__label" for="rating2-10"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="1.5 stars" class="rating__label rating__label--half" for="rating2-15"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="2 stars" class="rating__label" for="rating2-20"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="2.5 stars" class="rating__label rating__label--half" for="rating2-25"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="3 stars" class="rating__label" for="rating2-30"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="3.5 stars" class="rating__label rating__label--half" for="rating2-35"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="4 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="4.5 stars" class="rating__label rating__label--half" for="rating2-45"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="5 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star" style="color: gray;"></i></label>
                                @elseif($review_prev->rating == '5')
                                <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                <label aria-label="0.5 stars" class="rating__label rating__label--half" for="rating2-05"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="1 star" class="rating__label" for="rating2-10"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="1.5 stars" class="rating__label rating__label--half" for="rating2-15"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="2 stars" class="rating__label" for="rating2-20"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="2.5 stars" class="rating__label rating__label--half" for="rating2-25"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="3 stars" class="rating__label" for="rating2-30"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="3.5 stars" class="rating__label rating__label--half" for="rating2-35"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="4 stars" class="rating__label" for="rating2-40"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <label aria-label="4.5 stars" class="rating__label rating__label--half" for="rating2-45"><i
                                        class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                <label aria-label="5 stars" class="rating__label" for="rating2-50"><i
                                        class="rating__icon rating__icon--star fa fa-star"></i></label>
                                @endif
                            </div>
                        </div>
                        <div class="review_text d-flex justify-content-center align-items-center">
                            <p>{{$review_prev->review ??''}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection