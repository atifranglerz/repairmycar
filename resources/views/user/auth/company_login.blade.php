@extends('web.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper" style="background-image:url(public/assets/images/gradiantbg.jpg);min-height: 100vh">
        <div class="container" >
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-10 mx-auto">
                    <div class="cuatomer_signup_form_wraper">
                        <div class="main_content_wraper">
                            <h5 class="sec_main_heading text-center mb-0">{{__('msg.Fill This To Login')}}</h5>
                        </div>
                        <form class="pt-5" action="{{route('user.companyLogin')}}" method="post" >
                            @csrf
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="{{__('msg.Email')}}">
                                @error('email')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <div class="position-relative d-flex align-items-center">
                                    <input id="inputPassword" name="password" type="password" class="form-control pass" placeholder="{{__('msg.password')}}">
                                    <span toggle="#inputPassword" class="fa fa-fw fa-eye preview-eye-icon toggle-password"></span>
                                </div>
                                @error('password')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-3 signup_input_wraper forgetpaww text-right">
                                <a href="{{route('user.forget_password')}}">{{__('msg.Forgot Password?')}}</a>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <div class="d-grid gap-2 mt-3 mb-4">
                                    <button class="btn btn-secondary block get_appointment" type="submit">{{__('msg.Login')}}</button>
                                </div>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <h5 class="my-4 text-center login_link_heading">{{__('msg.New User?')}} <a href="{{route('user.companyRegister')}}"> {{__('msg.Sign Up')}}</a>
                                </h5>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

