@extends('layouts.master')
@section('page_title')
    Review Exchange.
@stop

@section('content')
	<div class="container main_content">
    	<div class="row">
			<div class="col-md-2">@include('layouts.nestedMenu')</div>
			<div class="col-md-10" style="margin-top:-70px">
                @if($data['status']==true)
                   <div class="row">
                          <h3 class="">Sell Transaction Review</h3>
                   	     <p style="width:60%;line-height:24px;">You are selling {{$data['input']['sell_amount']}}USD of {{$data['currency']->currency_name}} at {{$data['currency']->sell_value}}NGN, you will paid {{number_format($data['currency']->sell_value*$data['input']['sell_amount'], 2)}}NGN or its equivalent in USD to your registered bank account.</p>
	                     <form name="sellForm" action="/users/exchange-currencies/sell" method="post">
	                        <input type="hidden" name="sell_amount" value="{{$data['input']['sell_amount']}}" />
	                        <input type="hidden" name="sell_currency" value="{{$data['currency']->currency_name}}" />	                        
	                        <div class="row" style="margin-top:20px">
	                       	    <div class="col-md-2"><input type="submit" class="btn btn-blue btn-block btn-small" value="Continue" /></div>
	                            <div class="col-md-8"></div>
	                        </div>
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
	                    </form>
	               </div>                  
                @else
                <div class="row">
                  <h3 class="">Opps, your attention is needed!</h3>
                    <p style="width:60%;line-height:24px;">
                     You have not set your e-currency account for this particular e-currency,
                     please go back to <a class="label label-success" href="/users/settings">Settings</a> and do so, thanks.
                   </p>
                </div>
                @endif
            </div>
        </div>
    </div>
@stop
