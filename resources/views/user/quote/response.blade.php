@extends('user.layout.app')
@section('content')
<section class="pb-5 login_content_wraper" style="background-image:url(public/assets/images/gradiantbg.jpg);">
    <div class="container-lg container-fluid" >
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                    <h1 class="sec_main_heading text-center mb-0">RESPONSE TO YOUR QUOTES</h1>
                    <p class="sec_main_para text-center">See what garage owners have to say about your quote</p>
                </div>
            </div>
        </div>
        <div class="row g-2">
            @if(count($data) >0)
            @foreach($data as $value)
                <?php
                $userbid = \App\Models\UserBid::where('id',$value->user_bid_id)->first();
                $img = \App\Models\UserBidImage::where('user_bid_id',$userbid->id)->where('type','image')->oldest()->first();
                $company = \App\Models\Company::where('id',$userbid->company_id)->first();
                ?>
            <div class="col-lg-6 col-md-6 col-sm-6 col-10  mx-auto">
                <div class="all_quote_card replies_allquot h-100 ">
                    <div class="car_inner_imagg replies_qout">
                        <img src="{{ asset($img->car_image) }}">
                    </div>
                    <div class=" w-100  quote_detail_wraper replies ">
                        <div class="quote_info">
                            <h3 class="d-flex align-items-center active_quote nowrape ">{{$company->company}}  {{$userbid->model}}</h3>
                            <p class="mb-0">{{$userbid->description1}}</p>
                            <p >{{$userbid->phone}}</p>
                        </div>
                        <div class="quote_detail_btn_wraper replies">
                            <div class="d-flex chat_view__detail qoute_replies">
                                <a href="#" class="chat_icon">
                                    <i class="fa-solid fa-message"></i>
                                    <!--   <img src="public/user/assets/images/meassageiconblk.svg"> -->
                                </a>
                                <div class="card_icons respons_qoute d-flex justify-content-center align-items-center">
                                    <?php $category = \App\Models\GarageCategory::where('garage_id',$value->garage_id)->pluck('category_id');
                                    $category_name = \App\Models\Category::whereIn('id',$category)->get();
                                    ?>
                                    @foreach($category_name as $catname)
                                        <div class="icon_wrpaer">
                                            <img src="{{asset($catname->icon)}}">
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-10   mx-auto">
                <div class="all_quote_card  replies_allquot h-100">
                    <div class=" w-100  quote_detail_wraper replies second">
                        <div class="quote_info">
                            <h3 class="d-flex align-items-center active_quote nowrape">{{$value->vendordetail->name}}</h3>
                            <div class="quote_detail_btn_wraper">
                                <h3 class="quotereplies">AED {{$value->price}} </h3>
                            </div>
                        </div>
                        <div class="quote_detail_btn_wraper">
                            <div class="d-flex align-items-center chat_view__detail allreplies ">
                                <a href="{{route('user.vendorReply',$value->id)}}" class="btn-secondary">VIEW DETAILS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              @endforeach
            @else
                <div class="col-lg-6 col-md-6 col-sm-6 col-10  mx-auto">
                    <div class="all_quote_card replies_allquot h-100 ">

                        <div class=" w-100  quote_detail_wraper replies ">

                                <p class="mb-0">No response has been added by users on your quote !</p>

                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
