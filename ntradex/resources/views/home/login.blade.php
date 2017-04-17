@extends('layouts.master')

@section('page_title')
	Login 
@stop

@section('content')
	<!-- Login Content -->
        <div class="bg-white">
            <div class="content content-boxed overflow-hidden">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                        <div class="push-30-t push-50 animated fadeIn">
                            <!-- Login Title -->
                            <div class="text-center">
                                <img src="assets/img/logo10.png" width="60" alt="">
                                <h1 class="h3 push-10-t">sign In</h1>
                            </div>
                            <!-- END Login Title -->

                            <!-- Login Form -->
                            <!-- jQuery Validation (.js-validation-login class is initialized in js/pages/base_pages_login.js) -->
                            <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            {{ Form::open(array('url' => '/login', 'method'=>'post','role'=>'form','class'=>'js-validation-login form-horizontal push-30-t')) }}
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-primary floating">
                                        	{{ Form::text('username','',array('class'=>'form-control', 'id'=>'username', 'name'=>'username')) }}
                                            <label for="login-username">Username</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-primary floating">
                                        	{{ Form::password('password',array('class'=>'form-control', 'id'=>'password', 'name'=>'password')) }}
                                            <label for="login-password">Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-6">
                                        <label class="css-input switch switch-sm switch-primary">
                                            <input type="checkbox" id="login-remember-me" name="login-remember-me"><span></span> Remember Me?
                                        </label>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="font-s13 text-right push-5-t">
                                            <a href="/login/password-recovery">Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group push-30-t">
                                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                        <button class="btn btn-sm btn-block btn-primary" type="submit"><i class="si si-login pull-right"></i>Sign in</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                	<div class="col-xs-12">
										@if(Session::get('login_message'))
											{{Session::get('login_message')}}
										@endif
									</div>
                                </div>
                            {{ Form::close() }}
                            <!-- END Login Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Login Content -->
@stop
