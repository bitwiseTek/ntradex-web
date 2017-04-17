@extends('layouts.master')

@section('page_title')
	View User
@stop

@section('content')
	<!-- Main Container -->
            <main style="margin-top:-70px" id="main-container">
                <!-- Page Content -->
                <div class="content content-boxed">
                    <!-- Main Content I -->
                    <div class="row">
                        <h4>User Details</h4><br />
                        <a class="btn btn-green pull-right" href="/admin/users">Back</a>
						<hr class="divider"/>
						<br>
						@foreach($data as $user)
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title panel-default">{{ucfirst($user->first_name)}} {{ucfirst($user->last_name)}} ({{$user->status}})</h3>
							</div>
							<div class="panel-body">
								<table class="table table-user-information">
									<tbody>
									<tr>
										<td>Username:</td>
										<td>{{$user->username}}</td>
									</tr>
									<tr>
										<td>Email:</td>
										<td>{{$user->email}}</td>
									</tr>
									<tr>
										<td>Phone:</td>
										<td>{{$user->phone_no}}</td>
									</tr>
									<tr>
										<td>Bank:</td>
										<td>{{(($user->bank_name) ? $user->bank_name : 'Not Set')}}</td>
									</tr>

									<tr>
										<td>Account No:</td>
										<td>{{(($user->bank_account) ? $user->bank_account : 'Not Set')}}</td>
									</tr>

									<tr>
										<td>Address:</td>
										<td>{{(($user->address) ? $user->address : 'Not Set')}}</td>
									</tr>

									<tr>
										<td>State:</td>
										<td>{{$user->state}}</td>
									</tr>

									<tr>
										<td>Country:</td>
										<td>{{$user->country}}</td>
									</tr>

									<tr>
										<td>Date of Birth:</td>
										<td>{{$user->dob}}</td>
									</tr>

									<tr>
										<td>Zip Code:</td>
										<td>{{$user->zip_code}}</td>
									</tr>

									<tr>
										<td>Status</td>
										<td>{{$user->status}}</td>
									</tr>

									<tr>
										<td>Last Login:</td>
										<td>{{date('d M Y  h:i a',strtotime($user->last_login))}}</td>
									</tr>

									<tr>
										<td>Created At:</td>
										<td>{{date('d M Y  h:i a',strtotime($user->created_at))}}</td>
									</tr>
									</tbody>
								</table>
							</div>
							<div class="panel-footer">
								<form action="/admin/users/block/{{$user->id}}" method="post">
									@if($user->status == 'Enabled')
										<input type="hidden" value="Disabled" name="status" />
										<input type="submit" class="btn btn-sm btn-primary" value="Block User" />
									@else
										<input type="hidden" value="Enabled" name="status" />
										<input type="submit" class="btn btn-sm btn-primary" value="Allow User" />
									@endif
								</form>
							</div>
							@endforeach
						</div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
@stop
