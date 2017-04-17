@extends('layouts.master')

@section('page_title')
	System Configuration
@stop

@section('content')
	<!-- Page Content -->
                <div class="content">
                    <!-- Full Table -->
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">eCurrency Settings</h3>
                            <a class="btn btn-green pull-right" href="/admin/currencies/add">New</a>
							<hr class="divider"/>
							@if(Session::get('currency_success_message'))
								<div>{{Session::get('currency_success_message')}}</div>
							@endif
							@if(Session::get('currency_failed_message'))
								<div>{{Session::get('currency_failed_message')}}</div>
							@endif
                        </div>
                        <div class="block-content">
                            <div class="table-responsive">
                                @if(!$data->isEmpty())
                                <table class="table table-striped table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 150px;"><i class="fa fa-dollar"></i></th>
											<th style="width: 20%;">Buy</th>
											<th style="width: 20%;">Sell</th>
                                            <th style="width: 15%;">Status</th>
                                            <th class="text-center" style="width: 100px;">Actions</th>
                                        </tr>
                                    </thead>
                                    @foreach($data as $currency)
                                        <tbody>
                                            <tr>
                                            	<td class="text-center">{{$currency->id}}</td>
                                                <td class="font-w600">{{$currency->currency_name}}</td>
                                                <td class="font-w600">{{$currency->buy_value}}</td>
												<td class="font-w600">{{$currency->sell_value}}</td>
                                                <td>
                                                    <span class="label label-warning">{{$currency->status}}</span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="/admin/currencies/view/{{$currency->id}}"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit eCurrency"><i class="fa fa-edit"></i></button></a>
                                                        <a href="/admin/currencies/delete/{{$currency->id}}"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Delete eCurrency"><i class="fa fa-remove"></i></button></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody> 
                                    @endforeach
                                </table>
                                @else
                                    There are no currencies added currently.
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- END Full Table -->

                    <!-- Full Table -->
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">Bank Settings</h3>
                            <a class="btn btn-green pull-right" href="/admin/bank-accounts/add">New</a>
							<hr class="divider"/>
							@if(Session::get('bank_message'))
								<div>{{Session::get('bank_message')}}</div>
							@endif
                        </div>
                        <div class="block-content">
                            <div class="table-responsive">
                                @if(!$bank_data->isEmpty())
                                <table class="table table-striped table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 60px;"><i class="si si-briefcase"></i></th>
                                            <th style="width: 30%;">Bank Name</th>
                                            <th style="width: 15%;">Status</th>
                                            <th class="text-center" style="width: 100px;">Actions</th>
                                        </tr>
                                    </thead>
                                    @foreach($bank_data as $bank)
                                        <tbody>
                                            <tr>
                                            	<td class="text-center">{{$bank->id}}</td>
                                                <td class="font-w600">{{$bank->bank_name}}</td>
                                                <td>
                                                    <span class="label label-warning">{{$bank->status}}</span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="/admin/bank-accounts/edit/{{$bank->id}}"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Bank"><i class="fa fa-edit"></i></button></a>
                                                        <a href="/admin/bank-accounts/delete/{{$bank->id}}"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Delete Bank"><i class="fa fa-remove"></i></button></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody> 
                                    @endforeach
                                </table>
                                @else
                                    There are no banks added currently.
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
@stop
