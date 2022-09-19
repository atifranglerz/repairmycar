@extends('vendor.layout.app')
@section('content')
<section class="pb-5 login_content_wraper" style="background-image:url(public/assets/images/gradiantbg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                    <h4 class="sec_main_heading text-center mb-0">{{__('msg.POST AN AD FOR USED CAR')}}</h4>
                    <p class="sec_main_para text-center">{{__("msg.Post Ad For Your Car You Want To Sell")}}</p>
                </div>
            </div>
        </div>


        <div class="row ">
            <div class="col-lg-9 col-md-11  mx-auto">
                <div class="bid_form_wraper">
                    <div class="row">
                        <div class="col-lg-8 mx-auto px-5 px-lg-1 ">
                        </div>
                        <form enctype="multipart/form-data" method="post" action="{{ route('vendor.ads.store') }}">
                            @csrf
                            <div class="row g-lg-3 g-2">
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <div class="input-images"></div>
                                    @error('car_images')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <div class="input-images-3">

                                    </div>
                                    @error('document')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" name="model" value="{{old('model')}}" class="form-control" placeholder="{{__('msg.Model')}} ({{__('msg.Required')}})"
                                        aria-label="Model">
                                    @error('model')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                    <span class="text-danger" id="nameError"></span>
                                </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <select class="form-select" name="company_id" aria-label="Type of Service">
                                    <option value="" selected disabled>{{__('msg.Company')}} ({{__('msg.Required')}})</option>
                                    @foreach($company as $data)
                                    <option value="{{$data->id }}" {{old('company_id') == $data->id ? 'selected' : ''}}>{{$data->company }}</option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                                <span class="text-danger" id="companyError"></span>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <select class="form-select" name="model_year_id" aria-label="Type of Service">
                                    <option value="" selected disabled>{{__('msg.Year')}} ({{__('msg.Required')}})</option>
                                    @foreach($year as $data)
                                    <option value="{{$data->id }}" {{old('model_year_id') == $data->id ? 'selected' : ''}}>{{$data->model_year }}</option>
                                    @endforeach
                                </select>
                                @error('model_year_id')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                                <span class="text-danger" id="model_year_Error"></span>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="number" name="price" value="{{old('price')}}" class="form-control" placeholder="{{__('msg.Price')}} ({{__('msg.Required')}})"
                                    aria-label="Price">
                                @error('price')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                                <span class="text-danger" id="priceError"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="text" name="color" value="{{old('color')}}" class="form-control" placeholder="{{{__('msg.Color')}}} ({{__('msg.Required')}})"
                                    aria-label="Color">
                                @error('color')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                                <span class="text-danger" id="colorError"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="text" name="engine" value="{{old('engine')}}" class="form-control" placeholder="{{__('msg.Engine')}} ({{__('msg.Required')}})"
                                    aria-label="Engine">
                                @error('engine')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                                <span class="text-danger" id="engineError"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="number" name="phone" value="{{old('phone')}}" class="form-control" placeholder="{{__('msg.Phone Number')}} ({{__('msg.Required')}})" onkeypress="if(this.value.length==12) return false"
                                    aria-label="phone">
                                @error('phone')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                                <span class="text-danger" id="phoneError"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div style="position: relative">
                                    <input type="text" name="address" value="{{old('address')}}" class="form-control"  placeholder="{{__('msg.Address')}} ({{__('msg.Required')}})" style="padding-right: 2rem">
                                    <span class="fa fa-location" aria-hidden="true" style="position: absolute;top: 10px;right: 10px"></span>
                                </div>
                                @error('address')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                                <span class="text-danger" id="AddressError"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <select class="form-select form-control" name="country" aria-label="Country" disabled>
                                    <option disabled value="">{{__('msg.Select Country')}}</option>
                                    <option value="United Arab Emirates" selected>{{__('msg.United Arab Emirates')}}</option>
                                </select>
                                @error('country')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <select class="form-select form-control" name="city" aria-label="City">
                                    <option selected disabled value="">{{__('msg.Select City')}} ({{__('msg.Required')}})</option>
                                    <option value="Dubai" @if(old('city')=='Dubai' ) selected @endif>{{__('msg.Dubai')}}</option>
                                    <option value="Abu Dhabi" @if(old('city')=='Abu Dhabi' ) selected @endif>{{__('msg.Abu Dhabi')}}</option>
                                    <option value="Sharjah" @if(old('city')=='Sharjah' ) selected @endif>{{__('msg.Sharjah')}}
                                    </option>
                                    <option value="Ras Al Khaimah" @if(old('city')=='Ras Al Khaimah' ) selected @endif>
                                        {{__('msg.Ras Al Khaimah')}}</option>
                                    <option value="Ajman" @if(old('city')=='Ajman' ) selected @endif>{{__('msg.Ajman')}}
                                    </option>
                                </select>
                                @error('city')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="number" name="mileage" value="{{old('mileage')}}" class="form-control" placeholder="{{__('msg.Mileage e.g 40 Km')}} ({{__('msg.Required')}})"
                                    aria-label="Price">
                                @error('mileage')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                                <span class="text-danger" id="millageError"></span>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="description"
                                        placeholder="" id="floatingTextarea2"
                                        style="height: 100px">{{old('description')}}</textarea>
                                    <label for="floatingTextarea2">{{__('msg.Add information in details')}} ({{__('msg.Optional')}})</label>
                                </div>
                                @error('description')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="d-grid gap-2 mt-lg-3 mb-lg-4">
                                    <button class="btn btn-secondary block get_appointment"
                                        type="submit">{{__('msg.SUBMIT')}}</button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
@section('script')
<script>
    toastr.options = {
        "closeButton": true,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    $(function() {
        if($('div').hasClass('text-danger')) {
        toastr.error("Failed! You've to fill the Required Fields");
        }
    });
</script>
@endsection
