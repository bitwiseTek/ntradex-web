@extends('layouts.master')

@section('page_title')
	Register
@stop

@section('content')
<!-- Mega Form -->
				<!-- <div class="bg-white pulldown"> -->
                            <!-- END Register Title -->
                    <div class="block block-bordered">
                        <div class="block-content">
                            {{ Form::open(array('url' => '/register', 'method'=>'post','autocomplete' => 'off','role'=>'form', 'class'=>'js-validation-register form-horizontal push-10-t push-10')) }}
                                <div class="row">
                                	<div class="content">
                                		<!-- Register Title -->
					                    <div class="text-center">
					                       	<i class="fa fa-2x fa-circle-o-notch text-primary"></i>
					                   		<h1 class="h3 push-10-t">Sign Up</h1>
					                    </div>
					                </div>
					                <div>&nbsp;</div>
					                <div>&nbsp;</div>
					                <div>&nbsp;</div>
                                    <div class="col-sm-8">
                                    	<div class="form-group">
                                            <div class="col-xs-12">
                                            	<div class="form-material form-material-success">
                                                	{{ Form::text('username','',array('placeholder'=>'Please choose a username','class'=>'form-control','type'=>'text', 'id'=>'username','name'=>'username')) }}
                                            		<label for="username">Username</label>
                                            	</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>&nbsp;</div>
                                <div class="row">
                                	<div class="col-sm-8">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                            	<div class="form-material form-material-success">
	                                                {{ Form::text('first_name','',array('placeholder'=>'Please enter your first name','class'=>'form-control','id'=>'first_name','name'=>'first_name')) }}
                                            		<label for="first_name">First Name</label>
	                                            </div>
                                            </div>
                                            <div class="col-xs-6">
                                            	<div class="form-material form-material-success">
                                                	{{ Form::text('last_name','',array('placeholder'=>'Please enter your last name','class'=>'form-control','id'=>'last_name','name'=>'last_name')) }}
                                            		<label for="last_name">Last Name</label>
                                            	</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>&nbsp;</div>
                                <div class="row">
                                	<div class="col-sm-8">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                            	<div class="form-material form-material-success">
                                                	 <input class="js-datepicker form-control" type="text" id="dob" name="dob" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                                                    <label for="dob">Choose Date of Birth</label>
                                            	</div>
                                            </div>
                                            <div class="col-xs-6">
                                            	<div class="form-material form-material-success">
	                                                <select class="js-select2 form-control" id="sex" name="sex" style="width: 100%;" data-placeholder="Choose sex..">
														<option value="0">Choose Sex</option>
														<option value="MALE">Male</option>
														<option value="FEMALE">Female</option>
							                        </select>
		                                            <label for="sex">Sex</label>
	                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                                <div>&nbsp;</div>
                                <div class="row">
                                	<div class="col-sm-8">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                            	<div class="form-material form-material-success">
                                                	{{ Form::text('phone_no','',array('placeholder'=>'Please enter your phone number e.g +1234567890','class'=>'form-control','id'=>'phone_no','name'=>'phone_no')) }}
                                            		<label for="phone_no">Mobile (+Country Code)</label>
                                            	</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>&nbsp;</div>
                                <div class="row">
                                	<div class="col-sm-8">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                            	<div class="form-material form-material-success">
	                                                {{ Form::text('email','',array('placeholder'=>'Please provide your email','class'=>'form-control','type'=>'email','id'=>'email','name'=>'email')) }}
                                            		<label for="email">Email</label>
	                                            </div>
                                            </div>
                                            <div class="col-xs-6">
                                            	<div class="form-material form-material-success">
                                                	{{ Form::text('email','',array('placeholder'=>'...and confirm it','class'=>'form-control','id'=>'email_confirmation','name'=>'email_confirmation')) }}
                                            		<label for="email_confirmation">Confirm Email</label>
                                            	</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <div>&nbsp;</div>
                                <div class="row">
                                    	<div class="col-sm-8">
	                                        <div class="form-group">
	                                            <div class="col-xs-6">
	                                            	<div class="form-material form-material-success">
		                                                <select class="js-select2 form-control" id="country_id" name="country_id" style="width: 100%;" data-placeholder="Choose country..">
			                                                <option value="0">Select Country</option>
			                                                @foreach($countries as $country)
																<option value="{{$country->id}}">{{$country->country}}</option>
															@endforeach
								                        </select>
			                                            <label for="country_id">Country</label>
		                                            </div>
	                                            </div>
	                                            <div class="col-xs-6">
	                                            	<div class="form-material form-material-success">
	                                                	<select class="js-select2 form-control" id="state_id" name="state_id" style="width: 100%;" data-placeholder="Choose state..">
			                                                <option></option>
								                        </select>
			                                            <label for="state_id">State</label>
	                                            	</div>
	                                            </div>
	                                        </div>
	                                    </div>
                                </div>
                                <div>&nbsp;</div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                        	<div class="col-xs-6">
                                            	<div class="form-material form-material-success">
                                                	{{ Form::text('address','',array('placeholder'=>'Please provide your address','class'=>'form-control','id'=>'address','name'=>'address')) }}
                                            		<label for="address">Address</label>
                                            	</div>
                                            </div>
                                            <div class="col-xs-6">
                                            	<div class="form-material form-material-success">
                                                	{{ Form::text('zip_code','',array('placeholder'=>'Please enter a zip code','class'=>'form-control','id'=>'zip_code','name'=>'zip_code')) }}
                                            		<label for="zip_code">Zip Code</label>
                                            	</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>&nbsp;</div>
                                <div class="row">
                                	<div class="col-sm-8">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                            	<div class="form-material form-material-success">
                                                	{{ Form::password('password',array('placeholder'=>'Choose a strong password','class'=>'form-control', 'id'=>'password','name'=>'password')) }}
                                            		<label for="password">Password</label>
                                            	</div>
                                            </div>
                                            <div class="col-xs-6">
                                            	<div class="form-material form-material-success">
                                                	{{ Form::password('password_confirmation',array('placeholder'=>'...and confirm it','class'=>'form-control', 'id'=>'password_confirmation','name'=>'password_confirmation')) }}
                                            		<label for="password_confirmation">Confirm Password</label>
                                            	</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>&nbsp;</div>
                                <div class="form-group">
                                    <div class="col-xs-7 col-sm-8">
                                        <label class="css-input switch switch-sm switch-success">
                                            <input type="checkbox" id="register-terms" name="register-terms"><span></span> I agree with terms &amp; conditions
                                        </label>
                                    </div>
                                    <div class="col-xs-5 col-sm-4">
                                        <div class="font-s13 text-right push-5-t">
                                            <a href="#" data-toggle="modal" data-target="#modal-terms">View Terms</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-3 col-sm-3 col-sm-offset-5">
                                        <button class="btn btn-sm btn-block btn-success" type="submit"><i class="fa fa-plus pull-right"></i>sign Up</button>
                                    </div>
                                </div>
                            </div>
                            {{ Form::close() }}
                            <!-- END Register Form -->
                        </div>
                    <!-- END Mega Form -->
               <!--  </div> -->
               <!-- Terms Modal -->
                <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-popout">
                        <div class="modal-content">
                            <div class="block block-themed block-transparent remove-margin-b">
                                <div class="block-header bg-primary-dark">
                                    <ul class="block-options">
                                        <li>
                                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                        </li>
                                    </ul>
                                    <h3 class="block-title">Terms &amp; Conditions of Service</h3>
                                </div>
                                <div class="block-content">
                                    <h3 style="text-align:left; font-size:1.1em">Ntradex Terms of Service.</h3>
                                    <p>
                                        This agreement sets forth the terms and conditions under which Ntradex will provide its services. 
                                        This agreement describes user's rights and obligations when using theses services.
                                        User must read the agreement carefully and be sure user fully understands these terms and conditions.
                                        Creating or Using any service(s) belonging to Ntradex, either in full or in part means users completely and unconditionally accepts all the terms and conditions stipulated in this agreement.
                                        The parties to this agreement are the Issuer and the User.
                                    </p>
                                    <h3 style="text-align:left; font-size:1.1em">Definition of Terms.</h1>
                                    <p>
                                        User: means the person (individual or legal entity) that creates account with ntradex.com.
                                        User is the owner of the account from the perspective of Issuer.<br/>
                                        -Issuer: means Ntradex, duly registered Company with Nigeria Corporate Affairs Commission(as Ntradex Solutions &amp; Concepts LTD) that operates an electronic payment service which allows Customer to us its platform for funding and receive electronic payments (the "Service")."<br/>
                                        -Account: means the electronic account created by the user on Ntradex website to carry out electronic payment service.<br/>
                                        -Service: means an electronic payment service.
                                        -Website: means the Internet website property of Ntradex available at https://ntradex.com<br/>
                                        -National Money or Currency: means any money or currency different to the dollar, currency of the United Sates of America or Euros currency of the European Union.<br/>
                                    </p>
                                    <h1 style="text-align:left; font-size:1.1em">Conditions of Use.</h1>
                                    <p>
                                        "The condition of use", stated below explains the rights and duties of the User as to the access and using the services rendered by ntradex.com Payment center, and/or his assignees and/or his representatives and/or Payment center partners".
                                    </p>
                                    <p>
                                        1. Products and services.

                                        - Ntradex.com renders the services of funding of electronic payment systems units, both between each other and into the international monetary funds (international currencies) and visa versa.
                                        - Ntradex.com does not check the competence and legal standing of the the User , the monetary funds that are offered by the User for funding, and does not carry our monitoring of the User operations in any of the electronic payment systems or banking structure (a bank, a credit or investment structure).
                                        - Electronic payment systems and/or Banks are exclusively responsible for the monetary funds entrusted to them by the Users. Ntradex.com is not a party to the agreement between an Electronic payment systems and its User is by no means responsible for misuse or abuse of the corresponding system and/or a Bank as well as for functionality abuse of this system by the User. Mutual rights and duties of the User and the electronic payment system and/or a bank are regulated by the rules and agreements accepted in the corresponding system and/or a Bank.
                                        - The services offered by ntradex.com  are not intended for use and/or are not available in the countries where it is illegal. The User is fully responsible for the local law observance.
                                        - Ntradex.com  has a right to refuse rendering the service without mentioning the reason to any person which he/she will be informed of in the written form.
                                        - Ntradex.com  has a right to terminate the relations with the User in case of getting the information inducing ntradex.com to do so.
                                        - Ntradex.com  has a right to suspend service rendering to the User if:
                                        a) The User violates any of the conditions of the present Agreement or any "Additional agreements ".
                                        b) The user is involved in identity theft or has used another persons Atm card, electronic payment system information without their consent.
                                    </p>
                                    <p>
                                        2. Transactions and operations

                                        - Ntradex is responsible for providing the transaction fulfillment and/or the following operations, access to the information about the transaction in the system ntradex.com and carrying out the transactions or any of its parts by the User 24 hours a day (7 days of the week).
                                        - The payment for the services rendered by ntradex.com , is carried out by the User according to the ntradex.com services rates. Ntradex.com has a right to change these rates without additional notification.
                                        - Apart from the established and/or agreed interest, payments and commissions the User pays all the telephone and postal expenses, done in the course of business relations with ntradex.com. These additional expenses are written off by ntradex.com in non-acceptance manner from the monetary funds of the User which are in the disposal of ntradex.com.
                                        - User is responsible for the functionality and usability of his computer and/or some other facilities necessary for the access to the transaction settlement system via ntradex.com interface. Ntradex.com is not responsible for the losses or damage appearing as a result of inability of the User to use his own facilities and/or some of its elements and/or the absence of the necessary full or partial functionality of the facilities or its elements.
                                        - Any claim on the part of the User of improper fulfillment of User instructions by ntradex.com must be raised by the User of ntradex.com not later than within ten (10) business days after the date ntradex.com was given the corresponding instruction.
                                        - Ntradex.com is not responsible for any loss and/or damage (loss), resulting from a delay in bank payments fulfillment or electronic money transfer of the User where the day of sending or the days after sending are not business days in the country of the ntradex.com partner-participant, that is the receiver.
                                        - Ntradex.com is not responsible for mistakes, omissions or delays of payments made by banks, serving ntradex.com partners-participants, by a correspondent bank or e-payment system as well as it is not responsible for the consequences caused by their financial state.
                                        - Ntradex.com  has a right to suspend or limit the access of the User to transaction system without prior notification of the User, at the same time ntradex.com is not responsible for any indirect, special, unpredictable or consequent loss or damage.
                                        - Ntradex.com does not offer refunds for any transactions made.
                                    </p>
                                    <p>
                                        3. Altering

                                        - Ntradex.com reserves a right to make any amendments and changes to the rules of product (services) usage , as well as service and access to services , including the present Agreement and any "Additional Agreements ", at any time.
                                    </p>
                                    <p>
                                        4.Guarding, access and connection

                                        - Any reference of the User to ntradex.com, be it electronic, written or oral, will come into force and will be valid only after its full reception by ntradex.com and correct identification of the User as the owner of the monetary funds, at the same time the User as the Owner of monetary funds will be responsible for all operations on his account up to this moment.
                                        - Written messages of Maplexchange.com to the User are considered completed since the moment they were sent to the last address of the User known to ntradex.com.
                                    </p>
                                    <p>
                                        5. Force-majeure

                                        Neither User nor ntradex.com will be responsible for the delays or default on an obligation under the present Agreement or any "Additional agreements ", contracts and/or arrangements resulting from force-majeure, including (unrestricted) acts of God, acts of government or state, wars, fire, flood, explosion, terrorism, riot or civil strife, or absence, malfunctioning of power supply, internet providers or network connections or other systems, networks or services.
                                    </p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                                <button class="btn btn-sm btn-primary" type="button" data-dismiss="modal"><i class="fa fa-check"></i> I agree</button>
                            </div>
                        </div>
                    </div>
            </div>
        <!-- END Terms Modal -->
@stop
