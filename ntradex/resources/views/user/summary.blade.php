@extends('layouts.master')

@section('page_title')
	Account Summary
@stop

@section('content')
	<!-- Main Container -->
            <main style="margin-top:-70px" id="main-container">
                <!-- Page Content -->
                <div class="content content-boxed">
                    <!-- User Header -->
                    <div class="block">
                        <!-- Basic Info -->
                        <div class="bg-image" style="background-image: url('/assets/img/photos/photo6@2x.jpg');">
                            <div class="block-content bg-primary-dark-op text-center overflow-hidden">
                                <div class="push-30-t push animated fadeInDown">
                                    <img class="img-avatar img-avatar96 img-avatar-thumb" src="/assets/img/logo10.png" alt="">
                                </div>
                                <div class="push-30 animated fadeInUp">
                                    <h2 class="h4 font-w600 text-white push-5">{{$data['first_name']}} {{$data['last_name']}}</h2>
                                    @foreach($data['userCountry'] as $countryState)
                                        <h3 class="h5 text-gray">{{ $countryState->state }}, {{ $countryState->country }}</h3>
                                    @endforeach                                
                                </div>
                            </div>
                        </div>
                        <!-- END Basic Info -->

                        <!-- Stats -->
                        	<div class="block-content text-center">
	                            <div class="row items-push text-uppercase">
	                                <div class="col-xs-6 col-sm-3">
	                                    <div class="font-w700 text-gray-darker animated fadeIn">Total Transactions</div>
	                                    <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">{{$data['transactionsTotal']}}</a>
	                                </div>
	                                <div class="col-xs-6 col-sm-3">
	                                    <div class="font-w700 text-gray-darker animated fadeIn">Total Buys</div>
	                                    <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">{{$data['transactionsBuy']}}</a>
	                                </div>
	                                <div class="col-xs-6 col-sm-3">
	                                    <div class="font-w700 text-gray-darker animated fadeIn">Total Sells</div>
	                                    <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">{{$data['transactionsSell']}}</a>
	                                </div>
	                                <div class="col-xs-6 col-sm-3">
	                                    <div class="font-w700 text-gray-darker animated fadeIn">Total Failed</div>
	                                    <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">{{$data['transactionsFailed']}}</a>
	                                </div>
	                            </div>
	                        </div>
                        <!-- END Stats -->
                    </div>
                    <!-- END User Header -->

                    <!-- Main Content I -->
                    <div class="row">
	                    <h2 class="content-heading">EXCHANGE RATES</h2>
	                    <div class="block">
	                        <div class="table-responsive">
	                            <table class="table table-borderless table-header-bg text-center remove-margin-b">
	                                <thead>
	                                    <tr>
	                                        <th style="width: 150px;"></th>
	                                    	@foreach($data['currencies'] as $currency)
	                                        <th class="text-center">{{$currency->currency_name}}</th>
	                                        @endforeach
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                    <tr class="active">
	                                    	<td style="width: 150px;"></td>
	                                        @foreach($data['currencies'] as $currency_alias)
	                                        <td>
	                                            <div class="h1 font-w700 push-10">{{$currency_alias->alias}}</div>
	                                            <div class="h5 font-w300 text-muted">today</div>
	                                        </td>
	                                        @endforeach
	                                    </tr>
	                                    <tr>
	                                        <td class="font-w600 text-left">BUY</td>
	                                        @foreach($data['currencies'] as $currency_buy)
	                                        <td>{{number_format($currency_buy->buy_value, 2)}}</td>
	                                        @endforeach
	                                    </tr>
	                                    <tr>
	                                        <td class="font-w600 text-left">SELL</td>
	                                        @foreach($data['currencies'] as $currency_sell)
	                                        <td>{{number_format($currency_sell->sell_value, 2)}}</td>
	                                        @endforeach
	                                    </tr>
	                                    <tr class="active">
	                                        <td></td>
	                                        <td>
	                                            <a href="/users/exchange-currencies"><button class="btn btn-success" type="button"><i class="si si-link pull-right"></i>Exchange</button></a>
	                                        </td>
	                                        <td>
	                                            <a href="/users/exchange-currencies"><button class="btn btn-success" type="button"><i class="si si-link pull-right"></i>Exchange</button></a>
	                                        </td>
	                                        <td>
	                                            <a href="/users/exchange-currencies"><button class="btn btn-success" type="button"><i class="si si-link pull-right"></i>Exchange</button></a>
	                                        </td>
	                                        <td>
	                                            <a href="/users/exchange-currencies"><button class="btn btn-success" type="button"><i class="si si-link pull-right"></i>Exchange</button></a>
	                                        </td>
	                                        <td>
	                                            <a href="/users/exchange-currencies"><button class="btn btn-success" type="button"><i class="si si-link pull-right"></i>Exchange</button></a>
	                                        </td>
	                                    </tr>
	                                </tbody>
	                            </table>
	                        </div>
	                    </div>
                    <!-- END Classic Design -->
                </div>
                <!-- END Page Content -->

                <!-- Main Content II -->
                    <div class="row">
	                    <h2 class="content-heading">LAST FIVE TRANSACTIONS</h2>
	                    <div class="block">
	                        <div class="table-responsive">
	                    		@if(!$data['transactions']->isEmpty())
		                            <table class="table table-borderless table-header-bg text-center remove-margin-b">
		                                <thead>
		                                    <tr>
		                                        <th style="width: 150px;"></th>
		                                    	<th class="text-center">Ref#</th>
		                                        <th class="text-center">Type</th>
		                                        <th class="text-center">Currency</th>
		                                        <th class="text-center">Amount</th>
		                                        <th class="text-center">Status</th>
		                                        <th class="text-center">Date</th>
		                                    </tr>
		                                </thead>
		                                @foreach($data['transactions'] as $transactions)
			                                <tbody>
			                                    <tr>
			                                    	<td class="font-w600 text-left"></td>
			                                    	<td>{{$transactions->ref_no}}</td>
			                                    	<td>{{$transactions->type}}</td>
			                                    	<td>{{$transactions->currency}}</td>
			                                    	<td>{{number_format($transactions->exchange_val, 2)}}</td>
			                                    	<td>{{$transactions->status}}</td>
			                                    	<td>{{date('d M Y  h:i a',strtotime($transactions->created_at))}}</td>
			                                    </tr>
			                                </tbody>
		                                @endforeach
		                            </table>
		                            @else	
										<div class="message red">You have no transactions.</div>
									@endif
	                        	</div>
	                    	</div>
                    	<!-- END Classic Design -->
                	</div>
                <!-- END Page Content -->

                <!-- Main Content III -->
                    <div class="row">
	                    <h2 class="content-heading">NOTIFICATIONS</h2>
	                    <div class="block">
	                        @if(!empty($data['notifications']))
								@foreach($data['notifications'] as $notification)
								@endforeach
							@else	
								<div class="message red">You have no messages.</div>
							@endif
	                   </div>
                    	<!-- END Classic Design -->
                	</div>
                <!-- END Page Content -->

                <!-- Main Content IV -->
                    <div class="row">
	                    <h2 class="content-heading">LAST LOGIN SESSION</h2>
	                    <div class="block">
	                        <span>Date: {{date('d M Y  h:i a',strtotime($data['last_login']))}}</span>
	                   </div>
                    	<!-- END Classic Design -->
                	</div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
@stop
