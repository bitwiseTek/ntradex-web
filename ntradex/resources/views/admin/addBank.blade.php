@extends('layouts.master')

@section('page_title')
	New Bank
@stop

@section('content')
	<!-- Main Container -->
            <main style="margin-top:-70px" id="main-container">
                <!-- Page Content -->
                <div class="content content-boxed">
                	<a class="btn btn-green pull-right" href="/admin/currencies">Back</a>
					<hr class="divider"/>
                    <!-- Main Content I -->
                    {{ Form::open(array('url' => '/admin/bank-accounts/add', 'method'=>'post','role'=>'form','class'=>'js-validation-admin-bank form-horizontal push-10-t push-10')) }}
	                    <div class="row">
	                        <h4>Add Bank</h4><br>
	                        	<div>&nbsp;</div>
	                        	<div class="row">
	                                	<div class="col-sm-8">
	                                        <div class="form-group">
	                                            <div class="col-xs-6">
	                                            	<div class="form-material form-material-success">
		                                                {{ Form::text('bank_name','',array('placeholder'=>'Enter Bank Name','class'=>'form-control','id'=>'bank_name','name'=>'bank_name')) }}
	                                            		<label for="bank_name">Bank Name</label>
	                                            		{{ $errors->first('bank_name') }}
		                                            </div>
	                                            </div>
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
	                                    	</div>
	                                	</div>
	                            </div>
	                            <div class="row">
	                            	<div class="col-md-9">
										@if(Session::get('bank_message'))
                                            <div class="alert alert-info" role="alert">{{Session::get('bank_message')}}</div>
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
