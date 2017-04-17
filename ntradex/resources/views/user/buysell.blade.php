@extends('layouts.master')

@section('page_title')
Buy and Sell Currencies
@stop

@section('content')
	<!-- Main Container -->
            <main style="margin-top:-70px" id="main-container">
                <!-- Page Content -->
                <div class="content content-boxed">
                    <!-- Main Content I -->
                    {{ Form::open(array('url' => '/users/exchange-currencies/buy/confirm', 'method'=>'post','role'=>'form','autocomplete' => 'off', 'class'=>'js-validation-buy form-horizontal push-10-t push-10')) }}
               		{{ csrf_field() }}
                    <div class="row">
	                    <h2>BUY eCURRENCY</h2>
	                    <div>&nbsp;</div>
	                    <div>&nbsp;</div>
	                    <div class="block">
               		 		<div class="col-sm-7">
	                            <div class="form-group">
	                                <div class="col-xs-6">
	                                    <div class="form-material form-material-success">
								            <select class="form-control currency_drop_down" name="buy_currency" id="buy_currency"></select>
			                                <label for="buy_currency">Select eCurrency</label>
			                                {{$errors->first('buy_currency')}}
		                                </div>
	                                </div>
	                                <div class="col-xs-6">
	                                	<div class="form-material form-material-success">
	                                    	{{ Form::text('buy_amount','',array('placeholder'=>'Specify Amount','class'=>'form-control','id'=>'buy_amount','name'=>'buy_amount')) }}
	                                    	{{ $errors->first('buy_amount') }}
                                           	<label for="buy_amount">Amount</label>
	                                	</div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="col-sm-4">
	                        	<div class="form-group">
	                                <div class="col-xs-6">
	                                	<button class="btn btn-sm btn-block btn-success" type="submit"><i class="si si-link pull-right"></i>eXchange</button>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                    <!-- END Classic Design -->
	                </div>
	                {{ Form::close() }}
	                <!-- END Page Content -->
	                <div>&nbsp;</div>
	                <div>&nbsp;</div>
	                <!-- Main Content I -->
	                {{ Form::open(array('url' => '/users/exchange-currencies/sell/confirm', 'method'=>'post','role'=>'form','autocomplete' => 'off', 'class'=>'js-validation-sell  form-horizontal push-10-t push-10')) }}
                    <div class="row">
	                    <h2>SELL eCURRENCY</h2>
	                    <div>&nbsp;</div>
	                    <div>&nbsp;</div>
	                    <div class="block">
	                    	<div class="col-sm-7">
	                            <div class="form-group">
	                                <div class="col-xs-6">
	                                    <div class="form-material form-material-success">
								            <select class="form-control currency_drop_down" name="sell_currency" style="width: 100%;" data-placeholder="Select Currency.."></select>
			                                <label for="sell_currency">Select eCurrency</label>
			                                {{$errors->first('sell_currency')}}
		                                </div>
	                                </div>
	                                <div class="col-xs-6">
	                                	<div class="form-material form-material-success">
	                                    	{{ Form::text('sell_amount','',array('placeholder'=>'Specify Amount','class'=>'form-control','id'=>'sell_amount','name'=>'sell_amount')) }}
	                                    	{{ $errors->first('sell_amount') }}
                                           	<label for="sell_amount">Amount</label>
	                                	</div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="col-sm-4">
	                        	<div class="form-group">
	                                <div class="col-xs-6">
	                                	<button class="btn btn-sm btn-block btn-success" type="submit"><i class="si si-link pull-right"></i>eXchange</button>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                    <!-- END Classic Design -->
	                </div>
	                {{ Form::close() }}
	                <!-- END Page Content -->
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
@stop
