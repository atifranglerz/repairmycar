@extends('vendor.layout.app')
@section('content')
    <?php  $company = \App\Models\Company::where('id',$data->company_id)->first();?>
<section class="pb-5 login_content_wraper" style="background-image:url(assets/images/gradiantbg.jpg);">
    <div class="container-lg container-fluid" >
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                    <h1 class="sec_main_heading text-center mb-0"> MY OFFERED QUOTE</h1>
                    <p class="sec_main_para text-center">See How You Responded To This Request</p>
                </div>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-lg-12 col-md-12 col-12  mx-auto">
                <div class="all_quote_card replies_allquot ">
                    <div class=" w-100  quote_detail_wraper replies ">
                        <div class="active_bid_dtl_card_left">
                            <div class="quote_info">
                                <h3 class="d-flex align-items-center active_quote nowrape ">{{$company->company}}</h3>
                                <p class="mb-0">{{$data->car_owner_name}}</p>

                                <p class="mb-0">{{$data->phone}}</p>
                                <p class="milage">Mileage  <span>{{$data->mileage}}km</span></p>
                            </div>

                            <div class="d-flex chat_view__detail qoute_replies vendor_order days ">
                                <h3 class="active_bidDay">7 Days</h3>
                                <a href="#" class="chat_icon">
                                    <i class="fa-solid fa-message"></i>
                                    <!-- <img src="assets/images/meassageiconblk.svg"> -->
                                </a>
                            </div>

                        </div>
                        <div class=" active_bid_dtl_card_right">
                            <h3 class="offer_quote_heading">{{$data->model}}</h3>
                            <h3 class="offer_quote_heading second_heading">My Quote <span>AED 1200</span></h3>
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
                        <p>{{$data->description1}}</p>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $images = \App\Models\UserBidImage::where('user_bid_id',$data->id)->where('type','image')->get();?>
        <div class="row">
            <div class="col-lg-12">
                <div class="all_quote_card  vendor_rply_dtlL _text">
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
                                        <img src="{{ asset($image->car_image) }}">
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
                        @elseif(count($images) == 2)
                            @foreach($images as $image)
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset($image->car_image) }}">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @foreach($images as $image)
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset($image->car_image) }}">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </div>
        <?php
        $documents = \App\Models\UserBidImage::where('user_bid_id',$data->id)->where('type','file')->get();?>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="all_quote_card  vendor_rply_dtlL _text">
                    <div class="owl-carousel carousel_se_03_carousel owl-theme mt-5">
                        @if(count($documents) == 0)
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
                        @elseif(count($documents) == 1)
                            @foreach($documents as $image)
                                <?php $pathinfo = pathinfo($image->car_image);
                                $supported_ext = array('docx', 'xlsx', 'pdf');
                                $src_file_name = $image->car_image;
                                $ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION)); ?>
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        @if($ext=="docx")
                                        <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                        <img src="{{ asset('public/assets/images/wordicon.png') }}" style="height: 100%;">
                                        </a>
                                        @elseif($ext=="doc")
                                        <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                        <img src="{{ asset('public/assets/images/wordicon.png') }}" style="height: 100%;">
                                        </a>
                                        @elseif($ext=="xlsx")
                                        <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                        <img src="{{ asset('public/assets/images/excelicon.png') }}" style="height: 100%;">
                                        </a>
                                        @elseif($ext=="pdf")
                                        <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                        <img src="{{ asset('public/assets/images/pdficon.png') }}" style="height: 100%;">
                                        </a>
                                        @else
                                        <img src="{{ asset($image->car_image) }}">
                                        @endif


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
                        @elseif(count($documents) == 2)
                            @foreach($documents as $image)
                                <?php $pathinfo = pathinfo($image->car_image);
                                $supported_ext = array('docx', 'xlsx', 'pdf');
                                $src_file_name = $image->car_image;
                                $ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION)); ?>
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        @if($ext=="docx")
                                            <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                                <img src="{{ asset('public/assets/images/wordicon.png') }}" style="height: 100%;">
                                            </a>
                                        @elseif($ext=="doc")
                                            <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                                <img src="{{ asset('public/assets/images/wordicon.png') }}" style="height: 100%;">
                                            </a>
                                        @elseif($ext=="xlsx")
                                            <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                                <img src="{{ asset('public/assets/images/excelicon.png') }}" style="height: 100%;">
                                            </a>
                                        @elseif($ext=="pdf")
                                            <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                                <img src="{{ asset('public/assets/images/pdficon.png') }}" style="height: 100%;">
                                            </a>
                                        @else
                                            <img src="{{ asset($image->car_image) }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @foreach($documents as $image)
                                <?php $pathinfo = pathinfo($image->car_image);
                                $supported_ext = array('docx', 'xlsx', 'pdf');
                                $src_file_name = $image->car_image;
                                $ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION)); ?>
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        @if($ext=="docx")
                                            <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                                <img src="{{ asset('public/assets/images/wordicon.png') }}" style="height: 100%;">
                                            </a>
                                        @elseif($ext=="doc")
                                            <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                                <img src="{{ asset('public/assets/images/wordicon.png') }}" style="height: 100%;">
                                            </a>
                                        @elseif($ext=="xlsx")
                                            <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                                <img src="{{ asset('public/assets/images/excelicon.png') }}" style="height: 100%;">
                                            </a>
                                        @elseif($ext=="pdf")
                                            <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                                <img src="{{ asset('public/assets/images/pdficon.png') }}" style="height: 100%;">
                                            </a>
                                        @else
                                            <img src="{{ asset($image->car_image) }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>


                    <h3 class="active_order_req">Police /Accident /Inspection Report</h3>

                    <div class="vendor__rply__dttl">
                        <p>{{$data->description2}}</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="all_quote_card  vendor_rply_dtlL _text">
                    <form action="{{ route('vendor.bidresponse') }}" method="post">
                        @csrf
                        <div class="row ">
                            <div class="col-lg-7 mx-auto">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                                        <input type="hidden" name="bid_id" value="{{$data->id}}">
                                        <input type="hidden" name="vendor_id" value="{{auth()->id()}}">
                                        <?php $garage = \App\Models\Garage::where('vendor_id',auth()->id())->first();?>
                                        <input type="hidden" name="garage_id" value="{{$garage->id}}">
                                        <input type="number" name="price" class="form-control" placeholder="AED">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                                        <input type="text"  name="time" class="form-control" placeholder="TimeFrame">
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-3">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="description" placeholder="Add information in details" id="floatingTextarea2" style="height: 106px"></textarea>
                                            <label for="floatingTextarea2">Add Repairing Details</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="d-grid gap-2 mt-3 mb-4">
                                                <button class="btn btn-secondary block get_appointment" type="submit">SUBMIT QUOTE</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
