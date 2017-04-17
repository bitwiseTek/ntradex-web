@extends('layouts.master')

@section('page_title')
	FAQs
@stop

@section('content')
<!-- FAQs Content -->
        <div class="bg-white">
	<!-- Page Content -->
                <div class="content content-boxed">
                    <!-- Frequently Asked Questions -->
                    <div class="block">
                        <div class="block-content block-content-full block-content-narrow">
                            <!-- Introduction -->
                            <h2 class="h3 font-w600 push-30-t push">Introduction to nTradeX</h2>
                            <div id="faq1" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q1">Welcome to our service!</a>
                                        </h3>
                                    </div>
                                    <div id="faq1_q1" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <p>Welcome to <b><a href="/">nTradeX</a></b>, your one stop exchanger.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q2">Who are we?</a>
                                        </h3>
                                    </div>
                                    <div id="faq1_q2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p><b><a href="/">nTradeX</a></b> is a web application platform that handles eCurrency exchange for traditional currencies.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q3">What are our values?</a>
                                        </h3>
                                    </div>
                                    <div id="faq1_q3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Trust, Delivery, Service.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Introduction -->

                            <!-- Functionality -->
                            <h2 class="h3 font-w600 push-50-t push">Functionality</h2>
                            <div id="faq2" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq2" href="#faq2_q1">What are the key features?</a>
                                        </h3>
                                    </div>
                                    <div id="faq2_q1" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Profile Management, eCurrency Management, Transaction Management, Emailing.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq2" href="#faq2_q2">Does nTradeX support mobile devices?</a>
                                        </h3>
                                    </div>
                                    <div id="faq2_q2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Yes, <a href="/">nTradeX</a> is optimized for use with Mobile Devices.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq2" href="#faq2_q3">Why should I choose your service?</a>
                                        </h3>
                                    </div>
                                    <div id="faq2_q3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>You should choose <a href="/">nTradeX</a> because we have the best exchange rates in the market and our business is solely focused on delivering services speedily.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq2" href="#faq2_q4">Is my data secure?</a>
                                        </h3>
                                    </div>
                                    <div id="faq2_q4" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Yes, all of your data is stored securely on our cloud servers scattered accross various availability zones.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Functionality -->

                            <!-- Payments -->
                            <h2 class="h3 font-w600 push-50-t push">Transactions</h2>
                            <div id="faq3" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq3" href="#faq3_q1">Can I sell my eCurrency for cash?</a>
                                        </h3>
                                    </div>
                                    <div id="faq3_q1" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Yes, you can sell and buy eCurrency with <a href="/">nTradeX</a>, follow the steps <a href="/how-it-works">here.</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq3" href="#faq3_q2">How long does a transaction take?</a>
                                        </h3>
                                    </div>
                                    <div id="faq3_q2" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>That depends on the type of transaction, <b>Buy</b> transactions initiated on or before 12PM GMT are effected before close of work, 5PM GMT.</p>
                                            <p><b>Sell</b> transactions are effected inside of 2 hours after credit confirmation on our end.</p>
                                            <p><b>Sell</b> transactions initiated via wire transfer can take between 3 - 5 working days after credit confirmation on our end.</p>
                                            <p><b>Sell</b> transactions initiated via PayPal are effected inside of an hour after credit confirmation on our end.</p>
                                            <em><b>Transactions initiated after 12PM are likely to take effect the next day regardless of whether it's a weekday or weekend.</b></em>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq3" href="#faq3_q3">Can I register multiple eCurrency accounts?</a>
                                        </h3>
                                    </div>
                                    <div id="faq3_q3" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Yes, you can register as many eCurrency accounts as are available on your profile and transact with ease.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Payments -->

                            <!-- Contact Form -->
                            <h2 class="h3 font-w600 push-50-t push">Do you have any further questions?</h2>
                            <div id="faq4" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq4" href="#faq4_q1"><i class="fa fa-envelope-o"></i> Contact Us</a>
                                        </h3>
                                    </div>
                                    <div id="faq4_q1" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <form class="form-horizontal push-10-t" action="base_pages_faq.html" method="post" onsubmit="return false;">
                                                <div class="form-group">
                                                    <div class="col-xs-6 col-sm-4">
                                                        <div class="form-material form-material-primary">
                                                            <input class="form-control" type="text" id="faq-contact-firstname" name="faq-contact-firstname" placeholder="Enter your firstname..">
                                                            <label for="faq-contact-firstname">Firstname</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-6 col-sm-4">
                                                        <div class="form-material form-material-primary">
                                                            <input class="form-control" type="text" id="faq-contact-lastname" name="faq-contact-lastname" placeholder="Enter your lastname..">
                                                            <label for="faq-contact-lastname">Lastname</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-8">
                                                        <div class="form-material form-material-primary input-group">
                                                            <input class="form-control" type="email" id="faq-contact-email" name="faq-contact-email" placeholder="Enter your email..">
                                                            <label for="faq-contact-email">Email</label>
                                                            <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4">
                                                        <div class="form-material form-material-primary">
                                                            <select class="form-control" id="faq-contact-subject" name="faq-contact-subject" size="1">
                                                                <option value="A Friend">A Friend</option>
                                                                <option value="Email">Email</option>
                                                                <option value="FaceBook">FaceBook</option>
                                                                <option value="Instagram">Instagram</option>
                                                                <option value="WhatsApp">WhatsApp</option>
                                                                <option value="Twitter">Twitter</option>
                                                                <option value="Google">Google</option>
                                                                <option value="Google+">Google+</option>
                                                            </select>
                                                            <label for="faq-contact-subject">How did you know of us?</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <div class="form-material form-material-primary">
                                                            <textarea class="form-control" id="faq-contact-msg" name="faq-contact-msg" rows="7" placeholder="Enter your message.."></textarea>
                                                            <label for="faq-contact-msg">Message</label>
                                                        </div>
                                                        <div class="help-block text-right">Feel free to use common tags: &lt;blockquote&gt;, &lt;strong&gt;, &lt;em&gt;</div>
                                                    </div>
                                                </div>
                                                <div class="form-group remove-margin-b">
                                                    <div class="col-xs-12">
                                                        <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-send push-5-r"></i> Send Message</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Contact Form -->
                        </div>
                    </div>
                    <!-- END Frequently Asked Questions -->
                </div>
                <!-- END Page Content -->
                </div>
@stop
