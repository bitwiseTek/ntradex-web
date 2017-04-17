@extends('layouts.master')
@section('page_title')
    Review Exchange.
@stop

@section('content')
    <!-- Main Container -->
            <main style="margin-top:-70px" id="main-container">
                <!-- Page Content -->
                <div class="content content-boxed">
                    @if($data['status']==true)
                        <h3 class="">Buy Transaction Review</h3>
                        <p style="width:60%;line-height:24px;">You are purchasing {{$data['currency_amount']}}USD of {{$data['currency_name']}}.</p><br>
                        <div class="row">
                            <div class="col-md-5">
                                <h4 class="">Pay Online (Interswitch)</h4>
                                <form name="intPaymentForm" action="https://webpay.interswitchng.com/paydirect/pay" method="post">
                                    <input name="cust_name" type="hidden" value="{{$data['first_name']}}" />
                                    <input name="cust_name_desc" type="hidden" value="Paying customer first name." />
                                    <input type="hidden" name="user_id" value="{{$data['user_id']}}" />
                                    <input type="hidden" name="txn_ref" value="{{$data['ref_no']}}" />
                                    <input type="hidden" name="product_id" value="{{$data['product_id']}}" />
                                    <input type="hidden" name="amount" value="{{$data['amount']}}" />
                                    <input type="hidden" name="currency" value="{{$data['currency']}}" />
                                    <input type="hidden" name="pay_item_id" value="{{$data['pay_item_id']}}" />
                                    <input name="pay_item_name" type="hidden" value="You are purchasing ${{$data['currency_amount']}} of {{$data['currency_name']}}". />
                                    <input name="cust_id" type="hidden" value="{{$data['last_name']}}" />
                                    <input name="cust_id_desc" type="hidden" value="last_name" />
                                    <input type="hidden" name="site_name" value="https://web.ntradex.com" />
                                    <input type="hidden" name="site_redirect_url" value="{{$data['redirect_url']}}" />
                                    <input type="hidden" name="hash" value="{{$data['hash_val']}}" />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span style="font-weight:bold; margin-right:10px">Customer: </span> {{$data['first_name']}} {{$data['last_name']}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span style="font-weight:bold; margin-right:10px">Amount: </span> N{{number_format($data['amount_summary'], 2)}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span style="font-weight:bold; margin-right:10px">Ref #: </span> {{$data['ref_no']}}
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:20px">
                                        <div class="col-md-4"><input type="submit" class="btn btn-blue btn-block btn-small" value="Continue" /></div>
                                        <div class="col-md-8"></div>
                                    </div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                            </div>
                        </div>
                        @else
                        <div class="row">
                            <h3 class="">Opps, your attention is needed!</h3>
                            <p style="width:60%;line-height:24px;">
                                You have not set your eCurrency account for this particular eCurrency,
                                please go back to <a class="label label-success" href="/users/settings">Settings</a> and do so, thanks.
                            </p>
                        </div>
                        @endif
                    </div>
                                <!-- END Page Content -->
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
@stop
