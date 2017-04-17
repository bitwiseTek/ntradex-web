@extends('layouts.master')

@section('page_title')
	...your one stop exchanger.
@stop

@section('content')
    <!-- Main Container -->
            <main style="margin-top:-70px" id="main-container">
                <!-- Hero Content -->
                <div class="bg-video" data-vide-bg="/assets/img/videos/hero_tech" data-vide-options="posterType: jpg, position: 50% 75%">
                    <div class="bg-primary-dark-op">
                        <section class="content content-full content-boxed">
                            <!-- Section Content -->
                            <div class="text-center push-30-t visibility-hidden" data-toggle="appear" data-class="animated fadeIn">
                                <a class="fa-2x text-white" href="">
                                    <img src="assets/img/logo10.png" width="60" alt="">nTradeX
                                </a>
                            </div>
                            <div class="push-100-t push-50 text-center">
                                <h1 class="h2 font-w700 text-white push-20 visibility-hidden" data-toggle="appear" data-class="animated fadeInDown">Exchange your eCurrency with Us in a swift and efficient manner</h1>
                                <h2 class="h4 text-white-op visibility-hidden" data-toggle="appear" data-timeout="750" data-class="animated fadeIn"><em>...your one stop exchanger</em></h2>
                                &nbsp;
                                <h2 class="h4 text-white-op visibility-hidden" data-toggle="appear" data-timeout="750" data-class="animated fadeIn" data-target="#modal-rates"><em><a href="#" data-toggle="modal" data-target="#modal-rates">View our rates...</a></em></h2>
                                @if(!Session::get('user_id'))
                                    @if(!Session::get('account_type')=='user' || Session::get('account_type')=='admin' )
                                        <div class="push-50-t push-20 text-center">
                                            <a class="btn btn-rounded btn-noborder btn-lg btn-success push-10-r push-5 visibility-hidden" data-toggle="appear" data-class="animated fadeInLeft" href="/register">
                                                <i class="fa fa-plus push-10-r"></i>Sign Up
                                            </a>
                                            <a class="btn btn-rounded btn-noborder btn-lg btn-primary push-5 visibility-hidden" data-toggle="appear" data-class="animated fadeInRight" href="/login"><i class="fa fa-sign-in push-10-r"></i>Sign In</a>
                                        </div>
                                    @endif
                                @endif
                            </div>
                            <!-- END Section Content -->
                        </section>
                    </div>
                </div>
                <!-- END Hero Content -->
            </main>
            <!-- Rates Modal -->
                <div class="modal fade" id="modal-rates" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-popout">
                        <div class="modal-content">
                            <div class="block block-themed block-transparent remove-margin-b">
                                <div class="block-header bg-primary-dark">
                                    <ul class="block-options">
                                        <li>
                                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                        </li>
                                    </ul>
                                    <h3 class="block-title">Exchange Rates</h3>
                                </div>
                                <div class="block-content">
                                    <div class="block">
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-header-bg text-center remove-margin-b">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 150px;"></th>
                                                        @foreach($e_currencies as $currency)
                                                        <th class="text-center">{{$currency->currency_name}}</th>
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="active">
                                                        <td style="width: 150px;"></td>
                                                        @foreach($e_currencies as $currency_alias)
                                                        <td>
                                                            <div class="h1 font-w700 push-10">{{$currency_alias->alias}}</div>
                                                            <div class="h5 font-w300 text-muted">today</div>
                                                        </td>
                                                        @endforeach
                                                    </tr>
                                                    <tr>
                                                        <td class="font-w600 text-left">BUY</td>
                                                        @foreach($e_currencies as $currency_buy)
                                                        <td>{{number_format($currency_buy->buy_value, 2)}}</td>
                                                        @endforeach
                                                    </tr>
                                                    <tr>
                                                        <td class="font-w600 text-left">SELL</td>
                                                        @foreach($e_currencies as $currency_sell)
                                                        <td>{{number_format($currency_sell->sell_value, 2)}}</td>
                                                        @endforeach
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
            </div>
        <!-- END Rates Modal -->
@stop