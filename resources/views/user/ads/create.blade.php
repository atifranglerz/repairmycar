@extends('user.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper">
        <div class="container-lg container-fluid">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                        <h4 class="sec_main_heading text-center mb-0">{{ __('msg.POST AN AD FOR USED CAR') }}</h4>
                        <p class="sec_main_para text-center">{{ __('msg.Post Ad For Your Car You Want To Sell') }}</p>
                    </div>
                </div>
            </div>


            <div class="row ">
                <div class="col-lg-9 col-md-11 col-sm-12  mx-auto">
                    <div class="bid_form_wraper">
                        <div class="row">
                            <div class="col-lg-8 mx-auto px-5 px-lg-1 ">
                            </div>
                            <form enctype="multipart/form-data" name="sellCar" method="post" action="{{ route('user.ads.store') }}">
                                @csrf
                                <div class="row g-lg-3 g-2">
                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group mb-3">
                                        <div class="input-images"></div>
                                        @error('car_images')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group mb-3">
                                        <div class="input-images-3"></div>
                                        @error('document')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                        <input type="text" name="model" value="{{ old('model') }}"
                                            class="form-control"
                                            placeholder="{{ __('msg.Model') }} ({{ __('msg.Required') }})"
                                            aria-label="Model" required>
                                        @error('model')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                        <span class="text-danger" id="nameError"></span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                        <select class="form-select" name="company_id" aria-label="Type of Service" required>
                                            <option value="" selected disabled>{{ __('msg.Select Company') }}
                                                ({{ __('msg.Required') }})</option>
                                            @foreach ($company as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ old('company_id') == $data->id ? 'selected' : '' }}>
                                                    {{ $data->company }}</option>
                                            @endforeach
                                        </select>
                                        @error('company_id')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                        <span class="text-danger" id="companyError"></span>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                        <select class="form-select" name="model_year_id" aria-label="Type of Service" required>
                                            <option value="" selected disabled>{{ __('msg.Model Year') }}
                                                ({{ __('msg.Required') }})</option>
                                            @foreach ($year as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ old('model_year_id') == $data->id ? 'selected' : '' }}>
                                                    {{ $data->model_year }}</option>
                                            @endforeach
                                        </select>
                                        @error('model_year_id')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                        <span class="text-danger" id="model_year_Error"></span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                        <input type="number" name="price" value="{{old('price')}}" class="form-control" placeholder="{{__('msg.Price')}} ({{__('msg.Required')}})"
                                            aria-label="Price" required>
                                        @error('price')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                        <span class="text-danger" id="priceError"></span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                        <input type="text" name="color" value="{{old('color')}}" class="form-control" placeholder="{{{__('msg.Color')}}} ({{__('msg.Required')}})"
                                            aria-label="Color" required>
                                        @error('color')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                        <span class="text-danger" id="colorError"></span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                        <input type="text" name="engine" value="{{old('engine')}}" class="form-control" placeholder="{{__('msg.Engine')}} ({{__('msg.Required')}})"
                                            aria-label="Engine" required>
                                        @error('engine')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                        <span class="text-danger" id="engineError"></span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                        <input type="number" name="phone" value="{{old('phone')}}" class="form-control" placeholder="+971 XXXXXXXX ({{__('msg.Required')}})"
                                            aria-label="phone" required>
                                        @error('phone')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                        <span class="text-danger" id="phoneError"></span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                        <div style="position: relative">
                                            <input type="text" name="address" value="{{old('address')}}" class="form-control address-field"  placeholder="{{__('msg.Address')}} ({{__('msg.Required')}})" required style="padding-right: 2rem">
                                            <span class="fa fa-location" aria-hidden="true" style="position: absolute;top: 10px;right: 10px"></span>
                                        </div>
                                        @error('address')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                        <span class="text-danger" id="AddressError"></span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                        <select class="form-select form-control" name="country" aria-label="Country" disabled>
                                            <option disabled value="">{{__('msg.Select Country')}}</option>
                                            <option value="United Arab Emirates" selected>{{__('msg.United Arab Emirates')}}</option>
                                        </select>
                                        @error('country')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                        <select class="form-select form-control" name="city" aria-label="City" required>
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
                                    <div class="col-lg-6 col-md-6 col-sm-6 form-group">
                                        <input type="number" name="mileage" value="{{old('mileage')}}" class="form-control" placeholder="{{__('msg.Mileage e.g 40 Km')}} ({{__('msg.Required')}})"
                                            aria-label="Price" required>
                                        @error('mileage')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                        <span class="text-danger" id="millageError"></span>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="description"
                                                placeholder="{{__('msg.Add more details')}}" id="floatingTextarea2"
                                                style="height: 100px">{{old('description')}}</textarea>
                                            <label for="floatingTextarea2">{{__('msg.Add information in details')}} ({{__('msg.Optional')}})</label>
                                        </div>
                                        @error('description')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="d-grid gap-2 mt-lg-3 mb-lg-4">
                                            <button class="btn btn-secondary block get_appointment"
                                                type="submit">{{ __('msg.SUBMIT') }}
                                            </button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
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
        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        jQuery.validator.addMethod("phoneUE", function(phone_number, element) {
            phone_number = phone_number.replace(/\s+/g, "");
            return this.optional(element) || phone_number.length > 9 &&
            phone_number.match(/^(?:\+?971-?)?(?:50|51|52|55|56|2|3|4|6|7|9)\d{7}$/);
        }, "Please specify a valid phone number");

        var validator = $("form[name='sellCar']").validate({
            ignore: [],
            onfocusout: function (element) {
                var $element = $(element);
                if ($element.hasClass('select2-search__field')) {
                    $element2 = $element.closest('.form-group').find('select');
                    if (!$element2.prop('required') && $element2.val() == '') {
                        $element.removeClass('is-valid');
                    } else {
                        this.element($element2)
                    }
                } else if (!$element.prop('required') && ($element.val() == '' || $element.val() == null)) {
                    $element.removeClass('is-valid');
                } else {
                    this.element(element)
                }
            },
            onkeyup: function (element) {
                var $element = $(element);
                if ($element.hasClass('select2-search__field')) {
                    $element.closest('.form-group').find('select').valid();
                } else {
                    $element.valid();
                }
            },
            rules: {
                model: "required",
                company_id: "required",
                price: "required",
                "car_images[]": "required",
                color: "required",
                address: "required",
                city: "required",
                mileage: "required",
                engine: "required",
                model_year_id: "required",
                "document[]": "required",
                // phone: "required",
                phone: {
                    phoneUE: true,
                    required: true
                }
            },
            messages: {
                // business_type: "Please select your business type",
            },
            errorClass: 'is-invalid error',
            validClass: 'is-valid',
            highlight: function (element, errorClass, validClass) {
                var elem = $(element);
                if (elem.hasClass("select2-hidden-accessible")) {
                    elem.closest('.form-group').find('input').addClass(errorClass);
                    elem.closest('.form-group').find('input').removeClass(validClass);
                    elem.closest('.form-group').find('span.select2-selection').addClass(errorClass);
                    elem.closest('.form-group').find('span.select2-selection').removeClass(validClass);
                } else {
                    elem.addClass(errorClass);
                }
            },
            unhighlight: function (element, errorClass, validClass) {
                var elem = $(element);
                if (elem.hasClass("select2-hidden-accessible")) {
                    elem.closest('.form-group').find('input').addClass(validClass);
                    elem.closest('.form-group').find('input').removeClass(errorClass);
                    elem.closest('.form-group').find('span.select2-selection').removeClass(errorClass);
                    elem.closest('.form-group').find('span.select2-selection').addClass(validClass);
                } else {
                    elem.removeClass(errorClass);
                    elem.addClass(validClass);
                }
            },
            errorPlacement: function (error, element) {
                var elem = $(element);
                console.log(elem);
                if (elem.hasClass("select2-hidden-accessible")) {
                    var element2 = elem.closest('.form-group').find('.select2-container');
                    error.insertAfter(element2);
                } else if (elem.closest('.form-group').find('div').hasClass('image-uploader')) {
                    var element2 = elem.closest('.form-group').find('.image-uploader');
                    error.insertAfter(element2);
                } else if (elem.hasClass('inteltel')) {
                    var element2 = elem.closest('.iti');
                    error.insertAfter(element2);
                } else {
                    error.insertAfter(element);
                }
            }
        });

        setInterval(() => {
            /*Car Image*/
            if(!$('input[name="car_images[]"]').val()=="") {
                $('label[for="car_images[]"]').empty().hide();
                $('input[name="car_images[]"]').removeClass('is-invalid error').addClass('is-valid');
            } else {
                $('label[for="car_images[]"]').text("This field is required.").show();
                $('input[name="car_images[]"]').removeClass('is-valid').addClass('is-invalid error');
            }
            if ($('.uploaded .uploaded-image').length==0) {
                $('label[for="car_images[]"]').text("This field is required.").show();
                $('input[name="car_images[]"]').removeClass('is-valid').addClass('is-invalid error');
                $('input[name="car_images[]"]').val('');
            }
            /*Car Image*/

            /*Registration Copy Image*/
            if(!$('input[name="document[]"]').val()=="") {
                $('label[for="document[]"]').empty().hide();
                $('input[name="document[]"]').removeClass('is-invalid error').addClass('is-valid');
            } else {
                $('label[for="document[]"]').text("This field is required.").show();
                $('input[name="document[]"]').removeClass('is-valid').addClass('is-invalid error');
            }
            if ($('input[name="document[]"]').closest('.image-uploader').find('.uploaded .uploaded-image').length==0) {
                $('label[for="document[]"]').text("This field is required.").show();
                $('input[name="document[]"]').removeClass('is-valid').addClass('is-invalid error');
                $('input[name="document[]"]').val('');
            }
            /*Registration Copy Image*/
        }, 500);
    });

</script>
@endsection
