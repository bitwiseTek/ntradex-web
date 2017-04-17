@extends('layouts.master')

@section('page_title')
	Recover Lost Password
@stop

@section('content')
	<div class="container main_content">
		<div class="row">
	   		 <div class="col-md-6 ">
	    		<h3>I want my password back<small> don't panic, we are here to help.</small></h3>
				<hr class="colorgraph">
				<form action="/login/password-recovery" method="POST">
					<div class="form-group">
						<label>Enter Registration Email or Username:</label>
				    	<input type="text" placeholder="Enter Email or Username"  name="email" class="form-control">
				    </div>
				    <div class="form-group">
				    <input type="submit" value="Get Token" class="btn btn-small btn-blue">
				    </div>

				   	@if(Session::get('recovery_message'))
				   		 <div>{{Session::get('recovery_message')}}</div>
				   	@endif
				   	<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</form>
			</div>
		</div>
	</div>
	
@stop