@extends('vendor.layout.app')
@section('content')
<section class="pb-5 login_content_wraper" style="background-image:url(public/assets/images/gradiantbg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                    <h4 class="sec_main_heading text-center mb-0">POST AN AD FOR USED CAR</h4>
                    <p class="sec_main_para text-center">Post Ad For Your Car You Want To Sell</p>
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
                                    <!-- <label class="img_wraper_label">
                                          <div class="file_icon_wraper">
                                            <img src="assets/images/fileuploadicon.svg">
                                          </div>
                                          <p class="mb-0">Upload Car image</p>
                                          <input type="file" size="60" >
                                        </label>-->
                                    @error('car_images')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <div class="input-images-3"></div>
                                    <!-- <label class="img_wraper_label">
                                          <div class="file_icon_wraper">
                                            <img src="assets/images/fileuploadicon.svg">
                                          </div>
                                          <p class="mb-0">Upload Other Legal Documents</p>
                                          <input type="file" size="60" >
                                        </label> -->
                                    @error('files')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" name="model" class="form-control" placeholder="Model"
                                        aria-label="Model">
                                    @error('model')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                    <span class="text-danger" id="nameError"></span>
                                </div>

                                {{--                                    <div class="col-lg-6 col-md-6 col-sm-6">--}}
                                {{--                                        <input type="text" name="company" class="form-control" placeholder="Make" aria-label="Make">--}}
                                {{--                                        @error('company_id')--}}
                                {{--                                        <div class="text-danger mt-2">{{ $message }}
                            </div>--}}
                            {{--                                        @enderror--}}
                            {{--                                    </div>--}}

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <select class="form-select" name="company_id" aria-label="Type of Service">
                                    <option value="" selected>company</option>
                                    @foreach($company as $data)
                                    <option value="{{$data->id }}">{{$data->company }}</option>
                                    @endforeach
                                </select>
                                @error('company_id')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                                <span class="text-danger" id="companyError"></span>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <select class="form-select" name="model_year_id" aria-label="Type of Service">
                                    <option value="" selected>Year</option>
                                    @foreach($year as $data)
                                    <option value="{{$data->id }}">{{$data->model_year }}</option>
                                    @endforeach
                                </select>
                                @error('model_year_id')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                                <span class="text-danger" id="model_year_Error"></span>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="number" name="price" class="form-control" placeholder="Price"
                                    aria-label="Price">
                                @error('price')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                                <span class="text-danger" id="priceError"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="text" name="color" class="form-control" placeholder="Color"
                                    aria-label="Color">
                                @error('color')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                                <span class="text-danger" id="colorError"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="text" name="engine" class="form-control" placeholder="Engine"
                                    aria-label="Engine">
                                @error('engine')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                                <span class="text-danger" id="engineError"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="number" name="phone" class="form-control" placeholder="Phone No"
                                    aria-label="Price">
                                @error('phone')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                                <span class="text-danger" id="phoneError"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="text" name="address" class="form-control" placeholder="Address"
                                    aria-label="Price">
                                @error('address')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                                <span class="text-danger" id="AddressError"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <select class="form-select form-control" name="country" aria-label="Country" disabled>
                                    <option disabled value="">Select Country</option>
                                    <option value="United Arab Emirates" selected>United Arab Emirates</option>
                                </select>
                                @error('country')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <select class="form-select form-control" name="city" aria-label="City">
                                    <option selected disabled value="">Select City</option>
                                    <option value="Dubai" @if(old('city')=='Dubai' ) selected @endif>Dubai
                                    </option>
                                    <option value="Abu Dhabi" @if(old('city')=='Abu Dhabi' ) selected @endif>Abu
                                        Dhabi</option>
                                    <option value="Sharjah" @if(old('city')=='Sharjah' ) selected @endif>Sharjah
                                    </option>
                                    <option value="Ras Al Khaimah" @if(old('city')=='Ras Al Khaimah' ) selected @endif>
                                        Ras Al Khaimah</option>
                                    <option value="Ajman" @if(old('city')=='Ajman' ) selected @endif>Ajman
                                    </option>
                                </select>
                                @error('city')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <input type="number" name="mileage" class="form-control" placeholder="Car Milage"
                                    aria-label="Price">
                                @error('mileage')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                                <span class="text-danger" id="millageError"></span>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="description"
                                        placeholder="Add Repairing Details" id="floatingTextarea2"
                                        style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Add information in details</label>
                                </div>
                                @error('description')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="d-grid gap-2 mt-lg-3 mb-lg-4">
                                    <button class="btn btn-secondary block get_appointment"
                                        type="submit">SUBMIT</button>
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
{{--<script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            //alert("abc");
            $('#upload').on('submit', function (e) {
                e.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    type: 'Post',
                    url: '{{ url('vendor/ads') }}',
data: formData,
contentType: false,
processData: false,
success: (response) => {
console.log(response.message);
const Toast = Swal.mixin({
toast: true,
position: 'top-end',
showConfirmButton: false,
timer: 1000,
timerProgressBar: true,
didOpen: (toast) => {
toast.addEventListener('mouseenter', Swal.stopTimer)
toast.addEventListener('mouseleave', Swal.resumeTimer)
}
})
Toast.fire({
icon: response.status,
title: response.message,
});
window.setTimeout(function(){location.reload()},1000)
},
error:function (response) {
$('#nameError').text(response.responseJSON.errors.model);
$('#companyError').text(response.responseJSON.errors.company_id);
$('#model_year_Error').text(response.responseJSON.errors.model_year_id);
$('#priceError').text(response.responseJSON.errors.price);
$('#colorError').text(response.responseJSON.errors.color);
$('#engineError').text(response.responseJSON.errors.engine);
$('#phoneError').text(response.responseJSON.errors.phone);
$('#AddressError').text(response.responseJSON.errors.address);
$('#millageError').text(response.responseJSON.errors.mileage);
}

});
});
});
$(document).ready(function () {
//alert("abc");
$('#upload').on('change', function (e) {
e.preventDefault();
let formData = new FormData(this);
$.ajax({
type: 'Post',
url: '{{ url('vendor/ads') }}',
data: formData,
contentType: false,
processData: false,
success: (response) => {
console.log(response.message);
const Toast = Swal.mixin({
toast: true,
position: 'top-end',
showConfirmButton: false,
timer: 1000,
timerProgressBar: true,
didOpen: (toast) => {
toast.addEventListener('mouseenter', Swal.stopTimer)
toast.addEventListener('mouseleave', Swal.resumeTimer)
}
})
Toast.fire({
icon: response.status,
title: response.message,
});
window.setTimeout(function(){location.reload()},1000)
},
error:function (response) {
$('#nameError').text(response.responseJSON.errors.model);
$('#companyError').text(response.responseJSON.errors.company_id);
$('#model_year_Error').text(response.responseJSON.errors.model_year_id);
$('#priceError').text(response.responseJSON.errors.price);
$('#colorError').text(response.responseJSON.errors.color);
$('#engineError').text(response.responseJSON.errors.engine);
$('#phoneError').text(response.responseJSON.errors.phone);
$('#AddressError').text(response.responseJSON.errors.address);
$('#millageError').text(response.responseJSON.errors.mileage);
}

});
});
});
</script>--}}
@endsection