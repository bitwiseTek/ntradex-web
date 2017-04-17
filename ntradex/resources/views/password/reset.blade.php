@extends('layouts.master')

@section('page_title')
	Recover Your Password
@stop

@section('content')
		<div class="container main_content">
			<div class="row">
		   		 <div class="col-md-6 ">
					<h3>Enter New Password</h3>
					<hr class="colorgraph">

						{{ Form::open(array('url' => '/login/password-recovery/new-password', 'method'=>'post','autocomplete' => 'off','class'=>'ui form small basic segment ')) }}
						{{ csrf_field() }}

						<input type="hidden" name="token" value="{{Session::get('token')}}"/>
						<input type="hidden" name="email" value="{{Session::get('email')}}"/>
						
						<div class="form-group">
							{{ Form::label('password', 'New Password:') }}
							{{ Form::password('password',array('placeholder'=>'New Password','class'=>'form-control')) }}
							{{ $errors->first('password') }}
						</div>

						<div class="form-group">
							{{ Form::label('password_confirmation', 'Retype Password:') }}
							{{ Form::password('password_confirmation',array('placeholder'=>'Retype Password','class'=>'form-control')) }}
							{{ $errors->first('password_confirmation') }}
						</div>

						<div class="form-group">
							{{ Form::submit('Reset',array('class'=>'btn btn-small btn-blue')) }}
						</div>
						{{ Form::close() }}
				</div>
		    </div>
	   </div>	
@stop