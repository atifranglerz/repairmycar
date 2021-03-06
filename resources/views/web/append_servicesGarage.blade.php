
    @if(count($garages) > 0)
        @foreach($garages as $value)
            <div class="col-lg-3 col-md-4 col-sm-4">
                <a href="{{route('gerage_detail',$value->garage->id)}}">
                    <div class="card card_vendors shadow" >
                        <div class="car_img_wrapper all_garages">
                            <img @if($value->garage->image && $value->garage->image != null) src="{{asset($value->garage->image)}}" @else src="{{ asset('public/assets/images/repair2.jpg') }}" @endif class="card-img-top" alt="Car image">
                            {{--                                <div class="promoted_vendors">--}}
                            {{--                                    <p>PREFERRED VENDOR</p>--}}
                            {{--                                    <i class="fa-solid fa-star"></i>--}}
                            {{--                                </div>--}}
                        </div>

                        <div class="card-body p-sm-2">
                            <h6 class="block-head-txt text-center">{{$value->garage->garage_name}}</h6>
                            <h5 class="card-title text-center allgarages_card_title"><span>@if(isset($overAllRatings))?{{$overAllRatings}}:'' @endif</span></h5>
                            <div class="card_icons d-flex justify-content-center align-items-center">
                                <?php $category = \App\Models\GarageCategory::where('garage_id',$value->garage->id)->pluck('category_id');
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
        Oops... Sorry no garrages found related to this category service !
    @endif


