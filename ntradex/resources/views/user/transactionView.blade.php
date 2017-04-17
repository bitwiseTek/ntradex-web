@extends('layouts.master')

@section('page_title')
	Transaction Details
@stop

@section('content')
	<!-- Main Container -->
            <main style="margin-top:-70px" id="main-container">
                <!-- Page Content -->
                <div class="content content-boxed">
                    <!-- Main Content I -->
                    <div class="row">
                        <h4>Transaction Details</h4><br>
                        <a class="btn btn-green pull-right" href="/users/transactions">Back</a>
						<hr class="divider"/>
						<br>
						<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title panel-default">Ref# :{{$data->ref_no}} ({{$data->status}})</h3>
						</div>
						<div class="panel-body">
							<table class="table table-user-information">
								<tbody>
									<tr>
										<td>eCurrency:</td>
										<td>{{$data->currency}}</td>
									</tr>
									<tr>
										<td>Exchange Rate:</td>
										<td>$1 -> N{{number_format($data->currency_val, 2)}}</td>
									</tr>
									<tr>
										<td>Amount:</td>
										<td>${{number_format($data->amount, 2)}}</td>
									</tr>
									<tr>
										<td>Exchange Made:</td>
										<td>N{{number_format($data->exchange_val, 2)}}</td>
									</tr>
									<tr>
										<td>Order Placed:</td>
										<td>{{date('d M Y  h:i a',strtotime($data->created_at))}}</td>
									</tr>
		                                                        <tr>
										<td>Statement:</td>
										<td>{{($data->statement) ? $data->statement : 'None' }}</td>
									</tr>
		                                                         <tr>
										<td>Payment Method:</td>
										<td>{{($data->payment_method) ? $data->payment_method : 'None' }}</td>
									</tr>
		                                                         <tr>
										<td>Payment Ref:</td>
										<td>{{($data->payment_ref) ? $data->payment_ref : 'None' }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
@stop

