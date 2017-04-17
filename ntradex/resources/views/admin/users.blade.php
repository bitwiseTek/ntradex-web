@extends('layouts.master')

@section('page_title')
	System Users
@stop

@section('content')
	<!-- Page Content -->
                <div class="content">
                    <!-- Full Table -->
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">System Users</h3>
                            @if(Session::get('message'))
                                <div>{{Session::get('message')}}</div>
                            @endif
                        </div>
                        <div class="block-content">
                                @if(!$data->isEmpty())
                                <table class="table table-striped js-dataTable-full">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 60px;"><i class="si si-users"></i></th>
                                            <th style="width: 30%;">Name(L)</th>
                                            <th style="width: 30%;">Name(F)</th>
                                            <th style="width: 30%;">Username</th>
                                            <th style="width: 20%;">Phone</th>
                                            <th style="width: 30%;">Email</th>
                                            <th style="width: 15%;">Status</th>
                                            <th class="text-center" style="width: 100px;">Actions</th>
                                        </tr>
                                    </thead>
                                    @foreach($data as $user)
                                        <tbody>
                                            <tr>
                                                <td class="text-center">{{$user->id}}</td>
                                                <td class="font-w600">{{$user->last_name}}</td>
												<td class="font-w600">{{$user->first_name}}</td>
												<td class="font-w600">{{$user->username}}</td>
												<td class="font-w600">{{$user->phone_no}}</td>
												<td class="font-w600">{{$user->email}}</td>
                                                <td>
                                                    <span class="label label-warning">{{$user->status}}</span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="/admin/users/{{$user->id}}"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="View User"><i class="fa fa-eye"></i></button></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody> 
                                    @endforeach
                                </table>
                                @else
                                    There are no users currently.
                                @endif
                        </div>
                    </div>
                    <!-- END Full Table -->
                </div>
@stop
