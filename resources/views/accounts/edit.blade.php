@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form  ng-controller="AccountController" name="accountForm" ng-init="loadModel({!! $id !!})">
            <a href="{!! route('accounts.index') !!}">< View All Accounts</a>
            <br/>
            <h2 class="form-header pull-left"><% account.name %></h2>
            <a class="btn btn-default pull-right text-muted" style="margin-top: 25px" href="javascript:void(0)" ng-if="!longForm" ng-click="toggleForm()">Show more</a>
            <a class="btn btn-default pull-right text-muted" style="margin-top: 25px" href="javascript:void(0)" ng-if="longForm" ng-click="toggleForm()">Show less</a>
            <div class="clearfix"></div>
            <hr/>
                @include('accounts.fields')
            </form>
        </div>
    </div>
</div>
@endsection