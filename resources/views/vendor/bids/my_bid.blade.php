@extends('vendor.layout.app')
@section('content')
<section class="pb-5 login_content_wraper" style="background-image:url(assets/images/gradiantbg.jpg);">
    <div class="container-lg container-fluid">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                    <h4 class="sec_main_heading text-center mb-0">MY BIDS</h4>
                    <p class="sec_main_para text-center">See to what quotes you have submitted your bids</p>
                </div>
            </div>
        </div>
        <div class="row g-3 g-lg-4">
            @forelse($data as $bid)
            <div class="col-lg-6 col-md-6 col-sm-6 col-10  mx-auto">
                <div class="all_quote_card replies_allquot h-100 ">
                    <div class="car_inner_imagg ">
                        <?php
                          $user = \App\Models\UserBid::find($bid->user_bid_id);
                          $img = \App\Models\UserBidImage::where('user_bid_id',$bid->userBid->id)->where('type','image')->oldest()->first();
                          $img1=Explode(",",$img->car_image);
                       
                       ?>
                        <img src="{{asset($img1[0])}}">

                    </div>
                    <div class=" w-100  quote_detail_wraper replies dashboard_activ_bid ">
                        <div class="quote_info">
                            <h5 class="d-flex align-items-center active_quote nowrape ">
                                {{$bid->userBid->company->company}} ({{$bid->userBid->model}})</h5>
                            <p class="mb-0">{{$bid->userBid->user->name}}</p>
                            <p>{{$bid->userBid->user->phone}}</p>
                        </div>
                        <div class="quote_detail_btn_wraper replies">
                            <div class="d-flex chat_view__detail qoute_replies flex-row">
                                <a href="{{url('vendor/chat/'.$user->user_id)}}" class="chat_icon mx-xl-3 ">
                                    <i class="fa-solid fa-message"></i>
                                    <!-- <img src="assets/images/meassageiconblk.svg"> -->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-10  mx-auto">
                <div class="all_quote_card  replies_allquot h-100">
                    <div class=" w-100  quote_detail_wraper replies my_bids">
                        <div class="quote_info">
                            <h5 class="d-flex align-items-center active_quote nowrape">My Quote</h5>
                            <div class="quote_detail_btn_wraper">
                                <h5 class="quotereplies">AED {{$bid->price}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <a href="{{url('vendor/bid-details',$bid->id)}}" class="btn btn-secondary">View Details</a>
                    </div>

                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</section>
@endsection