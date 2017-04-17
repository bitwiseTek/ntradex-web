@extends('layouts.master')

@section('page_title')
	How to eXchange
@stop

@section('content')
<!-- How It Works Content -->
        <div class="bg-white">
	<!-- Page Content -->
                <div class="content content-boxed">
                    <!-- Frequently Asked Questions -->
                    <div class="block">
                        <div class="block-content block-content-full block-content-narrow">
                            <!-- Introduction -->
                            <h2 class="h3 font-w600 push-30-t push">How the eXchange works</h2>
                            <div id="faq1" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q1">Step 1</a>
                                        </h3>
                                    </div>
                                    <div id="faq1_q1" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                        	<p>You <a href="/login">login</a> or <a href="/register">sign up</a> if you haven't already done so.</p>
                                        	<p>When logged in, update your settings by registering your local bank and eCurrency account details you wish to transact with.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q2">Step 2</a>
                                        </h3>
                                    </div>
                                    <div id="faq1_q2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        	<p>After observing the exchange rates on your <a href="/users/summary">Dashboard</a>, you click on <a href="/users/exchange-currencies">Exchange</a></p>
                                        	<p>On the Exchange page, you select the eCurrency you wish to transact with under the Buy or Sell category, once selected, input Amount and click on Proceed.</p>
                                        	<b><em>Currently, any amount inputted must not be more than 999USD.</em></b>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q3">Step 3</a>
                                        </h3>
                                    </div>
                                    <div id="faq1_q3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        	<p>After clicking on Proceed, you're redirected to the Buy or Sell review page, you review all your inputs and observe the calculated amount to be Paid or Received.</p>
                                        	<p>If you're selling, when you click on Continue, you're redirected to a "Sell Successful" page with an email containing futher instructions.</p>
                                        	<p>If you're buying, when you click on Continue, you're redirected to the WebPay website to complete payment.</p>
                                        	<b><em><a href="/">nTradeX</a> handles all Buy Payments through Interswitch's <b><a href="https://webpay.interswitchng.com/">WebPay</a></b> Payment Gateway, Nigeria's No 1 ePayment Gateway.</em></b>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q4">Step 4</a>
                                        </h3>
                                    </div>
                                    <div id="faq1_q4" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        	<p>On the WebPay website, you're faced with a form to Login, if you're registered on QuickTeller you can input your Login details else...</p>
                                        	<p>You click on "Select Card Type" and select the card you wish to pay from, once selected, the form changes and you're faced with input fields to Input your card details and ATM Pin.</p>
                                        	<b><em><a href="/">nTradeX</a> has no interface with a customer's local bank, that role is covered by <b><a href="https://webpay.interswitchng.com/">WebPay.</a></b></em></b>
                                        	<b><em><b><a href="https://webpay.interswitchng.com/">WebPay</a></b> interfaces with your local bank, nTradex interfaces with WebPay.</em></b>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q5">Step 5</a>
                                        </h3>
                                    </div>
                                    <div id="faq1_q5" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        	<p>After inputting all necessary card details you click on "Pay" to complete payment.</p>
                                        	<p>When clicked, you'll be redirected back to the Payment Summary page with an email sent to your mailbox and that's it!!</p>
                                        	<b><em>If you get stuck on any of the steps please <a href="/contact-us">Contact Support</a>, we are always available to help.</em></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Introduction -->
                        </div>
                    </div>
                    <!-- END Frequently Asked Questions -->
                </div>
                <!-- END Page Content -->
         </div>
@stop
