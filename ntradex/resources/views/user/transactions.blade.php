@extends('layouts.master')

@section('page_title')
Transactions
@stop

@section('content')
	<!-- Page Content -->
                <div class="content">
                    <!-- Full Table -->
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">Transactions History</h3>
                            @if(Session::get('message'))
                                <div>{{Session::get('message')}}</div>
                            @endif
                        </div>
                        <div class="block-content">
                            <div class="table-responsive">
                                @if(!$data->isEmpty())
                                <table class="table table-striped table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 60px;"><i class="si si-equalizer"></i></th>
                                            <th style="width: 30%;">Currency</th>
                                            <th style="width: 30%;">Amount (NGN)</th>
                                            <th style="width: 15%;">Status</th>
                                            <th style="width: 60%;">Date</th>
                                            <th class="text-center" style="width: 100px;">Actions</th>
                                        </tr>
                                    </thead>
                                    @foreach($data as $transaction)
                                        <tbody>
                                            <tr>
                                                <td class="text-center">{{$transaction->type}}</td>
                                                <td class="font-w600">{{$transaction->currency}}</td>
                                                <td>{{number_format($transaction->exchange_val, 2)}}</td>
                                                <td>
                                                    <span class="label label-warning">{{$transaction->status}}</span>
                                                </td>
                                                <td>{{date('d M Y  h:i a',strtotime($transaction->created_at))}}</td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="/users/transactions/{{$transaction->id}}"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="View Transaction"><i class="fa fa-eye"></i></button></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody> 
                                    @endforeach
                                </table>
                                @else
                                    You have made no transactions.
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- END Full Table -->
                </div>

@stop
