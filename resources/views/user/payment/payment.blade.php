@extends('user.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper">
        <div class="container-lg container-fluid">
            <div class="row">
                <div class="col-lg-10  mx-auto">
                    <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                        <h4 class="sec_main_heading text-center mb-0">{{ __('msg.SELF PAYMENTS') }}</h4>
                        <p class="sec_main_para text-center">{{ __('msg.Choose and add your payment details below') }}</p>
                    </div>
                </div>
            </div>
            <?php
            $garage = \App\Models\Garage::find($vendorbid->garage_id);
            $vendor = \App\Models\Vendor::with('company')->find($garage->vendor_id);
            $user = \App\Models\User::with('company')->find(Auth::id());
            $per = \App\Models\PaymentPercentage::select('percentage')
                ->where('type', 'order')
                ->first();
            $per = $per->percentage;
            $order = \App\Models\Order::where([['user_bid_id', $vendorbid->user_bid_id], ['vendor_bid_id', $vendorbid->id]])->first();
            
            if (isset($user->company[0]->name) && isset($vendor->company[0])) {
                foreach ($vendor->company as $company) {
                    if ($user->company[0]->name == $company->name) {
                        $status = 'yes';
                        break;
                    } else {
                        $status = 'no';
                    }
                }
            } else {
                $status = 'no';
            }
            
            if ($type == 'order') {
                $amount = $order->total - $order->advance;
            } else {
                $amount = round(($vendorbid->net_total * $per) / 100);
            }
            ?>
            <div class="row">
                <div class="col-lg-10 col-md-12 mx-auto">
                    <form role="form" action="{{ route('user.payment-info') }}" method="POST" class="require-validation"
                        data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        @csrf
                        <input type="hidden" name="user_bid_id" value="{{ $vendorbid->user_bid_id }}">
                        <input type="hidden" name="vendor_bid_id" value="{{ $vendorbid->id }}">
                        <input type="hidden" name="garage_id" value="{{ $vendorbid->garage_id }}">
                        <input type="hidden" name="net_total" value="{{ $vendorbid->net_total }}">
                        <input type="hidden" name="action" value="through_credit">
                        <div class="row g-2">
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <div class=" billing_info">
                                    <h5 class="heading-color">{{ __('msg.Payment Info') }}</h5>
                                </div>
                                <div class="inpu_wraper mb-3">
                                    <div class='col-xs-12 form-group required'>
                                        <input class='form-control' value="{{ $amount }} {{ __('msg.AED') }}"
                                            size='4' type='text' readonly name="amount">
                                    </div>
                                </div>
                                <div class="inpu_wraper mb-3">
                                    <div class='col-xs-12 form-group required'>
                                        <input class='form-control' placeholder="{{ __('msg.Cardholder Name') }}"
                                            size='4' type='text' name="name">
                                    </div>
                                </div>

                                <div class="inpu_wraper mb-3">
                                    <div class='col-xs-12 form-group  required'>
                                        <input autocomplete='off' class='form-control card-number'
                                            placeholder="{{ __('msg.Card Number') }}" name="card-number" size='20'
                                            type='text'>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 ">
                                <div class="payment_divider">
                                </div>

                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <div class=" billing_info">
                                    <h5 class="heading-color">{{ __('msg.Payment Info') }}</h5>
                                </div>
                                <div class="inpu_wraper mb-3">
                                    <div class='col-xs-12 form-group cvc required'>
                                        <input autocomplete='off' class='form-control card-cvc' name="card-cvc"
                                            placeholder="CVV" size='4' type='text'>
                                    </div>
                                </div>
                                <div class="inpu_wraper mb-3">
                                    <div class='col-xs-12  form-group expiration required'>
                                        <input class='form-control card-expiry-month' name="expiry-month"
                                            placeholder="{{ __('msg.Expiry Date') }}" size='2' type='text'>
                                    </div>
                                </div>
                                <div class="inpu_wraper mb-3">
                                    <div class='col-xs-12 form-group expiration required'>
                                        <input class='form-control card-expiry-year' name="expiry-year" placeholder='YYYY'
                                            size='4' type='text'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group d-none'>
                                <div class='alert-danger alert'>{{ __('msg.Please correct the errors and try again.') }}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-xl-8 col-lg-10 col-sm-10 mx-auto">
                                @if ($type == 'order')
                                    <div @if ($user->type == 'company') class="d-flex" @endif>
                                        <input type="hidden" name="type" value="order">
                                        <div class="col-sm-5 mx-auto center" style="text-align: center">
                                            <button class="btn btn-primary btn-lg btn-block"
                                                type="submit">{{ __('msg.PAY THROUGH CREDIT') }}</button>
                                        </div>
                                        @if ($user->type == 'company')
                                            <div class="col-sm-5 mx-auto center" style="text-align: center">
                                                <a class="btn btn-primary btn-lg btn-block" data-bs-toggle="modal"
                                                    data-bs-target="#checkAttachModel">{{ __('msg.Pay Through Cheque') }}</a>
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <div class="row">
                                        <input type="hidden" name="type" value="quote">
                                        @if ($status == 'no')
                                            <div class="col-sm-5 mx-auto center" style="text-align: center">
                                                <button class="btn btn-primary btn-lg btn-block"
                                                    type="submit">{{ __('msg.PAY THROUGH CREDIT') }}</button>
                                            </div>
                                        @else
                                            <div class="col-lg-5 col-sm-5">
                                                <button class="btn btn-primary btn-lg btn-block"
                                                    type="submit">{{ __('msg.PAY THROUGH CREDIT') }}</button>
                                            </div>
                                            <div class="col-lg-2 col-sm-2">
                                                <div>
                                                    {{-- <h5 class="conform_order_H3 text-center">{{ __('msg.OR') }}</h5> --}}
                                                </div>

                                            </div>
                                            <div class="col-lg-5 col-sm-5">
                                                <a href="{{ route('user.payment-insurance', $vendorbid->id) }}"
                                                    class="btn text-center btn-primary get_quot block get_appointment d-flex align-items-center justify-content-center"
                                                    type="button">{{ __('msg.PAY VIA INSURANCE COMPANY') }}</a>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="mt-5">
                        @if ($type == 'order')
                            @if (Auth::user()->type == 'company')
                                <p style="text-align: center">"You've paid the 100% of the total amount
                                    {{ $order->total }} to make the order as completed"</p>
                            @else
                                <p style="text-align: center">"You've paid the {{ $per }}% of the total amount
                                    {{ $order->total }} in the first
                                    half to make the order in process, right
                                    now we are asking you the to pay the remaining dues to make the order as completed"</p>
                            @endif
                        @else
                            <p style="text-align: center">"Right now you are going to pay {{ $per }}% of the
                                total ammount
                                {{ $vendorbid->net_total }}, the remaining dues will be asked to
                                pay when the order get completed, thank you"</p>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="checkAttachModel" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="sec_main_heading text-center mb-0">{{ __('msg.Pay Through Cheque') }}</h5>
                            <a type="button" class="heading-color" data-bs-dismiss="modal"><span
                                    class="fa fa-times"></span></a>
                        </div>
                        <div class="modal-body">
                            <div class="garage_name">
                                <form action="{{ route('user.payment-info') }}" method="POST" id="submitform"
                                    enctype="multipart/form-data" class="my-2">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 mb-3">
                                            <label
                                                class="mb-2 heading-color"><b>{{ __('msg.Upload Cheque image') }}<small>({{ __('msg.Click the box to upload') }})</small></b></label>
                                            <div class="cheque-image">
                                                {{-- input field name  check_image --}}

                                            </div>
                                            @error('cheque_image')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <input type="hidden" name="user_bid_id"
                                                value="{{ $vendorbid->user_bid_id }}">
                                            <input type="hidden" name="vendor_bid_id" value="{{ $vendorbid->id }}">
                                            <input type="hidden" name="garage_id" value="{{ $vendorbid->garage_id }}">
                                            <input type="hidden" name="net_total" value="{{ $vendorbid->net_total }}">
                                            <input value="{{ $amount }} {{ __('msg.AED') }}" type='hidden'
                                                name="amount">
                                            <input type="hidden" name="action" value="through_cheque">
                                            @if ($type == 'order')
                                                <input type="hidden" name="type" value="order">
                                            @else
                                                <input type="hidden" name="type" value="quote">
                                            @endif
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary flterClass" id="submit"
                                type="submit">{{ __('msg.SUBMIT') }}</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
<script>
    @error('cheque_image')
        $(function() {
            $('#checkAttachModel').modal('show');
        });
        @enderror
</script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
        $(function() {

            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('d-none');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('d-none');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>
@endsection
