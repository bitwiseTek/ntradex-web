@extends('layouts.master')

@section('page_title')
	Contact Us
@stop

@section('content')
<!-- Login Content -->
        <div class="bg-white">
	<!-- Page Content -->
                <div class="content content-boxed">
                    <!-- Frequently Asked Questions -->
                    <div class="block">
                        <div class="block-content block-content-full block-content-narrow">
                            <!-- Contact Form -->
                            <h2 class="h3 font-w600 push-50-t push">Contact Support</h2>
                            <div id="faq1" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q1"><i class="fa fa-clock-o"></i> Office Hours</a>
                                        </h3>
                                    </div>
                                    <div id="faq1_q1" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                        	<p><b>Mon - Fri :</b> (8:30am - 5pm)</p>
                                        	<p><b>Sat :</b> (9:30am - 2pm)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="faq2" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq2_q1"><i class="fa fa-map-marker"></i> Offices</a>
                                        </h3>
                                    </div>
                                    <div id="faq2_q1" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                        	<p><b>Head Office:</b> Nzimiro Street, No 9, Old G.R.A, PHC, Rivers, Nigeria</p>
                                        	<p><b>Satelite Office 1:</b> 9545 Ella Lee Lane, No 47, TX 77063, Houston, Texas, USA</p>
                                        	<p><b>Satelite Office 2:</b></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Introduction -->
                            <div id="faq3" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq3_q1"><i class="fa fa-envelope-o"></i> Contact Us</a>
                                        </h3>
                                    </div>
                                    <div id="faq3_q1" class="panel-collapse collapse in">
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
