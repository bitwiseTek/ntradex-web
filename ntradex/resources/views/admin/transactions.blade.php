@extends('layouts.master')

@section('page_title')
	System Transactions
@stop

@section('content')
	<!-- Page Content -->
                <div class="content">
                    <!-- Dynamic Table Full -->
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">System Transactions</h3>
                        </div>
                        <div class="block-content">
                            @if(!$data->isEmpty())
                                <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                                <table class="table table-striped js-dataTable-full">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 60px;"><i class="si si-equalizer"></i></th>
                                            <th style="width: 30%;">Currency</th>
                                            <th style="width: 30%;">Amount (NGN)</th>
                                            <th style="width: 10%;">Status</th>
                                            <th style="width: 35%;">Date</th>
                                            <th style="width: 30%;">Email</th>
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
                                                <td>{{$transaction->email}}</td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="/admin/transactions/{{$transaction->id}}"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="View Transaction"><i class="fa fa-eye"></i></button></a>
                                                        @if($transaction->status == 'Pending' && $transaction->type == 'Buy')<a href="/admin/query-payment-status/{{$transaction->id}}"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Query Transaction"><i class="fa fa-question"></i></button></a>@endif
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody> 
                                    @endforeach
                                </table>
                                @else
                                    There are no transactions currently.
                                @endif
                        </div>
                    </div>
                </div>
@stop
