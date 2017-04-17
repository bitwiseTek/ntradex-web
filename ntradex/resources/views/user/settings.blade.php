@extends('layouts.master')

@section('page_title')
    Account Settings
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
                                    <img class="img-avatar img-avatar96 img-avatar-thumb" src="/assets/img/avatars/avatar4.jpg" alt="">
                                </div>
                                <div class="push-30 animated fadeInUp">
                                    <h2 class="h4 font-w600 text-white push-5">{{ $data['info']->first_name }} {{ $data['info']->last_name }}</h2>
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

                    <!-- Main Content -->
                    {{ Form::open(array('method'=>'post','role'=>'form')) }}
                        {{ csrf_field() }}
                        <div class="block">
                            <ul class="nav nav-tabs nav-justified push-20" data-toggle="tabs">
                                <li class="active">
                                    <a href="#tab-profile-personal"><i class="fa fa-fw fa-pencil"></i> Personal</a>
                                </li>
                                <li>
                                    <a href="#tab-profile-password"><i class="fa fa-fw fa-asterisk"></i> Password</a>
                                </li>
                                <li>
                                    <a href="#tab-profile-bank"><i class="fa fa-fw fa-briefcase"></i> Bank</a>
                                </li>
                                <li>
                                    <a href="#tab-profile-ecurrency"><i class="fa fa-fw fa-dollar"></i> eCurrency</a>
                                </li>
                            </ul>
                            <div class="block-content tab-content">
                                <!-- Personal Tab -->
                                <div class="tab-pane fade in active" id="tab-profile-personal">
                                    <div class="row items-push">
                                        <div class="col-sm-6 col-sm-offset-3 form-horizontal">
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label>Username</label>
                                                    <div class="form-control-static font-w700">{{$data['info']->username}}</div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <label for="profile-email">Email Address</label>
                                                    {{ Form::text('email',$data['info']->email,array('placeholder'=>'Enter your email','class'=>'form-control input-lg', 'disabled'=>'disabled')) }}
                                                    {{ $errors->first('email') }}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="profile-firstname">Firstname</label>
                                                    {{ Form::text('first_name',$data['info']->first_name,array('placeholder'=>'Enter your First Name','class'=>'form-control input-lg')) }}
                                                    {{ $errors->first('first_name') }}                                                
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="profile-lastname">Lastname</label>
                                                    {{ Form::text('last_name',$data['info']->last_name,array('placeholder'=>'Enter your Last Name','class'=>'form-control input-lg')) }}
                                                    {{ $errors->first('last_name') }}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="dob">Date of Birth</label>
                                                    {{ Form::text('dob',$data['info']->dob,array('placeholder'=>'Date of Birth','class'=>'form-control input-lg', 'id'=>'dob', 'name'=>'dob')) }}
                                                    {{ $errors->first('dob') }}                                                
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="phone_no">Phone</label>
                                                    {{ Form::text('phone_no',$data['info']->phone_no,array('placeholder'=>'Enter your phone no','class'=>'form-control input-lg')) }}
                                                    {{ $errors->first('phone_no') }}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <label for="profile-address">Address</label>
                                                    {{ Form::text('address',$data['info']->address,array('placeholder'=>'Enter address','class'=>'form-control input-lg', 'id'=>'address', 'name'=>'address')) }}
                                                    {{ $errors->first('address') }}   
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    @if(Session::get('editInfo_message'))
                                                    <div class="alert alert-info" role="alert">{{Session::get('editInfo_message')}}</div>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="block-content block-content-full bg-gray-lighter text-center">
                                                        <button class="btn btn-sm btn-primary" type="submit" formmethod="post" formaction="/users/settings/info"><i class="fa fa-check push-5-r"></i> Save Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Personal Tab -->

                                <!-- Password Tab -->
                                <div class="tab-pane fade" id="tab-profile-password">
                                    <div class="row items-push">
                                        <div class="col-sm-6 col-sm-offset-3 form-horizontal">
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <label for="old_password">Current Password</label>
                                                     <input type="password" class="form-control input-lg" placeholder="Enter Current Password" id="old_password" name="old_password">
                                                     {{ $errors->first('old_password') }}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <label for="new_password">New Password</label>
                                                    <input type="password" class="form-control input-lg" placeholder="Enter New Password" id="new_password" name="new_password">
                                                    {{ $errors->first('new_password') }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    @if(Session::get('editPassword_message'))
                                                    <div class="alert alert-info" role="alert">{{Session::get('editPassword_message')}}</div>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="block-content block-content-full bg-gray-lighter text-center">
                                                        <button class="btn btn-sm btn-primary" type="submit" formmethod="post" formaction="/users/settings/password"><i class="fa fa-check push-5-r"></i> Save Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Password Tab -->

                                <!-- Bank Tab -->
                                <div class="tab-pane fade" id="tab-profile-bank">
                                    <div class="row items-push">
                                        <div class="col-sm-6 col-sm-offset-3 form-horizontal">
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="bank_name">Bank Name</label>
                                                    <select class="form-control bank_names" id="bank_name" name="bank_name" style="width: 100%;" data-placeholder="Choose bank.."></select>
                                                    {{$errors->first('bank_name')}}                                             
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="bank_account">Bank Account No</label>
                                                    {{ Form::text('bank_account',$data['info']->bank_account,array('placeholder'=>'Specify Bank Account No','class'=>'form-control input-lg', 'id'=>'bank_account', 'name'=>'bank_account')) }}
                                                    {{ $errors->first('bank_account') }}
                                                </div>
                                            </div>
                                            <hr>
                                            <h4 class="">Wire Transfer Details</h4>
                                            <div>&nbsp;</div>
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="account_name">Account Name</label>
                                                    {{ Form::text('account_name',$data['info']->account_name,array('placeholder'=>'Specify Account Name','class'=>'form-control input-lg', 'id'=>'account_name', 'name'=>'account_name')) }}
                                                    {{ $errors->first('account_name') }}                                           
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="bank_sort">Bank Sort Code</label>
                                                    {{ Form::text('bank_sort',$data['info']->bank_account,array('placeholder'=>'Specify Bank Sort Code','class'=>'form-control input-lg', 'id'=>'bank_sort', 'name'=>'bank_sort')) }}
                                                    {{ $errors->first('bank_sort') }}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="bank_swift">Bank SWIFT Code</label>
                                                    {{ Form::text('bank_swift',$data['info']->bank_swift,array('placeholder'=>'Specify Bank SWIFT Code','class'=>'form-control input-lg', 'id'=>'bank_swift', 'name'=>'bank_swift')) }}
                                                    {{ $errors->first('bank_swift') }}                                           
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="bank_iban">Bank IBAN Code</label>
                                                    {{ Form::text('bank_iban',$data['info']->bank_iban,array('placeholder'=>'Specify Bank IBAN','class'=>'form-control input-lg', 'id'=>'bank_iban', 'name'=>'bank_iban')) }}
                                                    {{ $errors->first('bank_iban') }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    @if(Session::get('ediBank_message'))
                                                    <div class="alert alert-info" role="alert">{{Session::get('editBank_message')}}</div>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="block-content block-content-full bg-gray-lighter text-center">
                                                        <button class="btn btn-sm btn-primary" type="submit" formmethod="post" formaction="/users/settings/bank-details"><i class="fa fa-check push-5-r"></i> Save Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Bank Tab -->

                                <!-- eCurrency Tab -->
                                <div class="tab-pane fade" id="tab-profile-ecurrency">
                                    <div class="row items-push">
                                        <div class="col-sm-6 col-sm-offset-3 form-horizontal">
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="perfectmoney_email">Perfect Money Email</label>
                                                    {{ Form::text('perfectmoney_email',$data['currencies']->perfectmoney_email,array('placeholder'=>'Enter Perfect Money Email','class'=>'form-control input-lg',  'id'=>'perfectmoney_email', 'name'=>'perfectmoney_email')) }}
                                                    {{ $errors->first('perfectmoney_email') }}                                          
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="perfectmoney_acct">Perfect Money Account</label>
                                                    {{ Form::text('perfectmoney_acct',$data['currencies']->perfectmoney_email,array('placeholder'=>'Enter Perfect Money Email','class'=>'form-control input-lg',  'id'=>'perfectmoney_acct', 'name'=>'perfectmoney_acct')) }}
                                                    {{ $errors->first('perfectmoney_acct') }}                                          
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="webmoney">Web Money</label>
                                                    {{ Form::text('webmoney',$data['currencies']->webmoney,array('placeholder'=>'Enter Web Money','class'=>'form-control input-lg',  'id'=>'webmoney', 'name'=>'webmoney')) }}
                                                    {{ $errors->first('webmoney') }}                                          
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="webmoney_acct">Web Money Account</label>
                                                    {{ Form::text('webmoney_acct',$data['currencies']->webmoney_acct,array('placeholder'=>'Enter Web Money Account','class'=>'form-control input-lg',  'id'=>'webmoney_acct', 'name'=>'webmoney_acct')) }}
                                                    {{ $errors->first('webmoney_acct') }}                                          
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="egopay">EgoPay Account Name</label>
                                                    {{ Form::text('egopay',$data['currencies']->egopay,array('placeholder'=>'Enter EgoPay Account Name','class'=>'form-control input-lg',  'id'=>'egopay', 'name'=>'egopay')) }}
                                                    {{ $errors->first('egopay') }}                                          
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="egopay_email">EgoPay Email</label>
                                                    {{ Form::text('egopay_email',$data['currencies']->egopay_email,array('placeholder'=>'Enter EgoPay Email','class'=>'form-control input-lg',  'id'=>'egopay_email', 'name'=>'egopay_email')) }}
                                                    {{ $errors->first('egopay_email') }}                                          
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="payza">Payza</label>
                                                    {{ Form::text('payza',$data['currencies']->payza,array('placeholder'=>'Enter Payza','class'=>'form-control input-lg', 'id'=>'payza', 'name'=>'payza')) }}
                                                    {{ $errors->first('payza') }}                                          
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="payza_email">Payza Email</label>
                                                    {{ Form::text('payza_email',$data['currencies']->payza_email,array('placeholder'=>'Enter Payza Email','class'=>'form-control input-lg', 'id'=>'payza_email', 'name'=>'payza_email')) }}
                                                    {{ $errors->first('payza_email') }}                                          
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="solidtrust">Solid Trust</label>
                                                    {{ Form::text('solidtrust',$data['currencies']->solidtrust,array('placeholder'=>'Enter Solid Trust','class'=>'form-control input-lg', 'id'=>'solidtrust', 'name'=>'solidtrust')) }}
                                                    {{ $errors->first('solidtrust') }}                                          
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="solidtrust_email">Solid Trust Email</label>
                                                    {{ Form::text('solidtrust_email',$data['currencies']->solidtrust_email,array('placeholder'=>'Enter Solid Trust Email','class'=>'form-control input-lg', 'id'=>'solidtrust_email', 'name'=>'solidtrust_email')) }}
                                                    {{ $errors->first('solidtrust_email') }}                                          
                                                </div>
                                            </div><div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="solidtrust">Solid Trust</label>
                                                    {{ Form::text('solidtrust',$data['currencies']->solidtrust,array('placeholder'=>'Enter Solid Trust','class'=>'form-control input-lg', 'id'=>'solidtrust', 'name'=>'solidtrust')) }}
                                                    {{ $errors->first('solidtrust') }}                                          
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="solidtrust_email">Solid Trust Email</label>
                                                    {{ Form::text('solidtrust_email',$data['currencies']->solidtrust_email,array('placeholder'=>'Enter Solid Trust Email','class'=>'form-control input-lg', 'id'=>'solidtrust_email', 'name'=>'solidtrust_email')) }}
                                                    {{ $errors->first('solidtrust_email') }}                                          
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="okpay">OkPay</label>
                                                    {{ Form::text('okpay',$data['currencies']->okpay,array('placeholder'=>'Enter OkPay','class'=>'form-control input-lg', 'id'=>'okpay', 'name'=>'okpay')) }}
                                                    {{ $errors->first('okpay') }}                                          
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="okpay_acct">OkPay Account</label>
                                                    {{ Form::text('okpay_acct',$data['currencies']->okpay_acct,array('placeholder'=>'Enter OkPay Account','class'=>'form-control input-lg', 'id'=>'okpay_acct', 'name'=>'okpay_acct')) }}
                                                    {{ $errors->first('okpay_acct') }}                                          
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="binary_email">Binary Email</label>
                                                    {{ Form::text('binary_email',$data['currencies']->binary_email,array('placeholder'=>'Enter Binary Email','class'=>'form-control input-lg', 'id'=>'binary_email', 'name'=>'binary_email')) }}
                                                    {{ $errors->first('binary_email') }}                                          
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="binary_acct">Binary Account</label>
                                                    {{ Form::text('binary_acct',$data['currencies']->binary_acct,array('placeholder'=>'Enter Binary Account','class'=>'form-control input-lg', 'id'=>'binary_acct', 'name'=>'binary_acct')) }}
                                                    {{ $errors->first('binary_acct') }}                                          
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="bitcoin_email">Bitcoin Email</label>
                                                    {{ Form::text('bitcoin_email',$data['currencies']->bitcoin_email,array('placeholder'=>'Enter Bitcoin Email','class'=>'form-control input-lg', 'id'=>'bitcoin_email', 'name'=>'bitcoin_email')) }}
                                                    {{ $errors->first('bitcoin_email') }}                                          
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="bitcoin_address">Bitcoin Address</label>
                                                    {{ Form::text('bitcoin_address',$data['currencies']->bitcoin_address,array('placeholder'=>'Enter Bitcoin Address','class'=>'form-control input-lg', 'id'=>'bitcoin_address', 'name'=>'bitcoin_address')) }}
                                                    {{ $errors->first('bitcoin_address') }}                                          
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="neteller">Neteller Account Name</label>
                                                    {{ Form::text('neteller',$data['currencies']->neteller,array('placeholder'=>'Enter Neteller Account Name','class'=>'form-control input-lg', 'id'=>'neteller', 'name'=>'neteller')) }}
                                                    {{ $errors->first('neteller') }}                                          
                                                </div>
                                                <div class="col-xs-6">
                                                    <label for="neteller_email">Neteller Email</label>
                                                    {{ Form::text('neteller_email',$data['currencies']->neteller_email,array('placeholder'=>'Enter Neteller Email','class'=>'form-control input-lg', 'id'=>'neteller_email', 'name'=>'neteller_email')) }}
                                                    {{ $errors->first('neteller_email') }}                                          
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    @if(Session::get('editEwallets_message'))
                                                    <div class="alert alert-info" role="alert">{{Session::get('editEwallets_message')}}</div>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="block-content block-content-full bg-gray-lighter text-center">
                                                        <button class="btn btn-sm btn-primary" type="submit" formmethod="post" formaction="/users/settings/e-wallets"><i class="fa fa-check push-5-r"></i> Save Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End eCurrency Tab -->
                            </div>
                        </div>
                    {{ Form::close() }}
                    <!-- END Main Content -->
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
@stop
