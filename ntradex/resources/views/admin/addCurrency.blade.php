@extends('layouts.master')

@section('page_title')
	New Currency
@stop

@section('content')
	<!-- Main Container -->
            <main style="margin-top:-70px" id="main-container">
                <!-- Page Content -->
                <div class="content content-boxed">
                	<a class="btn btn-green pull-right" href="/admin/currencies">Back</a>
					<hr class="divider"/>
                    <!-- Main Content I -->
                    {{ Form::open(array('url' => '/admin/currencies/add', 'method'=>'post','role'=>'form','class'=>'js-validation-admin-ecurrency form-horizontal push-10-t push-10')) }}
	                    <div class="row">
	                        <h4>Add eCurrency</h4><br>
	                        	<div>&nbsp;</div>
	                        	<div class="row">
	                                	<div class="col-sm-8">
	                                        <div class="form-group">
	                                            <div class="col-xs-6">
	                                            	<div class="form-material form-material-success">
		                                                {{ Form::text('currency_name','',array('placeholder'=>'Enter eCurrency Name','class'=>'form-control','id'=>'currency_name','name'=>'currency_name')) }}
	                                            		<label for="currency_name">eCurrency Name</label>
	                                            		{{ $errors->first('currency_name') }}
		                                            </div>
	                                            </div>
	                                            <div class="col-xs-6">
	                                            	<div class="form-material form-material-success">
	                                                	{{ Form::text('alias','',array('placeholder'=>'Enter eCurrency Alias','class'=>'form-control','id'=>'alias','name'=>'alias')) }}
	                                            		<label for="alias">eCurrency Alias</label>
	                                            		{{ $errors->first('alias') }}
	                                           		</div>
	                                        	</div>
	                                    	</div>
	                                	</div>
	                            </div>
	                            <div class="row">
	                                	<div class="col-sm-8">
	                                        <div class="form-group">
	                                            <div class="col-xs-6">
	                                            	<div class="form-material form-material-success">
		                                                {{ Form::text('buy_value','',array('placeholder'=>'Enter Buy Value','class'=>'form-control','id'=>'buy_value','name'=>'buy_value')) }}
	                                            		<label for="buy">Buy Value</label>
	                                            		{{ $errors->first('buy_value') }}
		                                            </div>
	                                            </div>
	                                            <div class="col-xs-6">
	                                            	<div class="form-material form-material-success">
	                                                	{{ Form::text('sell_value','',array('placeholder'=>'Enter Sell Value','class'=>'form-control','id'=>'sell_value','name'=>'sell_value')) }}
	                                            		<label for="sell">Sell Value</label>
	                                            		{{ $errors->first('sell_value') }}
	                                           		</div>
	                                        	</div>
	                                    	</div>
	                                	</div>
	                            </div>
	                            <div class="row">
	                                	<div class="col-sm-8">
	                                        <div class="form-group">
	                                            <div class="col-xs-6">
	                                            	<div class="form-material form-material-success">
		                                                <select class="js-select2 form-control" id="sex" name="status" style="width: 100%;" data-placeholder="Choose status..">
															<option value="0">Choose Status</option>
															<option value="enabled">Enabled</option>
															<option value="disabled">Disabled</option>
								                        </select>
	                                            		<label for="status">Status</label>
	                                            		{{ $errors->first('status') }}
		                                            </div>
	                                            </div>
	                                            <div class="col-xs-6">
	                                            	<div class="form-material form-material-success">
	                                                	{{ Form::text('min','',array('placeholder'=>'Enter Minimum Amount','class'=>'form-control','id'=>'min','name'=>'min')) }}
	                                            		<label for="min">Min</label>
	                                            		{{ $errors->first('min') }}
	                                           		</div>
	                                        	</div>
	                                    	</div>
	                                	</div>
	                            </div>
	                            <div class="row">
	                            	<div class="col-md-9">
										@if(Session::get('currency_message'))
                                            <div class="alert alert-info" role="alert">{{Session::get('currency_message')}}</div>
                                        @endif
									</div>
									<div class="col-md-3">
										<button class="btn btn-sm btn-primary" type="submit"><i class="si si-plus push-5-r"></i> Create</button>
									</div>
								</div>
	                    </div>
	                    {{Form::close()}}
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
@stop
