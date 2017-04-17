@extends('layouts.master')

@section('page_title')
	Account settings
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
                                                        <button class="btn btn-sm btn-primary" type="submit" formmethod="post" formaction="/admin/settings/info"><i class="fa fa-check push-5-r"></i> Save Changes</button>
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
                                                        <button class="btn btn-sm btn-primary" type="submit" formmethod="post" formaction="/admin/settings/password"><i class="fa fa-check push-5-r"></i> Save Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Password Tab -->
                            </div>
                        </div>
                    {{ Form::close() }}
                    <!-- END Main Content -->
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
@stop
