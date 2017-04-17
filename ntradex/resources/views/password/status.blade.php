@extends('layouts.master')

@section('page_title')
	Your Password has been Reset
@stop

@section('content')
		<div class="container main_content">
			<div class="row">
		   		 <div class="col-md-6 ">
				   	@if(Session::get('recovery_message'))
				   		<h3>Notice</h3>
				   		 <div>{{Session::get('recovery_message')}}</div>
				   	@endif
				 </div>
			</div>
		</div>
@stop