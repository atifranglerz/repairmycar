@extends('web.layout.app')
@section('content')
<section class="banner_section">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-caption " style="z-index: 1;">
            <h2 class="heading">SEARCH AND FIND THE BEST GARAGES FOR YOU</h2>
            <div class="banner_dot_img">
                <img src="{{ asset('public/assets/images/divider.svg') }}">
            </div>
            <p>Customer’s Journey</p>
            <div class="banner_btn_main_wraper">
                <div class=" banner_btn_inner_wrapper">
                    <div class=" banner_btn__sub_wraper">
                        <img src="{{ asset('public/assets/images/bannericon1.svg') }}">
                        <a href="{{route('register')}}" class=" banner_btns">Sign Up</a>
                    </div>
                    <div class=" banner_btn__sub_wraper">
                        <img src="{{ asset('public/assets/images/bannericon2.svg') }}">
                        <a href="{{route('user.login')}}" class=" banner_btns">Place an order</a>
                    </div>
                    <div class=" banner_btn__sub_wraper">
                        <img src="{{ asset('public/assets/images/bannericon3.svg') }}">
                        <a href="" class=" banner_btns">Vendors Realtime quotes</a>
                    </div>
                    <div class=" banner_btn__sub_wraper">
                        <img src="{{ asset('public/assets/images/bannericon4.svg') }}">
                        <a href="{{route('vendorlist')}}" class=" banner_btns">Select a Garage/Vendor</a>
                    </div>
                </div>
                <div class="divider mt-3 ">
                    <span></span>
                </div>
            </div>
            <div class="banner_search_box_wraper">
                <form action="{{route('search-garage')}}" class="d-flex banner_form">
                    <select class="form-select form-control me-lg-2 me-md-2 mb-2 mb-sm-0 me-2 banner_select category"
                        aria-label="Default select example" id="selCatFilter">
                        <option selected disabled value="">Select category</option>
                        @foreach($all_services as $value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                    <!-- <input class="typeahead form-control form-control me-lg-5 me-md-5 me-sm-2 mb-2 mb-sm-0 banner_select" type="text" autocomplete="off" placeholder="Input Garage Name" aria-label="Default select example" id="searchKeyword" name="keywords" maxlength="50"> -->
                    <select class="form-select form-control me-lg-2 me-md-2 mb-2 mb-sm-0 me-2 banner_select"
                        aria-label="Default select example" name="garage" id="selGarFilter">
                        <option selected disabled value="">Select Category First</option>

                    </select>
                    <button class="btn  search_btn" type="submit">SEARCH</button>
                </form>
            </div>
        </div>
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active "
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            @forelse($slider as $slider_image)
            @if($loop->iteration==1)
            <div class="carousel-item active">
                <img src="{{ asset($slider_image->image) }}" class="d-block w-100" alt="banner image">
            </div>
            @else
            <div class="carousel-item ">
                <img src="{{ asset($slider_image->image) }}" class="d-block w-100" alt="banner image">
            </div>
            @endif
            @empty
            @endforelse

        </div>
    </div>
</section>
<section class="looking_for">
    <div class="container-lg container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="main_content_wraper">
                    <h4 class="sec_main_heading text-center">looking for</h4>
                    <p class="sec_main_para text-center">get expert car service providers to get your car repaired</p>
                </div>
            </div>
        </div>
        <div class="row g-3">
            @foreach($services as $value)
            <div class=" col-xl-3 col-lg-3 col-md-4 col-sm-4">
                <a href="{{route('vendors-by-service',$value->id)}}">
                    <div class="img_wraper">
                        <img src="{{ $value->image }}">
                        <h6 class="img_text">{{$value->name}}</h6>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <div class="text-center view_all_btn_wrapper">
                    <a href="{{route('car_service')}}" class="view_all_btn">view all
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- done -->
<section class="looking_for" id="used_car">
    <div class="container-lg container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="main_content_wraper">
                    <h4 class="sec_main_heading text-center">used cars for sale</h4>
                    <p class="sec_main_para text-center">find used cars for sale around you</p>

                </div>
            </div>
        </div>
        <div class="row g-3">
            @foreach($ads as $value)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="{{route('car_detail',$value->id)}}">
                    <div class="card card_vendors shadow">
                        <div class="car_img_wrapper">
                            <?php
                                $img1=Explode(",",$value->images);
                            ?>
                            <img src="{{ asset($img1[0]) }}" class="card-img-top" alt="Car image">
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="card-title block-head-txt">{{ $value->model }}</h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="card-title price mb-0 ">Price : AED {{ $value->price }}</h5>
                                <h5 class="card-title location mb-0 ">{{ $value->city }}</h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <div class="text-center view_all_btn_wrapper">
                    <a href="{{route('used_cars')}}" class="view_all_btn">view all
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- done -->
<section class="about_connect bg_img"
    style=" background-image: url('{{ asset('public/assets/images/indexsideimage.png ')}}' );">
    <div class="container-lg container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-12  ">
                <div class="main_content_wraper about_connect_wraper">
                    <h4 class="sec_main_heading about_connect_heading mb-4">Repair My Car</h4>
                    <p class="about_connect_txt">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                        survived not only five centuries, but also the leap into electronic</p>
                    <p class="about_connect_txt">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                        survived not only five centuries, but also the leap into electronic</p>

                    <p class="about_connect_txt">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                        survived not only five centuries, but also the leap into electronic</p>

                    <!-- <p class="sec_main_para">find used cars for sale around you</p> -->

                </div>
            </div>
            <!-- <div class="col-lg-6">

                </div>
              -->
        </div>
    </div>
</section>
<!-- done -->
<section class="looking_for">
    <div class="container-lg container-fluid ">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="main_content_wraper">
                    <h4 class="sec_main_heading text-center">top rated vendors</h4>
                    <p class="sec_main_para text-center">find some popular service providers based on their quality</p>
                </div>
            </div>
        </div>
        <div class="row g-3">
            @if(count($garage) > 0)
            @foreach($garage as $value)
            <div class="col-lg-3 col-md-4 col-sm-4">
                <a href="{{route('gerage_detail',$value->id)}}">
                    <div class="card card_vendors shadow">
                        <div class="car_img_wrapper">
                            <img @if($value->image) src="{{$value->image}}" @else
                            src="{{ asset('public/assets/images/repair2.jpg') }}" @endif class="card-img-top" alt="Car
                            image">
                        </div>
                        <?php
                            $overAllRatings = 0.0;
                            $totalReviews = \App\Models\UserReview::where('garage_id',$value->id)->count();
                            $rating= \App\Models\UserReview::where('garage_id',$value->id)->sum('rating');
                            if($rating ==0)
                            {
                                $overAllRatings = 0.0;
                            }else{
                                $overAllRatings = $rating/$totalReviews;
                            }
                            ?>
                        <div class="card-body p-sm-2">
                            <h6 class="block-head-txt text-center">{{$value->garage_name}}</h6>
                            <h5 class="card-title text-center allgarages_card_title"><span>{{$overAllRatings}}</span>
                            </h5>
                            <div class="card_icons d-flex justify-content-center align-items-center">
                                <?php $category = \App\Models\GarageCategory::where('garage_id',$value->id)->pluck('category_id');
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
                </a>
            </div>
            @endforeach
            @else
            Oops... Sorry no garrages found !
            @endif
        </div>
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <div class="text-center view_all_btn_wrapper">
                    <a href="{{route('vendorlist')}}" class="view_all_btn">view all</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- done -->
<section class="py-5 about_connect looking_for">
    <div class="container-lg container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="main_content_wraper">
                    <h4 class="sec_main_heading text-center">latest news</h4>
                    <p class="sec_main_para text-center">keep yourself updated !</p>
                </div>
            </div>
        </div>

        <div class="row g-3">
            @foreach($news as $value)
            <div class="col-lg-3 col-md-4 col-sm-4">
                <a href="{{route('news_detail',$value->id)}}">
                    <div class="card card_vendors shadow">
                        <div class="car_img_wrapper latest_news">
                            <img src="{{ $value->image }}" class="card-img-top" alt="Car image">
                        </div>
                        <div class="card-body px-lg-4 px-sm-2">
                            <p class="card-title date ">{{$value->created_at}} Jan 1, 2022</p>
                            <p class="sec_main_para car_text ">{{$value->title}}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <div class="text-center view_all_btn_wrapper">
                    <a href="{{route('news')}}" class="view_all_btn">view all</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- done -->
<section class="looking_for">
    <div class="container-lg container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="main_content_wraper">
                    <h4 class="sec_main_heading text-center">near you</h4>
                    <p class="sec_main_para text-center">Find some popular service providers based on their quality</p>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-lg-3 col-md-4 col-sm-4">
                <a href="{{route('vendorlist')}}">
                    <div class="card card_vendors shadow">
                        <div class="car_img_wrapper">
                            <img src="{{ asset('public/assets/images/lambo-banner.jpg') }}" class="card-img-top"
                                alt="Car image">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title text-center block-head-txt">Best Lamborghini Service</h6>
                            <div class="card_icons d-flex justify-content-center align-items-center">
                                <div class="icon_wrpaer">
                                    <img src="{{ asset('public/assets/images/iconrp.svg') }}">
                                </div>
                                <div class="icon_wrpaer">
                                    <img src="{{ asset('public/assets/images/iconrp2.svg') }}">
                                </div>
                                <div class="icon_wrpaer">
                                    <img src="{{ asset('public/assets/images/iconrp3.svg') }}">
                                </div>
                                <div class="icon_wrpaer">
                                    <img src="{{ asset('public/assets/images/iconrp4.svg') }}">
                                </div>
                                <div class="icon_wrpaer">
                                    <img src="{{ asset('public/assets/images/iconrp5.svg') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-4">
                <a href="{{route('vendorlist')}}">
                    <div class="card card_vendors shadow">
                        <div class="car_img_wrapper">
                            <img src="{{ asset('public/assets/images/rolls-royce-banner.jpg') }}" class="card-img-top"
                                alt="Car image">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title text-center  block-head-txt">Best Rolls Royce Service</h6>
                            <div class="card_icons d-flex justify-content-center align-items-center">
                                <div class="icon_wrpaer">
                                    <img src="{{ asset('public/assets/images/iconrp.svg') }}">
                                </div>
                                <div class="icon_wrpaer">
                                    <img src="{{ asset('public/assets/images/iconrp2.svg') }}">
                                </div>
                                <div class="icon_wrpaer">
                                    <img src="{{ asset('public/assets/images/iconrp3.svg') }}">
                                </div>
                                <div class="icon_wrpaer">
                                    <img src="{{ asset('public/assets/images/iconrp4.svg') }}">
                                </div>
                                <div class="icon_wrpaer">
                                    <img src="{{ asset('public/assets/images/iconrp5.svg') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4">
                <a href="{{route('vendorlist')}}">
                    <div class="card card_vendors shadow">
                        <div class="car_img_wrapper">
                            <img src="{{ asset('public/assets/images/mclaren-banner.jpg') }}" class="card-img-top"
                                alt="Car image">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title text-center  block-head-txt">Mclaren Service Center</h6>
                            <div class="card_icons d-flex justify-content-center align-items-center">
                                <div class="icon_wrpaer">
                                    <img src="{{ asset('public/assets/images/iconrp.svg') }}">
                                </div>
                                <div class="icon_wrpaer">
                                    <img src="{{ asset('public/assets/images/iconrp2.svg') }}">
                                </div>
                                <div class="icon_wrpaer">
                                    <img src="{{ asset('public/assets/images/iconrp3.svg') }}">
                                </div>
                                <div class="icon_wrpaer">
                                    <img src="{{ asset('public/assets/images/iconrp4.svg') }}">
                                </div>
                                <div class="icon_wrpaer">
                                    <img src="{{ asset('public/assets/images/iconrp5.svg') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4">
                <a href="{{route('vendorlist')}}">
                    <div class="card card_vendors shadow">
                        <div class="car_img_wrapper">
                            <img src="{{ asset('public/assets/images/porche.jpg') }}" class="card-img-top"
                                alt="Car image">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title text-center  block-head-txt">Porsche Car Repair</h6>
                            <div class="card_icons d-flex justify-content-center align-items-center">
                                <div class="icon_wrpaer">
                                    <img src="{{ asset('public/assets/images/iconrp.svg') }}">
                                </div>
                                <div class="icon_wrpaer">
                                    <img src="{{ asset('public/assets/images/iconrp2.svg') }}">
                                </div>
                                <div class="icon_wrpaer">
                                    <img src="{{ asset('public/assets/images/iconrp3.svg') }}">
                                </div>
                                <div class="icon_wrpaer">
                                    <img src="{{ asset('public/assets/images/iconrp4.svg') }}">
                                </div>
                                <div class="icon_wrpaer">
                                    <img src="{{ asset('public/assets/images/iconrp5.svg') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <div class="text-center view_all_btn_wrapper">
                    <a href="{{route('vendorlist')}}" class="view_all_btn">view all</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mb-0 looking_for footer_before_sec"
    style="background-image: url({{ asset('public/assets/images/cleaning-1837331.jpg ')}}); ">
    <div class="container-lg container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 col-md-8 col-sm-8">
                <div class="rigister_heading">
                    <h4 class="heading">REGISTER YOUR GARAGE/WORKSHOP</h4>
                </div>
            </div>
            <div class="col-lg-2 col-md-1 col-sm-1"></div>
            <div class="col-lg-4 col-md-3 col-sm-3">
                <div class="rigister_btn d-flex justify-content-center align-items-center">
                    <a href="{{route('vendor.register')}}">REGISTER</a>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {

    $(".category").on("change", function() {
        var val = $("#selCatFilter option:selected").val();

        $.ajax({
            url: '{{URL::to(' / category - garage ')}}',
            type: 'GET',
            data: {
                'val': val
            },

            success: function(response) {
                $("#selGarFilter").empty();
                $("#selGarFilter").append(response);

            }
        });
    });


});
</script>
@endsection